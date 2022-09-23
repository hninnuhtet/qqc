<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ExamHistory;
use App\Models\StudentAnswer;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password'];

    public function exam_history(){
        return $this->hasMany(ExamHistory::class);
    }

    public function student_answer(){
        return $this->belongsTo(StudentAnswer::class);
    }
}
