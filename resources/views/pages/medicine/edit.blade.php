@extends('layouts.app')
@section('page')

<?php
    echo Page::header(["title"=>"Edit Medicine"]);
    echo Page::body_open();
    echo Page::content_open(["title"=>"Edit Medicine"]);

    echo Form::open_laravel(["route"=>"medicines/$medicine->id","method"=>"PUT"]);
    echo Form::text(["name"=>"name","label"=>"Name","value"=>"$medicine->name"]);
    echo Form::select(["name"=>"category","label"=>"Category","table"=>$category,"value"=>"$medicine->category_id"]);
    echo Form::text(["name"=>"purchase","label"=>"Purchase","value"=>$medicine->purchase_price]);
    echo Form::text(["name"=>"sale","label"=>"Sale","value"=>$medicine->sale_price]);
    echo Form::text(["name"=>"store","label"=>"Store","value"=>"$medicine->store_box"]);
    echo Form::text(["name"=>"quantity","label"=>"Quantity","value"=>"$medicine->quantity"]);
    echo Form::text(["name"=>"generic","label"=>"Generic Name","value"=>"$medicine->generic_name"]);
    echo Form::text(["name"=>"company","label"=>"Employee","value"=>"$medicine->company"]);
    echo Form::text(["name"=>"effects","label"=>"Effects","value"=>$medicine->effects]);
    echo Form::text(["name"=>"expire","label"=>"Expire Date","value"=>$medicine->expire_date]);

    echo "<div class='btn-group'>";
    echo Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Update"]);
    echo Html::link(["route"=>url("medicines"),"text"=>"Manage"]);
    echo "</div>";

    echo Form::close();  

    echo Page::content_close();
    echo Page::body_close();


?>


@endsection