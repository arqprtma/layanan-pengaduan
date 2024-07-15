<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Layanan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use PDF;



class UserController extends Controller
{
    //
    public function register(Request $request) {
    
        // dd($request->all());

        // $user_find = User::where('email', $request->email)->orWhere('username', $request->username)->first();
        // if($user_find){
        //     return redirect()->route('register')->with('error', 'Email atau Username sudah di gunakan')->withInput();;
        // }

        $data_request = [
            'name' => $request->username,
            
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 2
        ];

        $user = User::create($data_request);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('login');
    }

    public function login(Request $request) {
       
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = auth()->user();

            if($user->role == '2'){
                return redirect()->route('dashboard');
            }else if($user->role == '1'){
                return redirect()->route('admin.dashboard');
            }else if($user->role == '3'){
                return redirect()->route('petugas.dashboard');
            }

        }

        return back()->withErrors(['errors' => $credentials])->withInput();
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }

    public function pengaduan(Request $request){
        // dd($request->all());
        $data = [
            'id_user' => $request->id_user,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'tanggapan' => $request->tanggapan,
        ];

        Layanan::create($data);

        return redirect()->back();
    }

    public function verifikasi($id) {
        $pengaduan = Layanan::findOrFail($id);
        if ($pengaduan->status == 'belum') {
            $pengaduan->status = 'terverifikasi';
            $pengaduan->save();
        }
    
        return redirect()->back()->with('success', 'Pengaduan berhasil diverifikasi.');
    }

    public function edit($id)
    {
        $pengaduan = Layanan::findOrFail($id);
        $user = auth()->user();

        return view('auth.pengaduan-edit', compact('pengaduan', 'user'));
    }

    public function update(Request $request, $id)
    {
        $pengaduan = Layanan::findOrFail($id);
        $pengaduan->title = $request->title;
        $pengaduan->description = $request->description;
        $pengaduan->status = $request->status;
        $pengaduan->tanggapan = $request->tanggapan;
        $pengaduan->save();

        return redirect()->back()->with('success', 'Pengaduan berhasil diupdate.');
    }

    public function destroy($id)
    {
        $pengaduan = Layanan::findOrFail($id);
        $pengaduan->delete();

        return redirect()->back()->with('success', 'Pengaduan berhasil dihapus.');
    }

    public function exportPDF()
    {
        $pengaduans = Layanan::with('user')->get();
        $data = [
            'title' => 'dashboard | Layanan Pengaduan',
            'pengaduans' => $pengaduans, // Mengirim data pengaduan ke view
        ];
    
        return view('pdf', $data);

    }

    
}
