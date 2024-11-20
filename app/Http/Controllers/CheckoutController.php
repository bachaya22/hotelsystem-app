<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function index($product_id)
    {
        $product = DB::table('product')->where('product_id', $product_id)->first();
        return view('checkout', ['product' => $product]);
    }

    public function doCheckout(Request $request)
    {
        $data = $request->input();
        $product_id = $data['product_id'];

        $product = DB::table('product')->where('product_id', $product_id)->first();

        if (!$product) {
            return redirect()->back()->withErrors('Product not found.');
        }

        // 1. Get formatted price, removing period (.) if any
        $pp_Amount = (int) ($product->price * 100); // Assumes price is in decimal format

        // 2. Get the current date and time
        $DateTime = now();
        $pp_TxnDateTime = $DateTime->format('YmdHis');

        // 3. Set expiry date and time (add one hour)
        $pp_TxnExpiryDateTime = $DateTime->clone()->addHour()->format('YmdHis');

        // 4. Generate a unique transaction ID using the current date and time
        $pp_TxnRefNo = 'T' . $pp_TxnDateTime;

        // Prepare post data array for transaction
        $post_data = [
            "pp_Version"            => Config::get('constants.jazzcash.VERSION'),
            "pp_TxnType"            => "MWALLET",
            "pp_Language"           => Config::get('constants.jazzcash.LANGUAGE'),
            "pp_MerchantID"         => Config::get('constants.jazzcash.MERCHANT_ID'),
            "pp_SubMerchantID"      => "",
            "pp_Password"           => Config::get('constants.jazzcash.PASSWORD'),
            "pp_BankID"             => "TBANK",
            "pp_ProductID"          => "RETL",
            "pp_TxnRefNo"           => $pp_TxnRefNo,
            "pp_Amount"             => $pp_Amount,
            "pp_TxnCurrency"        => Config::get('constants.jazzcash.CURRENCY_CODE'),
            "pp_TxnDateTime"        => $pp_TxnDateTime,
            "pp_BillReference"      => "billRef",
            "pp_Description"        => "Description of transaction",
            "pp_TxnExpiryDateTime"  => $pp_TxnExpiryDateTime,
            "pp_ReturnURL"          => Config::get('constants.jazzcash.RETURN_URL'),
            "pp_SecureHash"         => "",
            "ppmpf_1"               => "1",
            "ppmpf_2"               => "2",
            "ppmpf_3"               => "3",
            "ppmpf_4"               => "4",
            "ppmpf_5"               => "5",
        ];

        // Generate the secure hash
        $pp_SecureHash = $this->getSecureHash($post_data);
        $post_data['pp_SecureHash'] = $pp_SecureHash;

        // Insert order into the database
        DB::table('order')->insert([
            'TxnRefNo'    => $post_data['pp_TxnRefNo'],
            'amount'      => $product->price,
            'description' => $post_data['pp_Description'],
            'status'      => 'pending'
        ]);

        // Store post data in the session for use in the view
        Session::put('post_data', $post_data);

        return view('do_checkout_v');
    }

    private function getSecureHash($data_array)
    {
        ksort($data_array);

        $str = '';
        foreach ($data_array as $key => $value) {
            if (!empty($value)) {
                $str .= '&' . $value;
            }
        }

        $str = Config::get('constants.jazzcash.INTEGERITY_SALT') . $str;
        $pp_SecureHash = hash_hmac('sha256', $str, Config::get('constants.jazzcash.INTEGERITY_SALT'));

        return $pp_SecureHash;
    }

    public function paymentStatus(Request $request)
    {
        $response = $request->input();

        if ($response['pp_ResponseCode'] == '000') {
            $response['pp_ResponseMessage'] = 'Your Payment has been Successful';
            DB::table('order')
                ->where('TxnRefNo', $response['pp_TxnRefNo'])
                ->update(['status' => 'completed']);
        }

        return view('payment-status', ['response' => $response]);
    }
}
