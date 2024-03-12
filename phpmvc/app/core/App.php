<?php
class App
{
   protected $controller = "Home";
   protected $method = "index";
   protected $params = [];

   public function __construct()
   {
      $url = $this->parseURL();
      // var_dump($url);
   }

   public function parseURL()
   {
      if (isset($_GET['url'])) {
         $url = rtrim($_GET['url'], "/");
         $url = filter_var($url, FILTER_SANITIZE_URL);
         $url = explode('/', $url);

         //setup controller
         if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
         }

         require_once '../app/controllers/' . $this->controller . '.php';
         $this->controller = new $this->controller;

         if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
               $this->method = $url[1];
               unset($url[1]);
            }
         }

         $this->params = !empty($url) ? array_values($url) : [];

      } else {
         // Default behavior if $_GET['url'] is not set
         // You may choose what to do in this case, for now, I'll just proceed with the default controller and method.
         require_once '../app/controllers/' . $this->controller . '.php';
         $this->controller = new $this->controller;
      }

      // Call the method with the parameters
      call_user_func_array(
         [$this->controller, $this->method],
         $this->params
      );
   }
}
