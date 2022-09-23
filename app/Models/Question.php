<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\UuidTrait;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\QuestionSheet;
use App\Models\Achoice;
use App\Models\Bchoice;
use App\Models\Cchoice;
use App\Models\Dchoice;
use App\Models\Answer;
use App\Models\StudentAnswer;

class Question extends Model
{
    use HasApiTokens, HasFactory, Notifiable, UuidTrait;

    protected $fillable = ['id', 'question', 'qs_id'];

    public function question_sheet(){
        return $this->belongsTo(QuestionSheet::class);
    }

    public function achoice(){
        return $this->hasMany(Achoice::class);
    }

    public function bchoice(){
        return $this->hasMany(Bchoice::class);
    }

    public function cchoice(){
        return $this->hasMany(Cchoice::class);
    }

    public function dchoice(){
        return $this->hasMany(Dchoice::class);
    }

    public function answer(){
        return $this->hasMany(Answer::class);
    }

    public function student_answer(){
        return $this->belongsTo(StudentAnswer::class);
    }
}
