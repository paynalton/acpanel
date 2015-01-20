<?php
class model_core_autoload{
	
	public function model_core_autoload(){
		spl_autoload_register(array(__CLASS__,"models"));
		}
	public function models($classname){
		$partes=explode("_",strtolower($classname));
		$ruta=implode("/",$partes).".php";
		if(file_exists($ruta)){
			include_once($ruta);
		}
	}
}
