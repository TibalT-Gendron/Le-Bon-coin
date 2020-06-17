<?php 
	/**
	 * Se chargera de charger les bon model
	 */
	class Controller
	{
		
		public function initPage($page,$action){
			$pageClass= new $page;
			$methodName=$action.'Action';
			if (method_exists($pageClass, $methodName)) {
				$pageClass->$methodName();
			}
		}
	}
 ?>