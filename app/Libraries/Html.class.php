<?php

class Html{

    public static function link($config=[]){
        $config["class"]=isset($config["class"])?["class"]:"btn btn-primary";
        return "<a href='{$config["route"]}' class='{$config["class"]}'>{$config["text"]}</a>";
    }
}

?>