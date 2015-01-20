<?php
class lib_core_view{
	private $_path;
	private $_namespace;
	private $_controller;
	private $_action;
	private $_scripts=array();

	const SCRIPT_ATTACH_INCLUDE=1;

	public 	function lib_core_view($action,$controller,$namespace=false){
		$this->_namespace=$namespace;
		$this->_controller=$controller;
		$this->_action=$action;
		$this->_path="view/".$namespace."/".$controller."/".$action.".php";
		}
	public function addScriptfile($path){
		$this->_scripts[]=(object)array(
			"path"=>$path,
			"attach"=>lib_core_view::SCRIPT_ATTACH_INCLUDE			
			);
	}
	public function render(){
		include_once $this->_path;
	}
	private function renderScripts(){
		foreach($this->_scripts as $s){
			
			switch($s->attach){
				case lib_core_view::SCRIPT_ATTACH_INCLUDE:
					$this->renderScriptFile($s);
				break;
			}
		}
	}
	private function renderScriptFile($s){
		echo "<script src='".$s->path."'></script>";
		}
}
