<?php
//require "app/Core/controller.php";
class Home extends Controller
{

   /* public function index(){
        $this->view('home');
        //echo "home page";

    }*/


    public function index()
    {    
        $db = new Database();
        $db->query();
        $data['title'] = "Home";
        $viewPath = $this->view('home',$data);
        if ($viewPath) {
            // Include the view file to display its content
            require $viewPath;
        } else {
            // Handle the case where the view file doesn't exist
            echo "Could not find the view file";
        }
    }
    
    
}