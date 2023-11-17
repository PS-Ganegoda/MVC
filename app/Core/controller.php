<?php

class Controller
{
   public  function view($view, $data = []){
   
        
        $filename = "../app/views/".$view.".view.php";
        if (file_exists($filename)){
            extract($data);  
        
        return  $filename;

    }else {
        echo"coud nt find the view file". $filename;
    }
}

}



