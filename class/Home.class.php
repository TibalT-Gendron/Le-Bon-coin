<?php 
	
	class Home extends Render{

		public function accueilAction(){
			#important
			$data=['meta'=>['title'=>"Accueil","description"=>""]];
			$this->renders('Accueil',$data);
		}
	}

 ?>