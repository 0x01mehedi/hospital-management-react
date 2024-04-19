@extends('layouts.app')
@section('page')


<?php
    echo Page::header(["title"=>"Create Appointment"]);
    echo Page::body_open();
    echo Page::content_open(["title"=>"Create Appointment"]);

  echo Form::open_laravel(["route"=>"appointments"]);
  echo Form::select(["name"=>"patient","label"=>"Patient","table"=>$patients]);
  echo Form::select(["name"=>"doctor","label"=>"Doctor","table"=>$doctors]);
  echo Form::text(["name"=>"date","label"=>"Appointment Date","type"=>"date"]);
  echo Form::text(["name"=>"time","label"=>"Appointment Time","type"=>"time"]);
  echo Form::select(["name"=>"status","label"=>"Appointment Statuses","table"=>$statuses]);

  echo Form::button(["name"=>"btnSubmit","value"=>"Save","type"=>"submit"]);

  
  echo Form::close();
  echo Page::content_close();
  echo Page::body_close();
?>
@endsection