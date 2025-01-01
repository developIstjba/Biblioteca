<?php

namespace app\Core;

/**
 * Description of Exception
 *
 * @author Jonathan
 */
class Response {
    
    public $message;
    public $type;       // success, error
    public $code = 0;   // success: 0, redirect: 600; error: 0, redirect: 400
    public $route;
    private $data;
    
    public function getMessage() {
        return $this->message;
    }

    public function getType() {
        return $this->type;
    }

    public function getCode() {
        return $this->code;
    }

    public function getRoute() {
        return $this->route;
    }    

    public function setMessage($message): void {
        $this->message = $message;
    }

    public function setType($type): void {
        $this->type = $type;
    }

    public function setCode($code): void {
        $this->code = $code;
    }

    public function setRoute($route): void {
        $this->route = $route;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data): void {
        $this->data = $data;
    }



    
}
?>