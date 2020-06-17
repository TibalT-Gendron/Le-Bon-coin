<?php 
	/**
	 * Se chargera de charger les bon model
	 */
	class Controller
	{
		private $page;
		private $action;
		function __construct($page,$action)
		{
			$this->page=$page;
			$this->action=$action;
		}

		private function initPage(){
			$pageClass= new $this->page;
			$actioName=$this->$action.'Action';
			if (method_exists($pageClass, $actioName)) {
				$pageClass->$actioName;
			}
		}
	}
 ?>