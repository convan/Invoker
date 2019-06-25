<?php

namespace Invoker;

require_once('ReflObject.php');

class Invoker {
        protected $objects = array();
        function __construct(ReflObject $ReflObj){
        	$this->register($ReflObj);
        }

        public function register($object) {
            if(!in_array($object, $this->objects)){

                array_push($this->objects, $object);
            } else {
                throw new Exception('Function allready defined');
            }
        }

        public function unregister($object) {
            if($key = array_keys($this->objects, $object)){
                unset($this->objects[$key]);
            } else {
                throw new Exception('No such function');
            }
        }

        public function __call($method, $args) {
			    $current = current($this->objects);
          if (!isset($current->obj)) {	
            ($current = end($this->objects));
          }
          if(method_exists($current->obj, $method)){
            next($this->objects);
            return ($current->run($method, ...$args));
          } else {
            throw new Exception('No such function');
          }
        }
}


?>
