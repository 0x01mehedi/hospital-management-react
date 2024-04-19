@extends('layouts.app')
@section('page')

<?php
echo Page::header(["title"=>"Manage Bed"]);

echo Page::body_open();

echo Page::content_open(["title"=>"Create Bed","button"=>"Bed","route"=>"beds"]);

// foreach($roles as $role){
//   echo $role->name."<br>";
// }
echo Table::get_array_table($beds,["id","name","category_id","room_id","status_id"],"beds");
?>

{{$beds->links("pagination::bootstrap-4")}}

<?php
echo Page::content_close();
echo Page::body_close();
?>

@endsection