@extends('layouts.app')
@section('page')

<?php
    echo Page::header(["title"=>"Edit Patient"]);
    echo Page::body_open();
    echo Page::content_open(["title"=>"Edit Patient"]);

    echo Form::open_laravel(["route"=>"patients/$patient->id","method"=>"PUT"]);
    echo Form::text(["name"=>"name","label"=>"Name","value"=>"$patient->name"]);
    echo Form::text(["name"=>"dob","label"=>"Date of Birth","type"=>"date","value"=>"$patient->dob"]);
    echo Form::select(["name"=>"blood","label"=>"Blood Group","table"=>$bloods,"value"=>$patient->bloods_id]);
    echo Form::select(["name"=>"gender","label"=>"Gender","table"=>$genders,"value"=>$patient->gender_id]);
    echo Form::text(["name"=>"email","label"=>"Email","value"=>"$patient->email"]);
    echo Form::text(["name"=>"address","label"=>"Address","value"=>"$patient->address"]);
    echo Form::text(["name"=>"contact_number","label"=>"Contact Number","value"=>"$patient->contact_number"]);
    echo Form::text(["name"=>"employee","label"=>"Employee","value"=>"$patient->employee"]);
    echo Form::select(["name"=>"type","label"=>"Type","table"=>$types,"value"=>$patient->type_id]);
    echo Form::select(["name"=>"doctor","label"=>"Doctor","table"=>$doctors,"value"=>$patient->doctor_id]);


    echo "<label for='photo'>Current Photo:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>";
    echo "<img src='" . asset('img/' . $patient->photo) . "' alt='Patient Photo' style='max-width: 200px; max-height: 200px;'><br>";
    echo Form::field(["name"=>"photo","label"=>"Photo","type"=>"file"]);

    echo "<div class='btn-group'>";
    echo Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Update"]);
    echo Html::link(["route"=>url("patients"),"text"=>"Manage"]);
    echo "</div>";

    echo Form::close();  

    echo Page::content_close();
    echo Page::body_close();


?>


@endsection