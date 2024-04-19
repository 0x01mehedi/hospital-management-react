@extends('layouts.app')
@section('page')

<?php
echo Page::header(["title"=>"Manage Patient"]);

echo Page::body_open();

echo Page::content_open(["title"=>"Create Patient","button"=>"Patient","route"=>"patients"]);
?>
<?php

echo Table::get_array_table($patients,["id","name","contact_number","email","photo"],"patients");
?>

{{$patients->links("pagination::bootstrap-4")}}

<?php
echo Page::content_close();
echo Page::body_close();
?>

@endsection