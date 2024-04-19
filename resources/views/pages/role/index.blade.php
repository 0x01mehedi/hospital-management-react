@extends('layouts.app')
@section('page')

<?php
echo Page::header(["title"=>"Manage Role"]);

echo Page::body_open();

echo Page::content_open(["title"=>"Create Role","button"=>"Role","route"=>"roles"]);

// foreach($roles as $role){
//   echo $role->name."<br>";
// }
echo Table::get_array_table($roles,["id","name"],"roles");

?>



<?php

echo Page::content_close();
echo Page::body_close();
?>

@endsection