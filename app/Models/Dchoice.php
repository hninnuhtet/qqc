<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class Dchoice extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'q_id'];
    
    public function question(){
        return $this->belongsTo(Question::class);
    }
}
