<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        "question",
        "answer",
        "is_sub_question",
        "main_question",
        "submitted_form_id",
    ];
}
