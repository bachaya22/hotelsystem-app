<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Stripe;
use App\Models\Card;
use App\Models\Room;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Aboutdata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $product= Product::all();
        $aboutdata= Aboutdata::all();
        $gallery= Gallery::all();
        $room= Room::all();
        return view('user.page.home' , compact('room','gallery','aboutdata','product'));
    }
    public function about()
    {
        $aboutdata= Aboutdata::all();

        return view('user.page.about' ,compact('aboutdata'));
    } public function contact()
    {
        return view('user.page.contact');
    }
    public function usergallery()
    {
        $gallery= Gallery::all();
        return view('user.page.gallery' ,compact('gallery'));
    }
    public function blog()
    {
        return view('user.page.blog');
    }
    public function ourroom()
    {
        $room= Room::all();

        return view('user.page.room', compact('room'));
    }

    public function roomdetail($id)
    {
        $room = Room::find($id); // Use singular variable name
        return view('user.page.roomdetail', compact('room')); // Pass the singular variable
    }
    public function aboutdatadetail($id){
        $item = Aboutdata::find($id);
        return view('user.page.aboutdatadetail', compact('item'));
    }
    public function bookroom(Request $request , $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'startDate' => 'required|date|after_or_equal:today',
            'endDate' => 'required|date|after:startDate',
        ]);
        $data=new  Book;
        $data->room_id=$id;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $startDate=$request->startDate;
        $endDate=$request->endDate;
        $isBooked= Book::where('room_id',$id)->where('start_date', '<=' , $endDate)->where('end_date', '>=' , $startDate)->exists();
        if($isBooked)
        {
        return redirect()->back()->with('message', 'Room is already booked try different date');

        }
        else{
            $data->start_date=$request->startDate;
           $data->end_date=$request->endDate;
          $data->save();
         return redirect()->back()->with('message', 'Room booked successfully!');
         }
    }
    public function contactform(Request $request)
    {
       $contact= new Contact;
       $contact->name=$request->name;
       $contact->email=$request->email;
       $contact->phone=$request->phone;
       $contact->message=$request->message;
       $contact->save();
       return Redirect()->back()->with('message', 'Message sent successfully');

    }

    public function product_details($id)
    {
        $product=Product::find($id);
        return view('user.page.productdetail' ,compact('product'));
    }


    // card


    public function add_card(Request $request, $id)
    {
        if(Auth::id()){
            $user=Auth::user();
            $product=product::find($id);
            $card=new Card;
            $card->name=$user->name;
            $card->email=$user->email;
            $card->phone=$user->phone;
            $card->address=$user->address;
            $card->user_id=$user->id;
            $card->product_title=$product->title;
            if($product->discountprice!==null)
            {
                $card->price=$product->discountprice;
            }
            else{


            $card->price=$product->price;
        }
            $card->image=$product->image;
            $card->product_id=$product->id;
            $card->quantity=$request->quantity;

           $card->save();
            return redirect()->back()->with('message','data ia added to card');

        }

        else{
            return redirect('login');
        }
    }
    public function show_card()
    {
        if(Auth::id()){
        $id=Auth::user()->id;
        $card=Card::where('user_id', '=' , $id)->get();
        return view('user.page.card' , compact('card'));
        }
        else
        {
            return redirect('login');
        }
    }
    public function reomve_card($id)
    {
        $card=Card::find($id);
        $card->delete();
        return redirect()->back();
    }


    public function cash_order( )
        {
            $user=Auth::user();
            $userid=$user->id;
            $data=card::where('user_id', '=' , $userid)->get();
            foreach($data as $data)
            {
                $order= new Order;
                $order->name=$data->name;
                $order->email=$data->email;
                $order->phone=$data->phone;
                $order->address=$data->address;
                $order->user_id=$data->user_id;
                $order->product_title=$data->product_title;
                $order->price=$data->price;
                $order->quantity=$data->quantity;
                $order->image=$data->image;
                $order->product_id=$data->product_id;
                $order->payment_status='cash on delivery';
                $order->delivery_status='proccessing';
               $order->save();


               $card_id=$data->id;
               $card=card::find($card_id);
               $card->delete();

            }
            return redirect()->back()->with('message' ,'we recived your order we connect you soon as possible as soon....');
        }
        public function stripe($totalprice)
        {
            return view('user.page.stripe.stripe' ,compact('totalprice'));
        }
        public function stripePost(Request $request ,$totalprice)

        {

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));



            Stripe\Charge::create ([

                    "amount" => $totalprice* 100,

                    "currency" => "usd",

                    "source" => $request->stripeToken,

                    "description" => "your payment is done"

            ]);



            $user=Auth::user();
            $userid=$user->id;
            $data=card::where('user_id', '=' , $userid)->get();
            foreach($data as $data)
            {
                $order= new order;
                $order->name=$data->name;
                $order->email=$data->email;
                $order->phone=$data->phone;
                $order->address=$data->address;
                $order->user_id=$data->user_id;
                $order->product_title=$data->product_title;
                $order->price=$data->price;
                $order->quantity=$data->quantity;
                $order->image=$data->image;
                $order->product_id=$data->product_id;
                $order->payment_status='paid';
                $order->delivery_status='proccessing';
               $order->save();


               $card_id=$data->id;
               $card=card::find($card_id);
               $card->delete();

            }


            Session::flash('success', 'Payment successful!');



            return back();

        }


}
