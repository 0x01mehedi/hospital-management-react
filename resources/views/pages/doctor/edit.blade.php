@extends('layouts.app')
@section('page')

<?php
    echo Page::header(["title"=>"Edit Doctor"]);
    echo Page::body_open();
    echo Page::content_open(["title"=>"Edit Doctor"]);

    echo Form::open_laravel(["route"=>"doctors/$doctor->id","method"=>"PUT"]);
    echo Form::text(["name"=>"name","label"=>"Name","value"=>"$doctor->name"]);
    echo Form::select(["name"=>"department","label"=>"Department","table"=>$departments,"value"=>$doctor->department_id]);  
    echo Form::text(["name"=>"phone","label"=>"Phone","value"=>"$doctor->phone"]);
    echo Form::text(["name"=>"address","label"=>"Address","value"=>"$doctor->address"]);
    echo Form::text(["name"=>"designation","label"=>"Designation","value"=>"$doctor->designation"]);
    echo Form::text(["name"=>"email","label"=>"Email","value"=>"$doctor->email"]);
    echo Form::text(["name"=>"schedule","label"=>"Schedule","value"=>"$doctor->schedule"]);
    echo Form::text(["name"=>"appointment","label"=>"Available Appointments","value"=>"$doctor->appointment"]);

    echo "<label for='photo'>Current Photo:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>";
    echo "<img src='" . asset('img/' . $doctor->photo) . "' alt='Doctor Photo' style='max-width: 200px; max-height: 200px;'><br>";
    echo Form::field(["name"=>"photo","label"=>"Photo","type"=>"file"]);

    echo "<div class='btn-group'>";
    echo Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Update"]);
    echo Form::close();
    echo "</div>";

    echo Page::content_close();
    echo Page::body_close();


?>


@endsection