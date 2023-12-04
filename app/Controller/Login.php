<?php 

class Login extends Controller
{
    public function index()
    {
      $data['title'] = "Login";
      $viewpath=$this->view('login',$data);
      require $viewpath;
      

    }
    
}

?>
