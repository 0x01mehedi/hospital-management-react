@extends('layouts.app')
@section('page')

<?php
    echo Page::header(["title"=>"Edit Role"]);
    echo Page::body_open();
    echo Page::content_open(["title"=>"Edit Role"]);

    echo Form::open_laravel(["route"=>"roles/$role->id","method"=>"PUT"]);
    echo Form::text(["name"=>"name","label"=>"Name","value"=>"$role->name"]);
    echo "<div class='btn-group'>";
    echo Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Update"]);
    echo Html::link(["route"=>url("roles"),"text"=>"Manage"]);
    echo "</div>";
    echo Form::close();

    echo Page::content_close();
    echo Page::body_close();


?>


@endsection