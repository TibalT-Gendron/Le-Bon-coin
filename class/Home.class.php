<?php 

	class Home extends Render{
		private $data=['meta'=>['title'=>"Accueil","description"=>APP_DFAULT_DESCRIPTION]];
		private $post;
		function __construct(){
			$this->post=(object)$_POST;
			if (isset($_POST['rechercher'])) {
				$this->filerAnnonces();
			}
		}
		public function accueilAction(){
			#important
			$annonces=new Annonces;
			$this->data['body']['categories']=$annonces->getAllCategories();
			$this->data['body']['ville']=$annonces->getAllVilles();
			//$this->data['body']['dernierAnnonces']=$annonces->getLatestAnnonces();
			if (!isset($_POST['rechercher'])) {
				$this->data['body']['Annonces']=$annonces->getAnnoncesFiltered([]);
			}
			
			$this->renders('Accueil',$this->data);
		}

		private function filerAnnonces(){
			$annonces=new Annonces;
			$this->data['body']['Annonces']=$annonces->getAnnoncesFiltered($this->post);
		}
	}

 ?>