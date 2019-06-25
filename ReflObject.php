<?php

namespace Invoker;

class ReflObject {
        public $obj = null;

        public function run($method, $args) {
		return call_user_func_array(array($this->obj, $method), array($args));
	}

        public function __construct($obj = null) {
        	$this->obj = $obj;

        	if($this->obj === null) {
        		throw new Exception('Object must be defined');
            	}
        }

        protected function init(){
        	return;// $this->run();
        }

        public function toString(){
                return;// $$this->obj;
        }
}
