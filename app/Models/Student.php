<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudentAnswer;
use App\Models\ExamHistory;


class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password'];

    public function student_answer(){
        return $this->belongsTo(StudentAnswer::class);
    }

    public function exam_history(){
        return $this->hasMany(ExamHistory::class);
    }
}
