<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class TokenController extends Controller
{
    public function index($userId)
    {
        $response = Http::get('http://localhost:3000/user-tokens/'.$userId);

        $tokens = [];
        if ($response->successful()) {
            $jsonResponse = $response->json();
            
            $tokens = is_array($jsonResponse) ? $jsonResponse : [];
        }
        
        return view('tokens.index', compact('tokens','userId'));

    }

    public function create($userId)
    {
       
        return view('tokens.create', compact('userId'));
    }


      

    public function store(Request $request)
    {
        try {
            $response = Http::post('http://localhost:3000/hedera-tokens/create-token', [
                'name' => $request->input('name'),
                'symbol' => $request->input('symbol'),
                'initialSupply' => $request->input('initialSupply'),
                'userId' => $request->input('userId'),
            ]);

           
            if ($response->successful()) {
                $data = $response->json();
               
                if ($data['tokenId']) {
                    return redirect('/tokens/'.$request->input('userId'))->withSuccess('Register Success, token: '.$data['tokenId']);
                }else{
                    return redirect('/tokens/'.$request->input('userId'))->withDelete('Token failed. Please try again.');
                }
            } else {
                return redirect('/tokens/'.$request->input('userId'))->withDelete('Registration failed. Please try again.');
            }
        } catch (\Exception $e) {
            return redirect('/tokens/'.$request->input('userId'))->withDelete('Registration failed. Please try again.');
        }
    }

   
}
