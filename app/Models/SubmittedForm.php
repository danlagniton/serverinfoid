<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubmittedForm extends Model
{
    protected $fillable = [
        'form_name',
        'template_id',
        'user_id',
        'appointment_schedule',
        'status',
        'approval_date'
    ];

    /* 
        atttibutes
    */
    public function answers(){
        return $this->hasMany(Answer::class);
    }

    public function template(){
        return $this->belongsTo(Template::class);
    }

    public function getUserAttribute(){
        if($this->user_id){
            $user = User::find($this->user_id);

            return $user->first_name . ' ' . $user->last_name;
        } else {
            return "--";
        }
    }

    public function getSiteAttribute(){
        if($this->site_id){
            $site = Sites::find($this->site_id);

            return $site->site_name;
        } else {
            return "--";
        }
    }

    protected $appends = ['user', 'site'];

    /* 
        Scopes
    */
    public function scopeFilterByRole($query, $userId){
        return $query->where('user_id', $userId);
    }

    public function scopeFilterByAppointmentDate($query, $appointmentDate){
        return $query->whereDate('appointment_schedule', '=', $appointmentDate);
    }
    
    public function scopeFilterByStatus($query, $status){
        return $query->where('status', 'like', '%'. $status .'%');
    }

    public function scopeFilterByApprovalDate($query, $approvalDate){
        return $query->whereDate('approval_date', '=', $approvalDate);
    }

    public function scopeFilterByGreaterThanAppointmentDate($query, $fromAppointmentDate){
        return $query->whereDate('appointment_schedule', '>=', $fromAppointmentDate);
    }
    
    public function scopeFilterByLessThanAppointmentDate($query, $toAppointmentDate){
        return $query->whereDate('appointment_schedule', '<=', $toAppointmentDate);
    }

    public function scopeFilterByAppointmentDateRange($query, $fromAppointmentDate, $toAppointmentDate){
        return $query->whereBetween('appointment_schedule', [$fromAppointmentDate, $toAppointmentDate]);
    }
    
    public function scopeFilterByGreaterThanApprovalDate($query, $fromApprovalDate){
        return $query->whereDate('approval_date', '>=', $fromApprovalDate);
    }
    
    public function scopeFilterByLessThanApprovalDate($query, $toApprovalDate){
        return $query->whereDate('approval_date', '<=', $toApprovalDate);
    }

    public function scopeFilterByApprovalDateRange($query, $fromApprovalDate, $toApprovalDate){
        return $query->whereBetween('approval_date', [$fromApprovalDate, $toApprovalDate]);
    }

    public function scopeGetCountByStatus($query, $status){
        return $query->where('status', $status)->count();
    }

    /* 
        Validation rules
    */
    public const VALIDATION_RULES = [
        'appointment_schedule' => ['required'],
    ];


}
