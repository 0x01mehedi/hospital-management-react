@extends('layouts.app')
@section('page')


<?php
    echo Page::header(["title"=>"Create Patient"]);
    echo Page::body_open();
    echo Page::content_open(["title"=>"Create Patient"]);

  echo Form::open_laravel(["route"=>"patients"]);
  echo Form::text(["name"=>"name","label"=>"Name"]);
  echo Form::text(["name"=>"dob","label"=>"Date of Birth","type"=>"date"]);
  echo Form::select(["name"=>"blood","label"=>"Blood Blood","table"=>$bloods]);

  echo Form::select(["name"=>"gender","label"=>"Gender","table"=>$genders]);

  echo Form::text(["name"=>"address","label"=>"Address"]);
  echo Form::text(["name"=>"contact","label"=>"Contact Number"]);
  echo Form::text(["name"=>"email","label"=>"Email"]);
  echo Form::text(["name"=>"employee","label"=>"Employee"]);
  echo Form::select(["name"=>"type","label"=>"Type","table"=>$types]);
  echo Form::select(["name"=>"doctor","label"=>"Doctor","table"=>$doctors]);
  echo Form::text(["name"=>"photo","label"=>"Photo","type"=>"file"]);

  echo Form::button(["name"=>"btnSubmit","value"=>"Save","type"=>"submit"]);

  
  echo Form::close();
  echo Page::content_close();
  echo Page::body_close();
?>
@endsection