<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    use HasFactory;

    protected $fillable = [
        'degree_programme_id', 'name', 'description',
    ];

    public function learningMaterials()
    {
        return $this->hasMany(LearningMaterials::class, 'subject_id', 'id');
    }

    public function degreeProgramme()
    {
        return $this->belongsTo(DegreeProgramme::class);
    }

    // public function learningMaterials()
    // {
    //     return $this->hasMany(LearningMaterials::class);
    // }
}
