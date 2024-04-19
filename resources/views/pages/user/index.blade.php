@extends('layouts.app')

@section('page')
<h2>Manage<h2>
<?php
echo get_html_table("suppliers","id,name,mobile,email");
// echo File::info();

?>
<div class='row' style='display:flex;'>
    <span>1. Jahid </span>  
   
    <div style='display:flex;'>
        <a href="{{url('/users/1')}}">Show</a> | 
        <a href="{{url('/users/1/edit')}}">Edit</a>
        <form action="{{url('/users/1')}}" method='post' style=''> 
          
           @csrf
            @method("DELETE")
            <input type='submit' value='Delete' />
        </form>
    </div>
</div>

@endsection