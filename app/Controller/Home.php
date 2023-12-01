<?php

class Home extends Controller
{
    public function index()
    {
       

        
        $data['title'] = "Home";
       
        $viewPath = $this->view('home', $data);
        require ($viewPath);

        
    }
}

?>
