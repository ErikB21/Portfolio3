<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = Work::orderBy('work_start', 'desc')->get();
        return view('admin.work.index', compact('works'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $work = new Work();
        return view('admin.work.create', compact('work'));
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
            'work_title' => 'required|max:100|string',
            'work_company' => 'required|max:40|string',
            'work_city' => 'required|max:50|string',
            'work_start' => 'required|date',
            'work_end' => 'nullable|date',
            'work_present' => 'nullable|boolean',
            'type' => 'required|in:work,study',
            'work_explained' => 'required|string|max:1000',
            'work_logo' => 'nullable|image|max:8000',
            'user_id' => 'required|numeric',
        ]);

        $data['work_present'] = $request->has('work_present') ? $request->work_present : 0;

        // Mapping type to is_work / is_study
        $data['is_work'] = $data['type'] === 'work';
        $data['is_study'] = $data['type'] === 'study';
        unset($data['type']);

        if ($request->hasFile('work_logo')) {
            $data['work_logo'] = $request->file('work_logo')->store('work', 'public');
        }

        Work::create($data);

        if($data['is_work']){
            return redirect()->route('admin.work')->with('success', 'Nuovo lavoro creato con successo!');
        }else{
            return redirect()->route('admin.work')->with('success', 'Nuovo studio creato con successo!');
        }
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
    public function edit(Work $work)
    {
        return view('admin.work.create', compact('work'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work $work)
    {
        $data = $request->validate([
            'work_title' => 'required|max:100|string',
            'work_company' => 'required|max:40|string',
            'work_city' => 'required|max:50|string',
            'work_start' => 'required|date',
            'work_end' => 'nullable|date',
            'work_present' => 'nullable|boolean',
            'type' => 'required|in:work,study',
            'work_explained' => 'required|string|max:1000',
            'work_logo' => 'nullable|image|max:8000',
            'user_id' => 'required|numeric',
        ]);

        // Mapping type to is_work / is_study
        $data['is_work'] = $data['type'] === 'work';
        $data['is_study'] = $data['type'] === 'study';
        unset($data['type']);

        if ($request->hasFile('work_logo')) {
            if ($work->work_logo && Storage::disk('public')->exists('work/' . $work->work_logo)) {
                Storage::disk('public')->delete('work/' . $work->work_logo);
            }

            $filePath = $request->file('work_logo')->store('work', 'public');
            $data['work_logo'] = basename($filePath);
        }

        $work->update($data);
        if($data['is_work']){
            return redirect()->route('admin.work')->with('success', 'Lavoro aggiornato con successo!');
        }else{
            return redirect()->route('admin.work')->with('success', 'Studio aggiornato con successo!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        if ($work->image_certifications && Storage::disk('public')->exists('work/' . $work->work_logo)) {
            Storage::disk('public')->delete('work/' . $work->work_logo);
        }

        $work->delete();

        if($work->is_work){
            return redirect()->route('admin.work')->with('danger', 'Lavoro eliminato con successo!');
        }else{
            return redirect()->route('admin.work')->with('danger', 'Studio eliminato con successo!');
        }
    }
}
