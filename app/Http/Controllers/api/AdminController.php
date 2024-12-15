<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        {
            $user = User::first();
            return new UserResource($user);
            // return response()->json(['user' => $user]); // Restituisci i dati in formato JSON
        }
    }

}
