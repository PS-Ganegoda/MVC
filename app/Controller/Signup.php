<?php 

class Signup extends Controller
{
    public function index()
    {
      $data['title'] = "Signup";
      $viewpath=$this->view('signup',$data);
      require $viewpath;
      

    }
    
}

?>
