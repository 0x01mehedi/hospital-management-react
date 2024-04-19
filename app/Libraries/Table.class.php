<?php

class Table{

   public static function get_html_table($table,$columns=""){
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
    
//    public static function get_array_table($table,$fields,$route){
//         $html="<table class='table table-striped'>";  
//         //table headers
//         $html.="<thead>"; 
//         $html.="<tr>"; 
//         foreach($fields as $field){     
//             $html.="<th>";
//             $html.=ucfirst($field);
//             $html.="</th>";
//         }
//             $html.="<th>";
//             $html.="Action";
//             $html.="</th>";
//         $html.="</tr>";
//         $html.="</thead>"; 
        
         
//         //table body
//         $html.="<tbody>"; 
//             foreach($table as $row){   
//                 $html.="<tr>";
//                 foreach($fields as $field){
//                     $html.="<td>"; 

//                     if($field=="photo" || $field=="image"){
//                         $html.="<img src='img/".$row->$field."' style='max-width:100px; max-height:100px;' />";
//                         //$html.="<img src='img/".$row->$field . "' alt='Patient Photo' style='max-width: 200px; max-height: 200px;'><br>";
//                     }else{
//                         $html.=$row->$field;
//                     }
//                     $html.="</td>";
//                 }
    
//                 $html.="<td>";
//                     $html.="<div class='btn-group'>";
//                         $html.="<a class='btn btn-primary' href='".url("$route/$row->id/edit")."'>
//                         <i class='fas fa-edit'></i>
//                         </a>";
//                         $html.="<a class='btn btn-info' href='".url("$route/$row->id")."'><i class='fas fa-eye'></i></a>";
//                         $html.="<a class='btn btn-danger' href='".url("$route/delete/$row->id")."'><i class='fas fa-trash-alt'></i></a>";
//                     $html.="</div>";            
//                 $html.="</td>";
    
//                 $html.="</tr>";
//             }    
//             $html.="</tbody>"; 
//         $html.="</table>";


public static function get_array_table($table, $fields, $route){
    $html = "<table class='table table-striped'>";
    // table headers
    $html .= "<thead>";
    $html .= "<tr>";
    foreach($fields as $field){
        $html .= "<th>";
        $html .= ucfirst($field);
        $html .= "</th>";
    }
    $html .= "<th>Action</th>";
    $html .= "</tr>";
    $html .= "</thead>";

    // table body
    $html .= "<tbody>";
    foreach($table as $row){
        $html .= "<tr>";
        foreach($fields as $field){
            if($field == "photo" || $field == "image"){
                $html .= "<td>";
                $html .= "<a href='img/".$row->$field."' target='_blank'><img src='img/".$row->$field."' style='max-width:100px; max-height:100px;' /></a>";
                $html .= "</td>";
            } else {
                $html .= "<td>";
                $html .= $row->$field;
                $html .= "</td>";
            }
        }

        $html .= "<td>";
        $html .= "<div class='my-btn-group'>";
        $html .= "<a class='my-btn btn-1' href='".url("$route/$row->id/edit")."'><i class='fas fa-edit'></i></a>";
        $html .= "<a class='my-btn btn-2' href='".url("$route/$row->id")."'><i class='fas fa-eye'></i></a>";
        $html .= "<a class='my-btn btn-3' href='".url("$route/delete/$row->id")."'><i class='fas fa-trash-alt'></i></a>";
        $html .= "</div>";
        $html .= "</td>";

        $html .= "</tr>";
    }
    $html .= "</tbody>";
    $html .= "</table>";

    return $html;
}
}
    

?>