<?php


class App 
{
    protected $controller = '_404';
    protected $method = 'index';

    public function __construct()
    {
        $arr = $this->getURL();
        
        $filename = "../app/Controller/" . ucfirst($arr[0]) . ".php";
        
        if (file_exists($filename)) {
            require $filename;
            $this->controller = ucfirst($arr[0]); // Update the default controller
        } else {
            require "../app/Controller/" . $this->controller . ".php";
        }

        $myController = new $this->controller();
        $myMethod = $arr[1] ?? $this->method;

        // Check if the specified method exists in the controller
        $normalizedMethod = strtolower($myMethod);
        if (method_exists($myController, $normalizedMethod)) {
            $this->method = $normalizedMethod;
        } else {
            // Handle the case where the method doesn't exist
            $this->method = 'index'; // Set a default method or handle the error as needed
        }

        // Remove the controller and method from the array
        array_shift($arr);
        array_shift($arr);
           
        call_user_func_array([$myController, $this->method], $arr);
    }

    private function getURL()
    {
        $url = $_GET['url'] ?? 'home';
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $arr = explode("/", trim($url, '/'));
        return $arr;
    }
}
?>
