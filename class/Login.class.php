<?php 

	class Login extends Render{
		private $data=['meta'=>['title'=>"Se connecter","description"=>"Saississez vos informations pour vous connecter"]];
		private $post;
		function __construct(){
			$this->post=(object)$_POST;
			if (isset($_POST['login'])) {
				$this->loginuser();
			}
			if (isset($_POST['register'])) {
				$this->registeruser();
			}
		}
		public function displayAction(){
			#important
			$this->renders('Login',$this->data);
		}
		public function registerpageAction(){
			#important
			$this->data['meta']=['title'=>"Inscription","description"=>"Saississez vos informations pour vous inscription"];
			$this->renders('Register',$this->data);
		}

		public function logoutAction(){
			$users=new Users();
			$users->logout();
		}

		private function loginuser(){
			if (isset($this->post->username) && empty($this->post->username)) {
				$this->data['error']=true;
				$this->data['errormsg']="Veuillez entrer vos identifiants et mot de passe";
				return false;
			}
			if (isset($this->post->password) && empty($this->post->password)) {
				$this->data['error']=true;
				$this->data['errormsg']="Veuillez entrer vos identifiants et mot de passe";
				return false;
			}

			//call user login method
			$users=new Users();
			$password=htmlentities(trim($this->post->password)).CONFIG_APP_SALT;
			$encrypted=md5($password);#utilise le sha 256 pour plus de securite aavec un prefix un suffix et le salt
			$getuser=$users->loginUser(["username"=>trim(strip_tags($this->post->username)),"password"=>$encrypted]);
			if ($getuser) {
				$_SESSION['user']=$getuser;
				header("Location:/profile");
			}else{
				$this->data['error']=true;
				$this->data['errormsg']="Identifiant ou mot de passe incorect!";
				return false;
			}
		}
		private function registeruser(){

			if (isset($this->post->username)) {
				if (empty($this->post->username)) {
					$this->data['error']=true;
					$this->data['errormsg']="Veuillez entrer vos identifiants et mot de passe";
					return false;
				} 
				if (!filter_var($this->post->username, FILTER_VALIDATE_EMAIL)) {
				  	$this->data['error']=true;
					$this->data['errormsg']="Veuillez entrer un email valide";
					return false;
				}
				
			}

			if (isset($this->post->password) && empty($this->post->password)) {
				$this->data['error']=true;
				$this->data['errormsg']="Veuillez entrer un mot de passe";
				return false;
			}
			if (isset($this->post->passwordC) && $this->post->password!=$this->post->passwordC ) {
				$this->data['error']=true;
				$this->data['errormsg']="Veuillez confirmer le mot de passe";
				return false;
			}
			$users=new Users();
			if ($users->verifyUser(["username"=>trim(strip_tags($this->post->username))])) {
				$this->data['error']=true;
				$this->data['errormsg']="Adresse email deja utiliser!";
				return false;
			}
			
			$password=htmlentities(trim($this->post->password)).CONFIG_APP_SALT;
			$encrypted=md5($password);#utilise le sha 256 pour plus de securite aavec un prefix un suffix et le salt
			$getuser=$users->registerUser(["username"=>trim(strip_tags($this->post->username)),"password"=>$encrypted]);
			if ($getuser) {
				mail(trim(strip_tags($this->post->username)), APP_NAME."- Inscription", "Bienvenue chez ".APP_NAME);
				$this->data['success']=true;
				$this->data['successmsg']="Vous pouvez a present vous connecter vous serez rediriger vers la page de connexion dans 5s <script> setTimeout(()=>{window.location.href='/compte'},5000)</script>!";
				return false;
			}else{
				$this->data['error']=true;
				$this->data['errormsg']="Une erreur s'est produite lors de l'inscription!";
				return false;
			}
		}
	}

 ?>