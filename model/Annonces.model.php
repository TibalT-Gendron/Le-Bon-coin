<?php 

	/**
	 * 
	 */
	class Annonces
	{
		public function getLatestAnnonces(){
			return $GLOBALS['database']->getSelect('all','annonces AS a,users AS u,categorie AS c','*','a.user_id=u.user_id AND a.categorie_id=c.categorie_id ORDER BY a.date_created DESC LIMIT 6',[],'object');
		}

		public function getAllCategories(){
			return $GLOBALS['database']->getSelect('all','categorie','*','',[],'object');
		}

		public function getAllVilles(){
			return $GLOBALS['database']->getSelect('all','ville','*','',[],'object');
		}
		
	}