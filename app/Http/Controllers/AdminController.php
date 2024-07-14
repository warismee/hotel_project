<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $usertype = Auth()->user()->usertype;
            if($usertype == 'user')
            {
                $rooms = Room::all();
                $gallery = Gallery::all();
                return view('home.index', compact('rooms','gallery'));
            }
            else if($usertype == 'admin')
            {
                return view('admin.index');
            }
            else
            {
                return redirect()->back();
            }
        }
    }

    public function home()
    {
        $rooms = Room::all();
        $gallery = Gallery::all();
        return view('home.index', compact('rooms','gallery'));
    }

    public function create_room()
    {
        return view('admin.create_room');
    }
    public function add_room(Request $request)
    {
        $data = new Room;
        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->room_type = $request->type;
        $data->wifi = $request->wifi;
        $image = $request->image;
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('roomimage',$imagename);
            $data->image = $imagename;
        }
        
        $data->save();
        return redirect()->back();
    }

    public function view_room()
    {
        $data = Room::all();
        return view('admin.view_room', compact('data'));
    }

    public function deleteroom($id){
        $room = Room::find($id);
        $room->delete();
        return redirect()->back();
    }

    
    public function update_room($id)
    {
        $room = Room::find($id);
        return view('admin.update_room', compact('room'));
    }

    public function edit_room(Request $request, $id){
        $room = Room::find($id);
        $room->room_title = $request->title;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->room_type = $request->type;
        $room->wifi = $request->wifi;
        $image = $request->image;
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('roomimage',$imagename);
            $room->image = $imagename;
        }
        
        $room->save();
        return redirect()->back();
    }

    public function bookings()
    {
        $data = Booking::all();
        return view('admin.booking', compact('data'));
    }

    public function deletebooking($id){
        $booking = Booking::find($id);
        $booking->delete();
        return redirect()->back();
    }

    public function approve_booking($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'Approved';
        $booking->save();
        return redirect()->back();
    }
    
    public function reject_booking($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'Rejected';
        $booking->save();
        return redirect()->back();
    }

    public function view_gallery()
    {
        $gallery = Gallery::all();
        return view('admin.view_gallery',compact('gallery'));
    }

    public function upload_gallery(Request $request)
    {
        $data = new Gallery;
        $image = $request->image;
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move(public_path('galleryimage'),$imagename);
            $data->image = $imagename;
        }
        
        $data->save();
        return redirect()->back();
    }

    public function delete_gallery($id)
    {
        $gallery = Gallery::find($id);
        $gallery->delete();
        return redirect()->back();
    }

    public function all_message()
    {
        $all_message=Contact::all();
        return view('admin.all_message',compact('all_message'));
    }
}
