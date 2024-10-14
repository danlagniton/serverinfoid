<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $fillable = ['template_name', 'instructions', 'form_footer', 'user_id', 'status'];

    public function getCreatedByAttribute(){
        return User::find($this->user_id)->full_name;
    }

    // public function user(){
    //     return $this->belongsTo(User::class);
    // }

    // public function questions(){
    //     return $this->hasMany(Question::class);
    // }

    protected $appends = ['created_by'];

    /* 
        Scopes
    */
    public function scopeFilterByTemplateName($query, $templateName){
        return $query->where('template_name', 'like', '%'. $templateName .'%');
    }

    public function scopeFilterByStatus($query, $status){
        return $query->where('status', $status);
    }

    public function scopeFilterActiveTemplates($query){
        return $query->where('status', "Active");
    }

    public function scopeFilterInactiveTemplates($query){
        return $query->where('status', "Inactive");
    }

    public function scopeGetActiveTemplates($query){
        return $query->where('status', 'Active');
    }
    
    public const VALIDATION_RULES = [
        'template_name' => [
            'required',
            'unique:templates'
        ],
        'instructions' => ['required'],
        'form_footer' => ['required'],
    ];
}
