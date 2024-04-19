<?php

function get_html_table($table,$columns=""){
    //global $db,$tx;   
   $db=new mysqli("localhost","root","","test");
   $tx="core_";
   
   $sql="select $columns from {$tx}$table";
   $result=$db->query($sql);
   $fields = $result->fetch_fields();

    $html="<table class='table table-striped'>";  
    $html.="<thead>"; 
    $html.="<tr>"; 
    foreach($fields as $field){     
        $html.="<th>";
        $html.=ucfirst($field->name);
        $html.="</th>";
    }
    $html.="</tr>";
    $html.="</thead>"; 
    $html.="<tbody>"; 
    while($row=$result->fetch_assoc()){
     $html.="<tr>";
    
        foreach($fields as $field){     
            $html.="<td>";
            $html.=$row["$field->name"];
            $html.="</td>";
        }
     $html.="</tr>";
    }
    $html.="</tbody>"; 
    $html.="</table>";

    return $html;
}

function get_array_table($table,$fields,$route){
    $html="<table class='table table-striped'>";  
    //table headers
    $html.="<thead>"; 
    $html.="<tr>"; 
    foreach($fields as $field){     
        $html.="<th>";
        $html.=ucfirst($field);
        $html.="</th>";
    }
        $html.="<th>";
        $html.="Action";
        $html.="</th>";
    $html.="</tr>";
    $html.="</thead>"; 
    
     
    //table body
    $html.="<tbody>"; 
        foreach($table as $row){   
            $html.="<tr class='row'>";
            foreach($fields as $field){
                $html.="<td>";
                $html.=$row->$field;
                $html.="</td>";
            }
            //$html.="<td></td>";
            //$html.="";
            $html.="<td col-sm-3>";
                $html.="<div class='btn-group' >";
                    $html.="<a class='btn btn-primary' href='".url("$route/$row->id/edit")."'>
                    <i class='fas fa-edit'></i>
                    </a>";
                    $html.="<a class='btn btn-info' href='".url("$route/$row->id")."'><i class='fas fa-eye'></i></a>";
                    $html.="<a class='btn btn-danger' href='".url("$route/delete/$row->id")."'><i class='fas fa-trash-alt'></i></a>";
                $html.="</div>";            
            $html.="</td>";

            $html.="</tr>";
        }    
        $html.="</tbody>"; 
    $html.="</table>";

    return $html;
}

?>