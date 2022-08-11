<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionSheet extends Model
{
    use HasFactory;

    protected $fillable = ['code','title','description', 'status', 'password', 'created_by'];

    public function question(){
        return $this->hasMany(Question::class);
    }

    public function exam_history(){
        return $this->hasMany(ExamHistory::class);
    }
}
