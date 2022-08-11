<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['question', 'qs_id'];

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
}
