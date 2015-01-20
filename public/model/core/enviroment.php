<?php
class model_core_enviroment{
	private $_lang="es_MX";
	private $_langdomine="messages";

	const E_NONE=0;
	const E_ERROR=E_ERROR;
	const E_WARNING=E_WARNING;
	const E_PARSE=E_PARSE;
	const E_NOTICE=E_NOTICE;
	const E_CORE_ERROR=E_CORE_ERROR;
	const E_CORE_WARNING=E_CORE_WARNING;
	const E_COMPILE_ERROR=E_COMPILE_ERROR;
	const E_COMPILE_WARNING=E_COMPILE_WARNING;
	const E_USER_ERROR=E_USER_ERROR;
	const E_USER_WARNING=E_USER_WARNING;
	const E_USER_NOTICE=E_USER_NOTICE;
	const E_STRICT=E_STRICT;
	const E_RECOVERABLE_ERROR=E_RECOVERABLE_ERROR;
	const E_DEPRECATED=E_DEPRECATED;
	const E_USER_DEPRECATED=E_USER_DEPRECATED;
	const E_ALL=E_ALL;

	public function init(){
		$this->initlang($this->_lang,$this->_langdomine);
		$this->initInput();
		$this->initUser();
	}
	public function initlang($lang,$dominio){	
		putenv("LANG=".$lang);
		setlocale(LC_ALL,$lang);
		bindtextdomain($dominio,"./locale");
		textdomain($dominio);
	}
	public function initInput(){
		global $__request;
		$__request=array_merge($_GET,$_POST);	
		if(!array_key_exists("module",$__request)){
			$__request["module"]="core";
		}	
		if(!array_key_exists("controller",$__request)){
			$__request["controller"]="default";
		}	
		if(!array_key_exists("action",$__request)){
			$__request["action"]="default";
		}
	}
	public function setDebugMode($mode=model_core_enviroment::E_NONE){
		
		error_reporting($mode);
		ini_set('display_errors', (bool)$mode);
	}
	public function loadController(){
		global $__request;
		$class="control_".strtolower($__request["module"])."_".strtolower($__request["controller"])."";
		if(class_exists($class)){
			$this->controller=new $class();
		}
		return $this->controller;
	}
	public function initUser(){
		global $__user;
		session_start();
		$__user=new model_core_user($_SESSION["userID"]);
	}
}
