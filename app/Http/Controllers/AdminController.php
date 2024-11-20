<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Room;
use App\Models\User;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Catagory;
use App\Models\Aboutdata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
/*************  ✨ Codeium Command ⭐  *************/
/******  bde829c7-50a0-41bf-83f7-5bb61c3ad1f2  *******/
    public function index()

    {
        if (Auth::id())

        {
            $usertype=Auth()->user()->usertype;
            if($usertype == 'user')
            {
                $aboutdata=Aboutdata::all();
                $room= Room::all();
                $product=Product::all();
                $gallery= Gallery::all();
                return view('user.page.home' ,compact('room','gallery','aboutdata','product'));
            }
         else if($usertype == 'admin')
            {
                return view('admin.page.dashboard');
            }
            else{
                return redirect()->back();
            }
        }


    }
    public function createroom()
    {
        return view('admin.page.room.createroom');
    }
    public function roomstore(Request $request)
    {
      $room= new Room();
      $room->roomtitle=$request->roomtitle;
      $room->descrption=$request->descrption;
      $room->price=$request->price;
      $room->roomtype=$request->type;
      $room->wifi=$request->wifi;
      $image = $request->image;
      if ($image) {
       $imagename = time() . '.' . $image->getClientOriginalExtension();  // Corrected 'getclientorginalextentatio' typo
       $image->move(public_path('room'), $imagename);  // Ensuring the file is moved to the 'room' directory within 'public'
       $room->image = $imagename;
       }
      $room->save();
     return redirect()->back();
    }
    public function viewroom()
    {
        $room= Room::all();
        return view('admin.page.room.viewroom', compact('room'));
    }
    public function roomdelete($id)
    {
        $room= Room::find($id);
        $room->delete();
        return redirect()->back();
    }

    public function roomedit($id)
    {
        $room= Room::find($id);
        return view('admin.page.room.editroom' , compact('room'));
    }
    public function roomupdate(Request $request , $id)
    {
        $room= new Room();
        $room->roomtitle=$request->roomtitle;
        $room->descrption=$request->descrption;
        $room->price=$request->price;
        $room->roomtype=$request->type;
        $room->wifi=$request->wifi;
        $image = $request->image;
        if ($image) {
         $imagename = time() . '.' . $image->getClientOriginalExtension();  // Corrected 'getclientorginalextentatio' typo
         $image->move(public_path('room'), $imagename);  // Ensuring the file is moved to the 'room' directory within 'public'
         $room->image = $imagename;
         }
        $room->save();
        return redirect()->back();
    }

    public function books()
    {
        $books=Book::all();
        return view('admin.page.book.books' ,compact('books'));
    }
    public function deletebook($id)
    {
        $books= Book::find($id);
        $books->delete();
        return redirect()->back();
    }
    public function approvebook($id)
    {
        $books= Book::find($id);
        $books->status='approve';
        $books->save();
        return redirect()->back();
    }
    public function rejectbook($id)
    {
        $books= Book::find($id);
        $books->status='reject';

        $books->save();
        return redirect()->back();
    }

    public function viewgallery(){
         $gallery= Gallery::all();
        return view('admin.page.gallery.viewgallery' ,compact('gallery'));
    }
    public function uploadimage(Request $request)
    {
         $gallery=new  Gallery;
        $image = $request->image;
        if ($image) {
         $imagename = time() . '.' . $image->getClientOriginalExtension();  // Corrected 'getclientorginalextentatio' typo
         $image->move('gallery', $imagename);  // Ensuring the file is moved to the 'room' directory within 'public'
         $gallery->image = $imagename;
         }
        $gallery->save();
        return redirect()->back();
    }
    public function deleteimage($id)
    {
        $gallery= Gallery::find($id);
        $gallery->delete();
        return redirect()->back();
    }
     public function message()
     {
        $data=Contact::all();
       return view('admin.page.message.message',compact('data'));

     }
     public function sendmessage($id)
     {
        $data=Contact::find($id);
       return view('admin.page.message.sendmessage' ,compact('data'));
     }
     public function mail(Request $request , $id)
     {
        $data=Contact::find($id);
        $details=[
            'greeting' => $request->greating,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endline' => $request->endline
        ];
        Notification::send($data , new SendEmailNotification($details));
        return redirect()->back();

     }

                      // about data

         public function indexaboutdata()
    {
        $aboutdata = Aboutdata::all();
        return view('admin.page.about.index', compact('aboutdata'));
    }

    public function createaboutdata()
    {
        return view('admin.page.about.create');
    }

    public function storeaboutdata(Request $request)
    {
        $aboutdata = new aboutdata;
        $aboutdata->title = $request->input('title');
        $aboutdata->description = $request->input('description');
        $aboutdata->detail = $request->input('detail');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/aboutdatas/', $filename);
            $aboutdata->image = $filename;
        }
        $aboutdata->save();
        return redirect()->back()->with('status','aboutdata Image Added Successfully');
    }

    public function editaboutdata($id)
    {
        $aboutdata = aboutdata::find($id);
        return view('admin.page.about.edit', compact('aboutdata'));
    }

    public function updateaboutdata(Request $request, $id)
    {
        $aboutdata = aboutdata::find($id);
        $aboutdata->title = $request->input('title');
        $aboutdata->description = $request->input('description');
        $aboutdata->detail = $request->input('detail');

        if($request->hasfile('image'))
        {
            $destination = 'uploads/aboutdatas/'.$aboutdata->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/aboutdatas/', $filename);
            $aboutdata->image = $filename;
        }

        $aboutdata->update();
        return redirect()->back()->with('message','aboutdata Image Updated Successfully');
    }

    public function destroyaboutdata($id)
    {
        $aboutdata = Aboutdata::find($id);
        $destination = 'uploads/aboutdatas/'.$aboutdata->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $aboutdata->delete();
        return redirect()->back()->with('message','aboutdata Image Deleted Successfully');
    }

    public function viewcatagory(){
        // $data= new Catagory();
        $data= catagory::all();
        return view('admin.page.catagory.viewcatagory',compact('data'));
    }
   public function addcatagory(Request $request)
   {
          $data= new Catagory();
          $data->catagory_name=$request->catagory_name;
          $data->save();
          return redirect()->back()->with('message','Catagory Added Successfully');

    }
    public function delete_catagory($id)
  {
    $data=catagory::find($id);
    $data->delete();
    return redirect()->back()->with('message' ,'catagory is deleted successfully ');
 }

