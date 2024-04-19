@extends('layouts.app')
@section('page')
<?php
    echo Page::header(["title"=>"Create Beds"]);
    echo Page::body_open();
    echo Page::content_open(["title"=>"Create Bed"]);

  echo Form::open_laravel(["route"=>"beds"]);
  echo Form::text(["name"=>"name","label"=>"Name"]);
  echo Form::text(["name"=>"category_id","label"=>"Category"]);
  
  echo Form::text(["name"=>"room_id","label"=>"Room"]);
  echo Form::text(["name"=>"status_id","label"=>"Status"]);

  echo Form::button(["name"=>"btnSubmit","value"=>"Save","type"=>"submit"]);
  echo Form::close();
  echo Page::content_close();
  echo Page::body_close();
?>
@endsection