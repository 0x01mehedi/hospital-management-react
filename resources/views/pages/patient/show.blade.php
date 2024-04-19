@extends('layouts.app')
@section('page')

<?php
echo Page::header(["title"=>"Show Patient"]);

echo Page::body_open();
echo Page::content_open(["title"=>"Show Patient"]);

echo "<table class='table'>";
echo "<tr><th>ID</th><td>$patient->id</td></tr>";
echo "<tr><th>Name</th><td>$patient->name</td></tr>";
echo "<tr><th>Date of Birth</th><td>$patient->dob</td></tr>";
echo "<tr><th>Blood Group</th><td>$patient->blood</td></tr>"; // Use $patient->blood instead of $patient->bloods_id
echo "<tr><th>Gender</th><td>$patient->gender</td></tr>"; // Use $patient->gender instead of $patient->gender_id
echo "<tr><th>Address</th><td>$patient->address</td></tr>";
echo "<tr><th>Contact</th><td>$patient->contact</td></tr>";
echo "<tr><th>Email</th><td>$patient->email</td></tr>";
echo "<tr><th>Employee</th><td>$patient->employee</td></tr>";
echo "<tr><th>Type</th><td>$patient->type</td></tr>"; // Use $patient->type instead of $patient->type_id
echo "<tr><th>Doctor</th><td>$patient->doctor</td></tr>"; // Use $patient->doctor instead of $patient->doctor_id

echo "<tr><th>Photo</th><td>
    <img src='" . asset('img/' . $patient->photo) . "' alt='Patient Photo' width:'180' height:'80' />
</td></tr>";

echo "</table>";
echo Html::link(["route"=>url("roles"),"text"=>"Manage"]);
echo Page::content_close();
echo Page::body_close();
?>

@endsection
