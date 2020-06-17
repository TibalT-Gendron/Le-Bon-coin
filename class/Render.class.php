<?php 
	
	/**
	 * 
	 */
	class Render
	{
		
		private function render(array $data){
			ob_start();
			
			require_once('view/template.php');
		}
	}
 ?>