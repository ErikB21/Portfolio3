<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $profileEdit = Auth::user();
        return view('admin.profile', compact('profileEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:40|string|regex:/^([^0-9]*)$/',
            'surname' => 'required|max:40|string|regex:/^([^0-9]*)$/',
            'email' => 'email|unique:users,email,' . Auth::id() . '|string',
            'profile_pic' => 'image|max:8000|nullable',
            'age' => 'numeric|nullable',
            'work' => 'required|max:255|min:3|nullable',
            'cv' => 'file|max:5000|nullable|mimes:pdf',
        ]);

        $profileUpdate = Auth::user(); // Usa Auth::user() direttamente
        Log::info('User Profile Pic: ' . $profileUpdate->profile_pic);
        $data = $request->all();

        // Controllo se c'è un file per la foto profilo
        if ($request->hasFile('profile_pic')) {
            // Elimina la vecchia immagine se esiste
            if ($profileUpdate->profile_pic && Storage::disk('public')->exists('profile_pic/'.$profileUpdate->profile_pic)) {
                Storage::disk('public')->delete('profile_pic/'.$profileUpdate->profile_pic);
            }
            // Salva la nuova immagine
            $filePath = $request->file('profile_pic')->store('profile_pic', 'public');
            $data['profile_pic'] = basename($filePath); // Aggiorna il percorso dell'immagine nel $data
        }

        // Controllo se c'è un file per il CV
        if ($request->hasFile('cv')) {
            // Elimina il vecchio CV se esiste
            if ($profileUpdate->cv && Storage::disk('public')->exists('cvs/'.$profileUpdate->cv)) {
                Storage::disk('public')->delete('cvs/'.$profileUpdate->cv);
            }
            // Salva il nuovo CV
            $filePath = $request->file('cv')->store('cvs', 'public');
            $data['cv'] = basename($filePath); // Aggiorna il percorso del CV nel $data
        }

        // Aggiorna il profilo con i nuovi dati
        $profileUpdate->update($data);

        return redirect()->route('admin.home')->with('success', 'Hai modificato correttamente il tuo profilo');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
