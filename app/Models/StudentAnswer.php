<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\Student;

class StudentAnswer extends Model
{
    use HasFactory;

    protected $fillable = ['id','student_id','q_id','answer'];

    public function question(){
        return $this->hasMany(Question::class);
    }

    public function student(){
        return $this->hasMany(Student::class);
    }
}
