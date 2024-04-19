@extends('layouts.app')
@section('page')

<?php
echo Page::header(["title"=>"Delete Patient"]);

echo Page::body_open();
echo Page::content_open(["title"=>"Are you sure to delete"]);

echo "<table class='table'>";
echo "<tr><th>ID</th><th>$patient->id</th></tr>";
echo "<tr><th>Name</th><th>$patient->name</th></tr>";
echo "<tr><th>Email</th><th>$patient->email</th></tr>";
echo "<tr><th>Contact</th><th>$patient->contact_number</th></tr>";
echo "</table>";


echo Form::open_laravel(["route"=>"patients/$patient->id","method"=>"DELETE"]);
echo "<div class='btn-group'>";
echo Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Delete","class"=>"btn btn-danger"]);
echo Html::link(["route"=>url("patients"),"text"=>"Manage"]);
echo "</div>";

// echo get_array_table($roles,["id","name"],"roles");

echo Form::close();

echo Page::content_close();
echo Page::body_close();
?>

@endsection