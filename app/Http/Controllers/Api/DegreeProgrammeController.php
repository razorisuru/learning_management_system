<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\DegreeProgramme;
use App\Http\Controllers\Controller;

class DegreeProgrammeController extends Controller
{
    public function getSubjects(DegreeProgramme $degree)
    {
        // Eager load subjects
        $subjects = $degree->subjects()->get(['id','subject_code', 'name']);

        return response()->json($subjects);
    }
}
