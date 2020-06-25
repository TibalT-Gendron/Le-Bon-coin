<?php 

	class Annonce extends Render{
		private $data=['meta'=>['title'=>"Accueil","description"=>APP_DFAULT_DESCRIPTION]];
		public function accueilAction(){
			#important
			$annonces=new Annonces;
			$this->data['body']['categories']=$annonces->getAllCategories();
			$this->data['body']['ville']=$annonces->getAllVilles();
			$this->data['body']['dernierAnnonces']=$annonces->getLatestAnnonces();
			$this->renders('Accueil',$this->data);
		}
	}

 ?>