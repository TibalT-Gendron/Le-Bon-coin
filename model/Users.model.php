<?php 

	/**
	 * 
	 */
	class Users
	{
		public function loginUser(array $data){
			return $GLOBALS['database']->getSelect('single','users','*','user_email=? AND user_password=?',[$data['username'],$data['password']]);
		}

		public function verifyUser(array $data){
			return $GLOBALS['database']->getSelect('single','users','*','user_email=?',[$data['username']]);
		}

		public function registerUser(array $data){
			return $GLOBALS['database']->getInsert('users','user_email,user_password,user_authorised,	user_ismerchant,date_created',[$data['username'],$data['password'],1,1,date("Y-m-d H:i:s")]);
		}

		public function upateUserProfile($POST,$FILES){
			if (!empty($FILES["photo"]['name'])) {
				# Pour allez vite il ny aura pas de controle du format pour le moment
				$filename=$FILES["photo"]['name'];
				$explode=explode('.', $filename);
				$fileextenxion=strtolower(end($explode));
				$nouveaunomdelimage=uniqid().time().".".$fileextenxion;
				if (move_uploaded_file($FILES["photo"]['tmp_name'], "file/img/".$nouveaunomdelimage)) {
					$GLOBALS['database']->getUpdate('users','user_picture=?,date_updated=?','user_id=?',[$nouveaunomdelimage,date("Y-m-d H:i:s"),$_SESSION['user']['user_id']]);
				}
			}
			return $GLOBALS['database']->getUpdate('users','user_name=?,user_lastname=?,user_country=?,date_updated=?','user_id=?',[trim(strip_tags($POST->prenom)),trim(strip_tags($POST->nom)),trim(strip_tags($POST->ville)),date("Y-m-d H:i:s"),$_SESSION['user']['user_id']]);

		}

		public function logout(){
			session_destroy();
			header("Location:/compte");
		}
		
	}