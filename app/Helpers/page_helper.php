<?php

function page_header($config){

    $title=isset($config["title"])?$config["title"]:"Page Title";

 $html=<<<HTML
    <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">$title</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">$title</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
HTML;
return $html;
}

function page_header0($config){
    $html="";
    $html.="<header class=\"py-3 mb-4 border-bottom\">";
    $html.="<div class=\"container d-flex flex-wrap justify-content-center\">";
    $html.="<a href=\"/\" class=\"d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none\">";
    $html.="<svg class=\"bi me-2\" width=\"40\" height=\"32\"><use xlink:href=\"#bootstrap\"></use></svg>";
    $html.="<span class=\"fs-4\">{$config["title"]}</span>";
    $html.="</a>";
    $html.="<form class=\"col-12 col-lg-auto mb-3 mb-lg-0\">";
    $html.="<input type=\"search\" name=\"txtSearch\" class=\"form-control\" placeholder=\"Search...\" aria-label=\"Search\">";
    $html.="</form>";
    $html.="</div>";
    $html.="</header>";
  
   return $html;
  }
  
function page_body_open($config=["col"=>12]){
    $col=$config["col"];
    $html=<<<HTML
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-$col">
HTML;
return $html;
}

function page_body_close(){
    $html=<<<HTML
     </div>
    </div>    
  </div> 
</div>
HTML;
return $html;
}

   function page_content_open($config=[]){
    $config["title"]=isset($config["title"])?$config["title"]:"&nbsp;"; 
    $config["route"]=isset($config["route"])?$config["route"]:"#"; 
     
     $html="<div class='card' style='padding:10px; margin-top:10px;box-shadow:0 0  19px 3px rgba(0,0,0,.2); background-color: #b7e5b4 !important'>";
    
     $html.="<div class='card-header d-flex justify-content-between'>";
     $html.=" <div class='flex-fill'>{$config["title"]}</div> "; 
     if(isset($config["button"])){
      $html.=" <a class='btn btn-success' href='{$config["route"]}/create'>New {$config["button"]}</a>";
     }
     $html.="</div>";
     $html.="<div class='card-body'>";
     return $html; 
  }
  
   function page_content_close(){
     $html="</div>";
     $html.="</div>";
     return $html;
   }
  
   function table_wrap_open(){
      $html="<div style='padding:10px;margin-top:10px;box-shadow:0 0 19px 3px rgba(0,0,0,.2)'>";
      
      return $html; 
   }
   
    function table_wrap_close(){
     
      $html="</div>";
    
   
      return $html;
    }




?>