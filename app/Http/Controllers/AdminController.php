<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Room;
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
                return view('home.index', compact('rooms'));
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
        return view('home.index', compact('rooms'));
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
}
