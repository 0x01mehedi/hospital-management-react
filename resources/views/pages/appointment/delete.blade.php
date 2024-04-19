@extends('layouts.app')
@section('page')

<?php
echo Page::header(["title"=>"Delete Appointment"]);

echo Page::body_open();
echo Page::content_open(["title"=>"Are you sure to delete"]);

echo "<table class='table'>";
echo "<tr><th>ID</th><th>$appointment->id</th></tr>";
echo "<tr><th>Patient</th><th>$appointment->patient_id</th></tr>";
echo "<tr><th>Doctor</th><th>$appointment->doctor_id</th></tr>";
echo "<tr><th>Appointment Date</th><th>$appointment->appointment_date</th></tr>";
echo "<tr><th>Appointment Time</th><th>$appointment->appointment_time</th></tr>";
echo "<tr><th>Appointment Statses</th><th>$appointment->appointment_statuses_id</th></tr>";
echo "</table>";


echo Form::open_laravel(["route"=>"appointments/$appointment->id","method"=>"DELETE"]);
echo "<div class='btn-group'>";
echo Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Delete","class"=>"btn btn-danger"]);
echo Html::link(["route"=>url("appointments"),"text"=>"Manage"]);
echo "</div>";

// echo get_array_table($roles,["id","name"],"roles");

echo Form::close();

echo Page::content_close();
echo Page::body_close();
?>

@endsection