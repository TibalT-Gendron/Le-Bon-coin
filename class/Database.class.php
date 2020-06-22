<?php 
	
	class Database 
	{

		private $_connect;
		
		function __construct($host=NULL, $dbname=NULL, $user=NULL, $password=NULL)
		{
			if ($host!=NULL || $dbname!=NULL || $user!=NULL || $password!=NULL) {
				$this->_db_host = $host;
				$this->_db_name = $dbname;
				$this->_db_user = $user;
				$this->_db_password = $password;
			} else {
				$this->_db_host = CONFIG_DB_HOST;
				$this->_db_name = CONFIG_DB_NAME;
				$this->_db_user = CONFIG_DB_USER;
				$this->_db_password = CONFIG_DB_PASSWORD;
			}

			try {

				$db_connect = new PDO(CONFIG_DB_CONNECT.":host=".CONFIG_DB_HOST."; dbname=".CONFIG_DB_NAME."; charset=".CONFIG_DB_CHARSET, CONFIG_DB_USER, CONFIG_DB_PASSWORD);
		
				$db_connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    			$db_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    			$this->_connect = $db_connect;

			} catch (Exception $e) {
				echo "Impossible d'accéder à la base de données : ".$e->getMessage()."<br>"; 
			}	
			
		}

		/**
		 * Fonction permettant de faire des requetes de type SELECT
		 * @param $type string = {single | all} [selectionner un ou plusieur enregistrement]
		 * @param $table tring [le nom de la table]
		 * @param $champ string [les champs à selectionner]
		 * @param $condition string [les conditions a prendre en compte]
		 * @param $donne array [Tableau contenant les differentes variables]
		 * @param $retour string = {array | object | json} [Type de retour des donnees]
		 */
		public function getSelect($type, $table, $champ, $condition='', $donnee=array(), $retour=NULL)
		{
			if ($condition!=''){$condition = 'where '.$condition;}else{$condition = '';}

			$execute=$this->_connect->prepare("SELECT $champ FROM $table $condition");

			$execute->execute($donnee);

			if ($type=='single') {$resultat = $execute->fetch();}elseif ($type=='all') {$resultat = $execute->fetchAll();}

			if ($retour==NULL) {

				$retour = CONFIG_DB_DATA;

				if ($retour=="object") {return $affiche = (object) $resultat; } elseif ($retour=="json") {return $affiche = json_encode($resultat);} elseif($retour=="array") { return $affiche = $resultat; }
				
			} else {

				if ($retour=="object") {return $affiche = (object) $resultat; } elseif ($retour=="json") {return $affiche = json_encode($resultat);} elseif($retour=="array") { return $affiche = $resultat; } else { trigger_error("Veuillez spécifier le type de donné à retourner", E_USER_WARNING); }

			}
			
		}

		/**
		 * Fonction permettant permet d’effectuer des modifications sur des lignes existantes
		 * @param $table tring [le nom de la table]
		 * @param $champ string [les champs à modifier]
		 * @param $condition string [les conditions a prendre en compte]
		 * @param $donne array [Tableau contenant les differentes variables]
		 */
		public function getUpdate($table, $champ, $condition='', $donnee=array())
		{
			$execute=$this->_connect->prepare("UPDATE $table SET $champ WHERE $condition");
			if ($execute->execute($donnee)) {return true;} else {return false;}
			$execute->closeCursor();
		}

		/**
		 * Fonction permettant l’insertion de données dans une table
		 * @param $table tring [le nom de la table]
		 * @param $champ string [les champs à ajouter]
		 * @param $donne array [Tableau contenant les differentes variables]
		 */
		public function getInsert($table, $champ, $donnee=array())
		{
			$tmp = explode(",", $champ); $values = "";
			for ($i=1; $i <= count($tmp); $i++) { if ($i<count($tmp)) { $values = $values."?, "; }else{ $values = $values."?"; } }

			$execute=$this->_connect->prepare("INSERT INTO $table ($champ) VALUES ($values)");
			if ($execute->execute($donnee)) {return true;} else {return false;}
			$execute->closeCursor();
		}

		/**
		 * Fonction permettant de compter le nombre d'enregistrement dans une table
		 * @param $table tring [le nom de la table]
		 * @param $champ string [champs à compter]
		 * @param $donne array [Tableau contenant les differentes variables]
		 */
		public function getCount($table, $champ, $condition, $donnee=array())
		{
			if ($condition<>''){$condition = 'where '.$condition;}else{$condition = '';}
			$execute=$this->_connect->prepare("SELECT $champ FROM $table $condition");
			$execute->execute($donnee); 
			return $affiche = $execute->rowCount();
			$execute->closeCursor();
			
		}

		/**
		 * Fonction permettant de supprimer un enregistrement dans une table
		 * @param $table tring [le nom de la table]
		 * @param $champ string [champs à compter]
		 * @param $donne array [Tableau contenant les differentes variables]
		 */
		public function getDelete($table, $condition, $donnee=array())
		{
			if ($condition<>''){$condition = 'where '.$condition;}else{$condition = '';}
			$execute=$this->_connect->prepare("DELETE FROM $table $condition");
			if ($execute->execute($donnee)) {return true;} else {return false;}
			$execute->closeCursor();
		}
		
		public function getDb()
		{
			return $this->_connect;
		}

	}