//  product

public function view_product(){
    $catagory= catagory::all();
    return view('admin.page.product.viewproduct' ,compact('catagory'));
 }
 public function add_product(Request $request)
{


    // Save the product
    $product = new Product();
    $product->title = $request->title;
    $product->descrption = $request->descrption;
    $image = $request->image;
    if ($image) {
        // Correct the method name here
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move('productimage', $imagename);
        $product->image = $imagename;
    }
    $product->catagory = $request->catagory;
    $product->quantity = $request->quantity;
    $product->price = $request->price;
    $product->discountprice = $request->discountprice;
    $product->save();

    return redirect()->back()->with('message', 'Product added successfully!');
}
public function show_product()
{
    $product=Product::all();
    return view('admin.page.product.showproduct' , compact('product'));
}
public  function delete_product($id)
{
    $product= Product::find($id);
    $product->delete();
    return Redirect()->back()->with('message' ,'product delete sucessfully');
}
public  function edit_product($id)
{
    $product= Product::find($id);
    $catagory= catagory::all();

    return view('admin.page.product.editproduct' , compact('product', 'catagory'));
}
public function edit_product_confirm(Request $request ,$id)
{
    $product = new Product();
    $product->title = $request->title;
    $product->descrption = $request->descrption;
    $image = $request->image;
    if ($image) {
        // Correct the method name here
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move('productimage', $imagename);
        $product->image = $imagename;
    }
    $product->catagory = $request->catagory;
    $product->quantity = $request->quantity;
    $product->price = $request->price;
    $product->discountprice = $request->discountprice;
    $product->save();

    return redirect()->back()->with('message', 'Product added successfully!');
}

// order


public function order()
{
    $order= Order::all();
    return view('admin.page.order.order' ,compact('order'));
}


public function delivery($id)
{
    $order= Order::find($id);
    $order->delivery_status="delivery";
    $order->payment_status="paid";

    $order->save();
    return redirect()->back();
}


}
