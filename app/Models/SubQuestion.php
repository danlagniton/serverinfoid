<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubQuestion extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = ['question', 'field_type', 'options', 'question_id', 'template_id', 'is_latest_version'];

    public function primaryQuestion(){
        return $this->belongsTo(Question::class);
    }

    /* 
        Custom attributes
    */
    public function getNameAttribute(){
        return "question_" . $this->question_id . "_" . $this->id;
    }

    public function getValidationTypeAttribute(){
        return "string";
    }

    protected $appends = ['name', 'validationType'];

    public const VALIDATION_RULES = [
        'question' => ['required'],
        'field_type' => ['required'],
        'template_id' => ['required'],
    ];
}
