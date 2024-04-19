@extends('layouts.app')
@section('page')

<?php
echo Page::header(["title"=>"Show Appointment"]);

echo Page::body_open();
echo Page::content_open(["title"=>"Show Appointment"]);

echo "<table class='table'>";
echo "<tr><th>ID</th><td>$appointment->id</td></tr>";
echo "<tr><th>Patient</th><td>$appointment->patient</td></tr>";
echo "<tr><th>Doctor</th><td>$appointment->doctor</td></tr>";
echo "<tr><th>Appointment Date</th><td>".date('Y-m-d', strtotime($appointment->appointment_date))."</td></tr>"; 
echo "<tr><th>Appointment Time</th><td>" . date('H:i:s', strtotime($appointment->appointment_time)) . "</td></tr>"; 
echo "<tr><th>Appointment Statses</th><td>$appointment->statuses</td></tr>";

echo "</table>";
echo Html::link(["route"=>url("appointments"),"text"=>"Manage"]);
echo Page::content_close();
echo Page::body_close();
?>

@endsection
