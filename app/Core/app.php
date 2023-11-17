<?php 
class App 
{
    protected $controller = '_404 ';
    protected $method ='index';
function __construct()
{
    $arr=$this->getURL();
    
    $filename="../app/Controller/".ucfirst($arr[0]).".php";
    if(file_exists($filename))
    {
            require $filename;
            $this->controller = $arr[0];
    }else{
        require"../app/Controller/".$this->controller.".php";
    }
   
    $mycontroller=new $this->controller();
    $mymethod = $arr[1] ?? $this->method;

/*
    if(method_exists($mycontroller,strtolower($arr[1])))
    {
          $this->method = strtolower($arr[1]);
    }
    
    $arr = array_values($arr);
    call_user_func_array([$mycontroller,$this->method], $arr);*/
    
    $normalizedMethod = strtolower($mymethod);
    if (method_exists($mycontroller, $normalizedMethod)) {
        $this->method = $normalizedMethod;
    }

    // Remove the controller and method from the array
    array_shift($arr);
    array_shift($arr);

    call_user_func_array([$mycontroller, $this->method], $arr);
}
 

private  function getURL(){
    $url=$_GET['url'] ?? 'home';
    $url=filter_var($url,FILTER_SANITIZE_URL);
    $arr = explode("/", $url);
    return $arr;
}
}