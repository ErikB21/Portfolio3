<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $project = Project::with('skills')->get();
        return response()->json(['projects' => $project]);
    }

    public function show($id)
    {
        $project = Project::with('skills')->find($id);
        if (!$project) {
            return response()->json(['message' => 'Progetto non trovato'], 404);
        }

        return response()->json(['project' => $project]);
    }

}
