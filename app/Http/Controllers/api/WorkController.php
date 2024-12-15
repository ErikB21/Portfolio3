<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index(){
        $works = Work::orderBy('work_start', 'desc')->get();
        return response()->json(['works' => $works]);
    }
}
