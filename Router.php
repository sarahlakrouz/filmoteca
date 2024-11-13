<?php
class Router {

    public function root(){
          
        $url= $_SERVER['REQUEST_URI'];
        

        var_dump($url);

    }
}