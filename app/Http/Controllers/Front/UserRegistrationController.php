<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Customer;
use Auth;
use DB;
use Illuminate\Http\Request;

class UserRegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        if(!Auth::guard('customer')->check()) {
            return redirect()->back()->with('error', 'Anda harus login terlebih dahulu untuk melakukan pendaftaran');
        }
        $id = session()->get('room_id');
        $room_data = Room::where('id',$id)->first();
        return view('front.daftar', compact('room_data'));
    }

    public function submit(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'room_id' => 'required',
            'nik' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'divisi' => 'required',
            'unit' => 'required',
            'nama_training' => 'required',
        ]);

        // Proses penyimpanan data ke database, atau lakukan sesuai kebutuhan aplikasi Anda
        session()->push('room_id',$request->room_id);
        // Setelah data disimpan, Anda bisa mengirimkan respons atau melakukan tindakan lainnya
        return redirect()->back()->with('success', 'Pendaftaran berhasil!');
    }

}
