<?php 
	
	/**
	 * Se charge des rendu des vue
	 *#le nom de la page et les donner optionel
	 */
	class Render
	{
		
		protected function renders($pagename,array $data=[]){
			$data=(object)$data;
			if (file_exists('view/'.$pagename.'_vue.php')) {
				ob_start();
				require_once('view/template.php');
				$page=ob_get_clean();
				ob_flush();
				echo $page;
			} else {
				$error = 'La page demander n\'existe pas';
    			throw new Exception($error);
			}
			
			
		}
	}
 ?>