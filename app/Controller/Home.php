<?php

class Home extends Controller
{
    public function index()
    {
       $db = new Database();
       $db->create_tables();
       
        
        $data['title'] = "Home";
       
        $viewPath = $this->view('home', $data);
        require ($viewPath);

        
    }
    public function login()
    {
        echo 'login';
    }
}

?>
