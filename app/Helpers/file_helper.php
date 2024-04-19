<?php

  function read($name){
    return file_get_contents($name);
  }

  function write($name,$message){
       file_put_contents($name,$message,FILE_APPEND);
  }

  function word_count($name){
    return str_word_count(read($name));
  }

  function file_ext($name){
    return pathinfo($name,PATHINFO_EXTENSION);
  }

?>