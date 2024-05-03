<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use Carbon\Carbon;

class RoomController extends Controller
{
    public function index()
    {
        $room_all = Room::paginate(12);
        return view('front.room', compact('room_all'));
    }

    public function filter(Request $request)
    {
        $query = Room::query();
        if ($request->has('month')) {
            $month = Carbon::createFromFormat('Y-m', $request->month)->month;
            $query->whereMonth('training_tanggal', '=', $month);
        }

        $room_all = $query->paginate(12);

        return view('front.room', compact('room_all'));
    }

    public function filterByType(Request $request)
    {
        $query = Room::query();
        
        if ($request->has('jenis_training')) {
            $query->where('jenis_training', $request->jenis_training);
        }

        // Filter berdasarkan bulan jika ada
    if ($request->has('month')) {
        $month = Carbon::createFromFormat('Y-m', $request->month)->month;
        $query->whereMonth('training_tanggal', '=', $month);
    }

        $room_all = $query->paginate(12);

        return view('front.room', compact('room_all'));
    }

    public function single_room($id)
    {
        $single_room_data = Room::with('rRoomPhoto')->where('id',$id)->first();
        return view('front.room_detail', compact('single_room_data'));
    }

    
}
