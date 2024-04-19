@extends('layouts.app')
@section('page')

<?php
echo Page::header(["title"=>"Show User"]);

echo Page::body_open();
echo Page::content_open(["title"=>"Show User"]);

echo "<table class='table'>";
echo "<tr><th>ID</th><th>$user->id</th></tr>";
echo "<tr><th>Name</th><th>$user->name</th></tr>";
echo "</table>";
echo Html::link(["route"=>url("users"),"text"=>"Manage"]);
echo Page::content_close();
echo Page::body_close();
?>

@endsection