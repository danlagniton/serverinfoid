<!DOCTYPE html>
<html>
    <head>
        <title>UAS HDF Notification</title>
    </head>
    
    <body>

        {{-- <h1>{{ $details['title'] }}</h1> --}}
        <p>Hi,

        <p>{{ $details['body'] }}</p>

        <table style="border: 1px solid black;">
            <tbody>
                <tr>
                    <td style="border-right: 1px solid black; border-bottom: 1px solid black;"><strong>User: </strong></td>
                    <td style="border-bottom: 1px solid black;">{{ $form_details->user }}</td>
                </tr>
                <tr>
                    <td style="border-right: 1px solid black; border-bottom: 1px solid black;"><strong>Appointment Schedule: </strong></td>
                    <td style="border-bottom: 1px solid black;">{{ date("F d, Y h:ia", strtotime($form_details->appointment_schedule)) }}</td>
                </tr>
                <tr>
                    <td style="border-right: 1px solid black;"><strong>Status: </strong></td>
                    <td>{{ $form_details->status }}</td>
                </tr>
            </tbody>

        </table>
        {{-- <strong>User: </strong> {{ $form_details->user }}<br>
        <strong>Appointment Schedule: </strong> {{ date("F d, Y h:ia", strtotime($form_details->appointment_schedule)) }}<br>
        <strong>Status: </strong> {{ $form_details->status }}<br> --}}

        <br><br>
        <p>This is a system generated email. Please do not reply.</p>
        <p>Thank you</p>
    
    </body>
</html>