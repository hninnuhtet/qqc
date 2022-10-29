<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\QuestionSheet;

class ExamHistory extends Model
{
    use HasFactory;

    protected $fillable = ['student_id','qs_id','full_mark', 'score'];

    public function question_sheet(){
        return $this->belongsTo(QuestionSheet::class, 'qs_id');
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
