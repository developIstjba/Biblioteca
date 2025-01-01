<?php

namespace app\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require './libs/twig/vendor/autoload.php';

/**
 * Description of View
 *
 * @author Jonathan
 */
class View {
    
    private $controller;
    private $method;
    private $data;
    protected $path;

    public function __construct() {
        $this->controller = 'Error';
        $this->method = 'e404';
        $this->data = [];
        $this->path = require('./config/settings.php');
    }
    
    public function render($controller, $method, $data=null){
        
        $class = explode('\\', substr(get_class($controller), 0, -10));
        $this->controller = ($class[2]) ?: $class[2];
        $this->method = ($method) ?: $method;
        $this->data = (!is_null($data)) ? $data : $this->data;

        $template = $this->path['folders']['views'];
        
        $loader = new FilesystemLoader($template);
        $twig = new Environment($loader, [
            'cache' => $this->path['folders']['views']  . 'cache',
        ]);
        
        echo $twig->render(strtolower($this->controller)."/".$this->method.'.html', $this->data);
        
    }
    
}
?>