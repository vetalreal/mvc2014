<?php

class app {

    static private $pdo = null;
    static public $config;
    
    static function db(){
        if(is_null(self::$pdo)){
            self::$pdo = PDO(self::$config['db']['connection'],self::$config['db']['username'],self::$config['db']['pass']);
        }
        return self::$pdo;
    }
    static function run() {
        self::$config = getConfig();
        
        $controller_name = filter_input(INPUT_GET, 'c');
        if($controller_name){
            $controller_filename = 'controller/controller' . $controller_name . '.php';
            if(file_exists($controller_filename)){
                require_once $controller_filename;
                $controller_name = 'controller'.$controller_name;
                $controller = new $controller_name;
                $action_name = filter_input(INPUT_GET, 'a');
                if($action_name){
                    $controller->{$action_name}();
                }else{
                    $controller->index();
                }
            }
        }
    }

}
