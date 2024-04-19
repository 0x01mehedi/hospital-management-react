@extends('layouts.app')
@section('page')

<?php
    echo Page::header(["title"=>"Edit Appointment"]);
    echo Page::body_open();
    echo Page::content_open(["title"=>"Edit Appointment"]);

    echo Form::open_laravel(["route" => "appointments/$appointment->id", "method" => "PUT"]);
    echo Form::select(["name" => "patient", "label" => "Patient", "table" => $patients, "selected" => $appointment->patient_id]);
    echo Form::select(["name" => "doctor", "label" => "Doctor", "table" => $doctors, "selected" => $appointment->doctor_id]);
    echo Form::text(["name" => "date", "label" => "Appointment Date", "type" => "date", "value" => date('Y-m-d', strtotime($appointment->appointment_date))]);
    echo Form::text(["name" => "time", "label" => "Appointment Time", "type" => "time", "value" => $appointment->appointment_time]);
    echo Form::select(["name" => "status", "label" => "Appointment Statuses", "table" => $statuses, "selected" => $appointment->appointment_statuses_id]);

    echo Form::button(["name" => "btnSubmit", "value" => "Update", "type" => "submit"]);
  
    echo Form::close();
    echo Page::content_close();
    echo Page::body_close();
?>
@endsection
