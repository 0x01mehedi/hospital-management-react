<?php
class Page{


   

   public static function header($config){
    
        $title=isset($config["title"])?$config["title"]:"Page Title";
    
     $html=<<<HTML
        <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">$title</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
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
    
    
      
    public static function body_open($config=["col"=>12]){
        $col=$config["col"];
        $html=<<<HTML
        <div class="content">
          <div class="container-fluid">
            <div class="row">
                <div class="col-lg-$col">
    HTML;
    return $html;
    }
    
    public static function body_close(){
        $html=<<<HTML
         </div>
        </div>    
      </div> 
    </div>
    HTML;
    return $html;
    }
    
    public static   function content_open($config=[]){
        $config["title"]=isset($config["title"])?$config["title"]:"&nbsp;"; 
        $config["route"]=isset($config["route"])?$config["route"]:"#"; 
         
         $html="<div class='card' style='padding:10px;margin-top:10px;box-shadow:0 0  19px 3px rgba(0,0,0,.2)'>";
        
         $html.="<div class='card-header d-flex justify-content-between'>";
         $html.=" <div class='flex-fill'>{$config["title"]}</div> "; 
         if(isset($config["button"])){
          $html.=" <a class='btn btn-success' href='{$config["route"]}/create'>New {$config["button"]}</a>";
         }
         $html.="</div>";
         $html.="<div class='card-body'>";
         return $html; 
      }
      
      public static function content_close(){
         $html="</div>";
         $html.="</div>";
         return $html;
       }
      
    

}

?>