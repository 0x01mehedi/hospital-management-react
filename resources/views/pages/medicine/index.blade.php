@extends('layouts.app')
@section('page')

<?php
echo Page::header(["title"=>"Manage Medicine"]);

echo Page::body_open();

echo Page::content_open(["title"=>"Create Medicine","button"=>"Medicine","route"=>"medicines"]);
?>
<?php

echo Table::get_array_table($medicines,["id","name","sale_price","store_box","quantity"],"medicines");
?>

{{$medicines->links("pagination::bootstrap-4")}}

<?php
echo Page::content_close();
echo Page::body_close();
?>

@endsection