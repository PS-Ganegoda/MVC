<?php
class Controller
{
    public function view($view, $data = [])
    {
        extract($data);

        // Use absolute path
        $filename = __DIR__ . "/../views/" . $view . ".view.php";

        if (file_exists($filename)) {
            require $filename;
        } else {
            echo "Could not find the view file: " . $filename;
        }
    }
}

 



 
