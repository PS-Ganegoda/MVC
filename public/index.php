
<?php
function show($stuff){
     echo "<pre>";
     print_r($stuff);
     echo"<pre>";
     
}
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
    $mymethod = $arr[1]??$this->method;


    if(method_exists($mycontroller,strtolower($arr[1])))
    {
          $this->method = strtolower($arr[1]);
    }
    $arr = array_values($arr);
    call_user_func_array([$mycontroller,$this->method], $arr);
 
}
private  function getURL(){
    $url=$_GET['url'] ?? 'home';
    $url=filter_var($url,FILTER_SANITIZE_URL);
    $arr = explode("/", $url);
    return $arr;
}
}
$app = new App();
/*
class App {
    protected $controller = '_404';

    public function __construct() {
        $arr = $this->getURL();
        $filename = "../app/Controller/" . ucfirst($arr[0]) . "Controller.php"; // Assuming controller classes are named with "Controller" suffix

        if (file_exists($filename)) {
            require $filename;
            $controllerClassName = 'App\\Controller\\' . ucfirst($arr[0]) . 'Controller';
            
            if (class_exists($controllerClassName)) {
                $myController = new $controllerClassName();

                // Check if the method 'index' exists before calling it
                $action = method_exists($myController, 'index') ? 'index' : 'defaultAction';
                $myController->$action(); // Call the appropriate method on the controller
            }
        } else {
            require "../app/Controller/" . $this->controller . ".php";
            $myController = new $this->controller();

            // Check if the method 'index' exists before calling it
            $action = method_exists($myController, 'index') ? 'index' : 'defaultAction';
            $myController->$action(); // Call the appropriate method on the controller
        }
    }

    private function getURL() {
        $url = $_GET['url'] ?? 'home';
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $arr = explode("/", $url);
        return $arr;
    }
}

$app = new App();
*/


