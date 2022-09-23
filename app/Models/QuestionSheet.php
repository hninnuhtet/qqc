<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\UuidTrait;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Question;
use App\Models\ExamHistory;

class QuestionSheet extends Model
{
    use HasApiTokens, HasFactory, Notifiable, UuidTrait;

    protected $fillable = ['id','code','title','description', 'status', 'created_by'];

    public function question(){
        return $this->hasMany(Question::class);
    }

    public function exam_history(){
        return $this->hasMany(ExamHistory::class);
    }
}
