@extends('layouts.app')
@section('page')

<?php
echo Page::header(["title"=>"Show Medicine"]);

echo Page::body_open();
echo Page::content_open(["title"=>"Show Medicine"]);

echo "<table class='table'>";
echo "<tr><th>ID</th><td>$medicine->id</td></tr>";
echo "<tr><th>Name</th><td>$medicine->name</td></tr>";
echo "<tr><th>Category</th><td>$medicine->category</td></tr>";
echo "<tr><th>Purchase</th><td>$medicine->purchase_price</td></tr>";
echo "<tr><th>Sale Price</th><td>$medicine->sale_price</td></tr>";
echo "<tr><th>Store Box</th><td>$medicine->store_box</td></tr>";
echo "<tr><th>Quantity</th><td>$medicine->quantity</td></tr>";
echo "<tr><th>Genrice Name</th><td>$medicine->generic_name</td></tr>";
echo "<tr><th>Company</th><td>$medicine->company</td></tr>";
echo "<tr><th>Effects</th><td>$medicine->effects</td></tr>";
echo "<tr><th>Expire Date</th><td>$medicine->expire_date</td></tr>"; 

echo "</table>";
echo Html::link(["route"=>url("medicines"),"text"=>"Manage"]);
echo Page::content_close();
echo Page::body_close();
?>

@endsection
