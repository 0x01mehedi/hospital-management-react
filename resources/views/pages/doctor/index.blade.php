@extends('layouts.app')
@section('page')

<?php
echo Page::header(["title"=>"Manage Doctor"]);

echo Page::body_open();

echo Page::content_open(["title"=>"Create Doctor","button"=>"Doctor","route"=>"doctors"]);

// foreach($roles as $role){
//   echo $role->name."<br>";
// }
echo Table::get_array_table($doctors,["id","name","phone","email"],"doctors");
?>

{{$doctors->links("pagination::bootstrap-4")}}

<?php
echo Page::content_close();
echo Page::body_close();
?>

@endsection