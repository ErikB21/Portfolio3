<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    public function index(){
        $certification = Certification::orderBy('date_relase_certifications', 'desc')->get();
        return response()->json(['certifications' => $certification]);
    }
}
