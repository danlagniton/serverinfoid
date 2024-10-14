@component('mail::message')
# Hello

{{ $submittedFormData['body'] }}

@component('mail::table')
|**Field**              |**Details**                                  |
| ----------------------|---------------------------------------------| 
| User                  |{{ $submittedFormData['user'] }}                 | 
| Appointment Schedule  |{{ date("F d, Y h:ia", strtotime($submittedFormData['appointment_schedule'])) }} |
| Status                |{{ $submittedFormData['status'] }}               |
@endcomponent


<br><br>
{{ $submittedFormData['footer'] }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
