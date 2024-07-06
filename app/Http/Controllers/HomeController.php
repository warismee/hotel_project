<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function room_details($id){
        $room = Room::find($id);
        return view('home.room_details',compact('room'));
    }

    public function add_booking(Request $request,$id){
        $request->validate([
            'startDate' => 'required|date',
            'endDate' => 'required|date|after:startDate',
        ]);

        $booking = new Booking();
        $booking->room_id = $id;
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->start_date = $request->startDate;
        $booking->end_date = $request->endDate;
        $booking->save();
        return redirect()->back()->with('message','Booking Added Successfully');
    }
}
