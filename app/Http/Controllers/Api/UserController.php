<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:3000/auth/users');

        $users = [];
        if ($response->successful()) {
            $jsonResponse = $response->json();
            $users = is_array($jsonResponse) ? $jsonResponse : [];
        }
        
        return view('users.index', compact('users'));

    }

    public function create()
    {
       
        return view('users.create');
    }

    public function login()
    {
       
        return view('users.login');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'username'         =>'required|max:40',
            'password'         =>'required|max:20|confirmed|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6'

        ]);

        if($request->password != $request->password_confirmation){
            return redirect('/users')->withDanger('Las contraseñas no coinciden!');
        }
       
        try {
            $response = Http::post('http://localhost:3000/auth/register', [
                'username' => $request->input('username'),
                'password' => $request->input('password'),
            ]);
    
            if ($response->successful()) {
                $data = $response->json();
               
                if ($data['access_token']) {
                    return redirect('/users')->withSuccess('Register Success, token: '.$data['access_token']);
                }else{
                    return redirect('/users')->withDelete('Token failed. Please try again.');
                }
            } else {
                return redirect('/users')->withDelete('Registration failed. Please try again.');
            }
        } catch (\Exception $e) {
            return redirect('/users')->withDelete('Registration failed. Please try again.');
        }


    }

    public function storeLogin(Request $request)
    {
        
        try {
            $response = Http::post('http://localhost:3000/auth/login', [
                'username' => $request->input('username'),
                'password' => $request->input('password'),
            ]);
    
            if ($response->successful()) {
                $data = $response->json();
               
                if ($data['access_token']) {
                    return redirect('/tokens/'.$data['userId'])->withSuccess('Login Success, token: '.$data['access_token']);
                }else{
                    return redirect('/users')->withDelete('Token failed. Please try again.');
                }
            } else {
                return redirect('/users')->withDelete('Login failed. Please try again.');
            }
        } catch (\Exception $e) {
            return redirect('/users')->withDelete('Login failed. Please try again.');
        }
    }
}
