<?php
    class App{

        protected $controller = 'home';
        protected $method = 'index';
        protected $params = [];

        public function __construct(){
            $url = $this->parse_url();
            // var_dump($url);
            //controller
            if( empty($url)){
                $url[0]='home';
            }
            if( file_exists('../app/controller/' . $url[0] . '.php' ) ){
                // echo 'get';
                $this->controller = $url[0];
                echo '<br/>'; 
                unset($url[0]);
                // var_dump($url);
            } 
            // else{
            //     echo 'not get';
            // }

            include '../app/controller/' . $this->controller . '.php';
            $this->controller = new $this->controller;
            // echo '<br/>';
            // echo gettype($this->controller);

            //method
            if( isset($url[1])){
                if(  method_exists($this->controller,$url[1]) ){
                    $this->method = $url[1];
                    unset($url[1]);
                    // var_dump($url);
                }
            }

            //params
            if( !empty($url)){
                $this->params = array_values($url);
                // var_dump($this->params);
            }

            //run controller, method dan parameter
            call_user_func_array( [$this->controller, $this->method], $this->params );
        }

        public function parse_url(){
            if( isset($_GET["url"])){
                $url = rtrim($_GET["url"],'/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode("/", $url);
                return $url;
            }
        }
    }