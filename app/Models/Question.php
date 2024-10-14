<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = ['question', 'field_type', 'options', 'template_id', 'is_latest_version'];
    
    /**
     * Get the sub questions for the specific question.
     */
    public function subQuestions()
    {
        return $this->hasMany(SubQuestion::class);
    }

    /* 
        Custom attributes
    */
    public function getNameAttribute(){
        return "question_" . $this->id;
    }

    public function getValidationTypeAttribute(){
        return "string";
    }

    protected $appends = ['name', 'validationType'];

    /* 
        Scopes
    */
    //    Get count of questions by template id
    public function scopeGetQuestionsCountByTemplateId($query, $templateId){
        return $query->where('template_id', $templateId)->count();
    }
    
    public function scopeGetQuestionsByTemplateId($query, $templateId){
        return $query->where('template_id', $templateId);
    }
    
    public const VALIDATION_RULES = [
        'question' => ['required'],
        'field_type' => ['required'],
        'template_id' => ['required'],
    ];
}

