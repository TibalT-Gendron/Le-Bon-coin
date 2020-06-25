<?php 

	class Profile extends Render{
		private $data=['meta'=>['title'=>"Profile utilisateur","description"=>"Votre profile utilisateur"]];
		private $post;
		function __construct(){
			$this->post=(object)$_POST;
			if (!isset($_SESSION['user'])) {
				header("Location:/compte");
			}
			if (isset($_POST['saveprofile'])) {
				$this->updateProfile();
			}
			if (isset($_POST['publierannonce'])) {
				$this->publierAnnonce();
			}
			
		}
		public function displayAction(){
			$users=new Users;
			$this->data['user']=$users->verifyUser(["username"=>$_SESSION['user']['user_email']]);
			$annonces=new Annonces;
			$this->data['ville']=$annonces->getAllVilles();
			$this->data['categories']=$annonces->getAllCategories();
			$this->data['annonces']=$annonces->getAnnoncesByUser();
			$this->renders('Profile',$this->data);
		}
		private function updateProfile(){
			$users=new Users;
			$reponse=$users->upateUserProfile($this->post,$_FILES);
			if ($reponse) {
				$this->data['success']=true;
				$this->data['successmsg']="Profile mise a jour!";
				return true;
			}else{
				$this->data['error']=true;
				$this->data['errormsg']="Une erruer sest produite lors de la mise a jour";
				return false;
			}
		}

		private function publierAnnonce(){
			$annonces=new Annonces;
			$responce=$annonces->publishAnnonceByUser($this->post,$_FILES);
			if ($responce) {
				$this->data['success']=true;
				$this->data['successmsg']="Annonce publier!";
				return true;
			}else{
				$this->data['error']=true;
				$this->data['errormsg']="Une erruer sest produite lors de l'ajout";
				return false;
			}
		}
	}

 ?>