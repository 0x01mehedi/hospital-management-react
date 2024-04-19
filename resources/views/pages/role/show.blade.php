@extends('layouts.app')
@section('page')

<?php
echo Page::header(["title"=>"Show Role"]);

echo Page::body_open();
echo Page::content_open(["title"=>"Show Role"]);

echo "<table class='table'>";
echo "<tr><th>ID</th><th>$role->id</th></tr>";
echo "<tr><th>Name</th><th>$role->name</th></tr>";
echo "</table>";
echo Html::link(["route"=>url("roles"),"text"=>"Manage"]);
echo Page::content_close();
echo Page::body_close();
?>

@endsection