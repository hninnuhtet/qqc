<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['answer', 'q_id'];
    
    public function question(){
        return $this->belongsTo(Question::class);
    }
}
