<?php
class control_core_default{
	public $view;
	protected $_namespace="core";
	public function run(){
		global $__request;
		$action=$__request["action"]."Action";
		if(method_exists($this,$action)){
			$this->view=new lib_core_view($__request["action"],$__request["controller"],$this->_namespace);
			$this->view->addScriptFile("js/babylon.js");
			$this->view->addScriptFile("js/cannon.js");
			$this->view->addScriptFile("js/Oimo.js");
			return $this->$action();
		}
	}
	public function defaultAction(){
	}
}
