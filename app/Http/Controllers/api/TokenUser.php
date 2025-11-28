<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class TokenUser extends Controller
{
     public function index()
    {
        $tokens = Auth::user()->tokens;

        return view('backend.api.index', compact('tokens'));
    }

    public function create(Request $request)
    {
        
         $request->validate([
            'name' => 'required'
        ]);

        $user = Auth::user();

        // Token abilities (izin token)
        $abilities = ['access-projects'];

        // Buat token
        $token = $user->createToken($request->name, $abilities);

        // Simpan metadata
        $user->tokens()->where('id', $token->accessToken->id)->update([
            'meta_name'  => $user->name,
            'meta_email' => $user->email,
        ]);

        return back()->with('token', $token->plainTextToken);
    }

    public function destroy($id)
    {
        PersonalAccessToken::findOrFail($id)->delete();
        Auth::user()->tokens()->where('id', $id)->delete();
       
        return back()->with('success', 'Token deleted');
    }
}
