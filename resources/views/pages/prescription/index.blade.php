
@extends('layouts.app')
@section('page')

<?php
echo Page::header(["title"=>"Manage Prescription"]);
echo Page::body_open();
echo Page::content_open(["button"=>"Prescription","route"=>"prescriptions"]);
?>

<?php

echo Table::get_array_table($prescriptions,["id","patient_id","doctor_id","cc","advice","follow_up"],"prescriptions");

?>



<?php
echo Page::content_open(["button"=>"Prescription","route"=>"prescriptions.index"]);
echo Page::body_close();
?>

@endsection