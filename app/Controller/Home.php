<?php
class Home
{

    public function index(){
        echo "home page";

    }
    public function edit(){
        echo "home editing";

    }
    public function delete($id,$id2=null){

        echo "home deleteing".$id;

    }
    
    
}