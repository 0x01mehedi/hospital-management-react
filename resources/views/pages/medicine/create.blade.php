@extends('layouts.app')
@section('page')


<?php
    echo Page::header(["title"=>"Create Medicine"]);
    echo Page::body_open();
    echo Page::content_open(["title"=>"Create Medicine"]);

  echo Form::open_laravel(["route"=>"medicines"]);
  echo Form::text(["name"=>"name","label"=>"Name"]);
  echo Form::select(["name"=>"category","label"=>"Category","table"=>$category]);
  echo Form::text(["name"=>"purchase","label"=>"Purchase Price"]);

  echo Form::text(["name"=>"sale","label"=>"Sale Price"]);
  echo Form::text(["name"=>"store","label"=>"Store Box"]);

  echo Form::text(["name"=>"quantity","label"=>"Quantity"]);
  echo Form::text(["name"=>"generic","label"=>"Generic Name"]);
  echo Form::text(["name"=>"company","label"=>"Company"]);
  echo Form::text(["name"=>"effects","label"=>"Effects"]);
  echo Form::text(["name"=>"expire","label"=>"Expire Date"]);

  echo Form::button(["name"=>"btnSubmit","value"=>"Save","type"=>"submit"]);

  
  echo Form::close();
  echo Page::content_close();
  echo Page::body_close();
?>
@endsection