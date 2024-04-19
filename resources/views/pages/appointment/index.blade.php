@extends('layouts.app')
@section('page')

<?php
echo Page::header(["title"=>"Manage Appointment"]);

echo Page::body_open();

echo Page::content_open(["title"=>"Create Appointment","button"=>"Appointment","route"=>"appointments"]);
?>
<?php

echo Table::get_array_table($appointments,["id","patient","doctor","appointment_date","statuses"],"appointments");
?>

{{$appointments->links("pagination::bootstrap-4")}}

<?php
echo Page::content_close();
echo Page::body_close();
?>

@endsection