<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::all();
        return view('admin.skill.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skill = new Skill();
        return view('admin.skill.create', compact('skill'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:30|string|regex:/^([^0-9]*)$/',
            'category' => 'required|max:40|string|regex:/^([^0-9]*)$/',
            'type' => 'required|in:Front-end,Back-end,Full-stack',
            'skill_image' => 'image|max:8000|nullable',
            'url' => 'url|nullable',
            'user_id' => 'numeric|required',
        ]);

        if ($request->hasFile('skill_image')) {
            $filePath = $request->file('skill_image')->store('skill', 'public');
            $data['skill_image'] = basename($filePath);
        }

        Skill::create($data);

        return redirect()->route('admin.skill')->with('success', 'Skill creata con successo!');
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
    public function edit(Skill $skill)
    {
        return view('admin.skill.create', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {

        $data = $request->validate([
            'name' => 'required|max:60|string|regex:/^([^0-9]*)$/',
            'category' => 'required|max:60|string|regex:/^([^0-9]*)$/',
            'type' => 'required|in:Front-end,Back-end,Full-stack',
            'skill_image' => 'image|max:8000|nullable',
            'url' => 'url|nullable',
            'user_id' => 'numeric|required|exists:users,id',
        ]);

        if ($request->hasFile('skill_image')) {
            if ($skill->skill_image && Storage::disk('public')->exists('skill/' . $skill->skill_image)) {
                Storage::disk('public')->delete('skill/' . $skill->skill_image);
            }

            $filePath = $request->file('skill_image')->store('skill', 'public');
            $data['skill_image'] = basename($filePath);
        }

        $skill->update($data);


        return redirect()->route('admin.skill')->with('success', 'Skill aggiornata con successo!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        Log::info('Cancellazione skill avviata', ['skill' => $skill]);
        if ($skill->skill_image && Storage::disk('public')->exists('skill/' . $skill->skill_image)) {
            Storage::disk('public')->delete('skill/' . $skill->skill_image);
        }

        $skill->delete();

        return redirect()->route('admin.skill')->with('danger', 'Skill eliminata con successo!');
    }
}
