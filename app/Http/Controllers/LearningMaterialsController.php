<?php

namespace App\Http\Controllers;

use App\Models\DegreeProgramme;
use App\Models\LearningMaterials;
use App\Models\Subjects;
use Illuminate\Http\Request;

class LearningMaterialsController extends Controller
{
    public function index()
    {
        $subjects = Subjects::all();
        $degrees = DegreeProgramme::all();
        return view('UploadPDF.upload', compact(['subjects', 'degrees']));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'degree_programme_id' => 'required|exists:degree_programmes,id',
            'subject_id' => 'required|exists:subjects,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'files.*' => 'required|mimes:pdf,doc,docx,txt,pptx',
            'category' => 'required|string|in:lecture_notes,presentations,tests,activities',
        ]);

        if ($files = $request->file('files')) {
            foreach ($files as $key => $file) {
                // $extension = $file->getClientOriginalExtension();
                $filename = $file->getClientOriginalName();
                $path = "uploads/files/";
                $file->move($path, $filename);
                $imageData[] = [
                    'subject_id' => $request->subject_id,
                    'title' => $request->title,
                    'description' => $request->description,
                    'category' => $request->category,
                    'file_path' => $path . $filename,
                    'uploaded_by' => Auth()->user()->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

            }
        }
        LearningMaterials::insert($imageData);

        return redirect()->back()->with('status', 'Uploaded Successfully');
    }

    public function pre()
    {
        return view('cards');
    }
}
