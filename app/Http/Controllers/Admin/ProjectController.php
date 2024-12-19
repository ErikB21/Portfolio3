<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills = Skill::all();
        $project = new Project();
        return view('admin.project.create', compact('project', 'skills'));
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
            'name' => 'required|max:80|string',
            'text' => 'required|string|max:2000',
            'path_image' => 'required|image|max:8000',
            'url' => 'required|url',
            'url_video' => 'required|file|mimes:mp4,avi,mkv,webm|max:209715',
            'skills' => 'array|exists:skills,id', // Valida che le skill esistano
        ],[
            'required' => 'Il campo :attribute è obbligatorio.',
            'image' => ':attribute deve essere un\'immagine valida.',
            'url' => ':attribute deve essere un URL valido.',
            'file' => ':attribute deve essere un file.',
            'mimes' => ':attribute deve essere un video nei formati: mp4, avi, mkv, webm.',
            'max' => ':attribute deve essere un video di massimo 209715 Kb',
        ]);

        if($request->hasFile('path_image')) {
            $filePath = $request->file('path_image')->store('project', 'public');
            $data['path_image'] = basename($filePath);
        }

        if ($request->hasFile('url_video')) {
            try {
                $filePath = $request->file('url_video')->store('projectVideo', 'public');
                $data['url_video'] = basename($filePath);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Errore durante il caricamento del video. ' . $e->getMessage());
            }
        }

        $project = Project::create($data);
        if ($request->has('skills')) {
            $project->skills()->sync($request->skills); // Associa le skill al progetto
        }

        return redirect()->route('admin.project')->with('success', 'Nuovo progetto creato!');
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
    public function edit(Project $project)
    {
        $skills = Skill::all();
        $selectedSkills = $project->skills->pluck('id')->toArray(); // Recupera le skill associate al progetto
        return view('admin.project.create', compact('project', 'skills', 'selectedSkills'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'name' => 'nullable|max:80|string',
            'text' => 'nullable|string|max:2000',
            'path_image' => 'nullable|image|max:8000',
            'url' => 'nullable|url',
            'url_video' => 'nullable|file|mimes:mp4,avi,mkv,webm|max:209715',
            'skills' => 'array|exists:skills,id',
        ], [
            'image' => ':attribute deve essere un\'immagine valida.',
            'url' => ':attribute deve essere un URL valido.',
            'file' => ':attribute deve essere un file.',
            'mimes' => ':attribute deve essere un video nei formati: mp4, avi, mkv, webm.',
            'max' => ':attribute deve essere un video di massimo 209715 Kb',
        ]);



        if($request->hasFile('path_image')) {
            if($project->path_image && Storage::disk('public')->exists('project/' . $project->path_image)){
                Storage::disk('public')->delete('project/' . $project->path_image);
            }
            $filePath = $request->file('path_image')->store('project', 'public');
            $data['path_image'] = basename($filePath);
        }

        if ($request->hasFile('url_video')) {
            if ($project->url_video && Storage::disk('public')->exists('projectVideo/'.$project->url_video)) {
                Storage::disk('public')->delete('projectVideo/'.$project->url_video);
            }
            $filePath = $request->file('url_video')->store('projectVideo', 'public');
            $data['url_video'] = basename($filePath);
        }

        $project->update($data);
        if ($request->has('skills')) {
            $project->skills()->sync($request->skills); // Aggiorna le skill associate
        }

        return redirect()->route('admin.project')->with('success', 'Progetto aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project->path_image && Storage::disk('public')->exists('project/' . $project->path_image)) {
            Storage::disk('public')->delete('project/' . $project->path_image);
        }
        if ($project->url_video && Storage::disk('public')->exists('projectVideo/' . $project->url_video)) {
            Storage::disk('public')->delete('projectVideo/' . $project->url_video);
        }

        $project->delete();

        return redirect()->route('admin.project')->with('danger', 'Progetto eliminato con successo!');
    }
}
