<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\QuestionSheet;
use App\Models\Student;

class ExamHistory extends Model
{
    use HasFactory;

    protected $fillable = ['question', 'qs_id', 'student_id'];

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function question_sheet(){
        return $this->belongsTo(QuestionSheet::class);
    }
}
