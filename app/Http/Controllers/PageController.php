<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Layanan;



class PageController extends Controller
{
    //
    public function login(Request $request) {
        $data = [
            'title' => 'Login | Layanan Pengaduan',
        ];
    
        return view('login', $data);
    }
    public function register(Request $request) {
        $data = [
            'title' => 'register | Layanan Pengaduan',
        ];
    
        return view('register', $data);
    }
    public function dashboard(Request $request) {
        $user = auth()->user();
        $totalPengaduan = Layanan::where('id_user', $user->id)->count();
        $totalPengaduanDiverifikasi = Layanan::where('id_user', $user->id)->where('status', 'terverifikasi')->count();
    
        return view('auth.dashboard', compact('totalPengaduan', 'totalPengaduanDiverifikasi', 'user'));
    }

    public function adminDashboard(Request $request) {
        $user = auth()->user();
        $data = [
            'title' => 'dashboard | Layanan Pengaduan',
            'user' => $user
        ];
    
        return view('admin.dashboard', $data);
    }

    public function pengaduan(Request $request) {
        $user = auth()->user();
        $userId = Auth::id(); // Mendapatkan ID pengguna yang sedang login
        $pengaduans = Layanan::where('id_user', $userId)->get(); // Mengambil data layanan sesuai dengan ID pengguna
        $data = [
            'title' => 'dashboard | Layanan Pengaduan',
            'pengaduans' => $pengaduans, // Mengirim data pengaduan ke view
            'user' => $user
        ];
    
        return view('auth.pengaduan', $data);
    }

    public function adminPengaduan(Request $request) {
     
        $pengaduans = Layanan::all();// Mengambil data layanan sesuai dengan ID pengguna
        $data = [
            'title' => 'dashboard | Layanan Pengaduan',
            'pengaduans' => $pengaduans, // Mengirim data pengaduan ke view
        ];
    
        return view('admin.pengaduan', $data);
    }

    public function petugasDashboard(){
        $user = auth()->user();
        $data = [
            'title' => 'Dashboard | Layanan Pengaduan',
            'user' => $user
        ];
    
        return view('petugas.dashboard', $data);
    }

    public function petugasPengaduan(){
        $pengaduans = Layanan::all(); 
        $data = [
            'title' => 'Petugas | Layanan Pengaduan',
            'pengaduans' => $pengaduans, // Mengirim data pengaduan ke view
        ];
    
        return view('petugas.pengaduan', $data);
        
    }
    
    
}
