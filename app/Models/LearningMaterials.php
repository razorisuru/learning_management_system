<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningMaterials extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id', 'title', 'description', 'category', 'file_path', 'uploaded_by',
    ];

    public function subjects()
    {
        return $this->belongsTo(Subjects::class, 'subject_id', 'id');
    }

    // public function subject()
    // {
    //     return $this->belongsTo(Subjects::class);
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}
