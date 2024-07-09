<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function login(Request $request) {
        $data = [
            'title' => 'Login | StrokeCare',
        ];
    
        return view('login', $data);
    }
    public function register(Request $request) {
        $data = [
            'title' => 'register | StrokeCare',
        ];
    
        return view('register', $data);
    }
    public function dashboard(Request $request) {
        $data = [
            'title' => 'dashboard | StrokeCare',
        ];
    
        return view('auth.dashboard', $data);
    }

    public function adminDashboard(Request $request) {
        $data = [
            'title' => 'dashboard | StrokeCare',
        ];
    
        return view('admin.dashboard', $data);
    }
    
    
}
