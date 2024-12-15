<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificationController extends Controller
{
    public function index()
    {
        $certifications = Certification::orderBy('date_relase_certifications', 'desc')->get();
        return view('admin.certification.index', compact('certifications'));
    }

    public function create()
    {
        $certification = new Certification();
        return view('admin.certification.create', compact('certification'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_certifications' => 'required|max:80|string',
            'company_certifications' => 'required|max:40|string',
            'url_certifications' => 'url|nullable',
            'id_certifications' => 'string|nullable',
            'image_certifications' => 'image|max:8000|nullable|mimes:jpeg,png,jpg,gif',
            'date_relase_certifications' => 'date|nullable',
            'user_id' => 'numeric|required',
        ]);

        if ($request->hasFile('image_certifications')) {
            $filePath = $request->file('image_certifications')->store('certification', 'public');
            $data['image_certifications'] = basename($filePath);
        }

        Certification::create($data);

        return redirect()->route('admin.certification')->with('success', 'Nuova certificazione creata!');
    }

    public function edit(Certification $certification)
    {
        return view('admin.certification.create', compact('certification'));
    }

    public function update(Request $request, Certification $certification)
    {
        $data = $request->validate([
            'title_certifications' => 'required|max:80|string',
            'company_certifications' => 'required|max:40|string',
            'url_certifications' => 'url|nullable',
            'id_certifications' => 'string|nullable',
            'image_certifications' => 'image|max:8000|nullable|mimes:jpeg,png,jpg,gif',
            'date_relase_certifications' => 'date|nullable',
            'user_id' => 'numeric|required',
        ]);

        if ($request->hasFile('image_certifications')) {
            if ($certification->image_certifications && Storage::disk('public')->exists('certification/' . $certification->image_certifications)) {
                Storage::disk('public')->delete('certification/' . $certification->image_certifications);
            }

            $filePath = $request->file('image_certifications')->store('certification', 'public');
            $data['image_certifications'] = basename($filePath);
        }

        $certification->update($data);

        return redirect()->route('admin.certification')->with('success', 'Certificazione aggiornata con successo!');
    }

    public function destroy(Certification $certification)
    {
        if ($certification->image_certifications && Storage::disk('public')->exists('certification/' . $certification->image_certifications)) {
            Storage::disk('public')->delete('certification/' . $certification->image_certifications);
        }

        $certification->delete();

        return redirect()->route('admin.certification')->with('danger', 'Certificazione eliminata con successo!');
    }
}
