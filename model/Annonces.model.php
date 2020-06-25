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

		public function getAnnoncesByUser(){
			return $GLOBALS['database']->getSelect('all','annonces AS a,categorie AS c,ville AS v','a.*,c.name AS catname,v.name AS vname','user_id=? AND a.categorie_id=c.categorie_id AND a.ville_id=v.ville_id',[$_SESSION['user']['user_id']],'object');
		}
		public function getAnnoncesFiltered($POST){
			$db=$GLOBALS['database']->getDb();
			$bindable=[];
			$query="SELECT * FROM annonces AS a,categorie AS c WHERE a.categorie_id=c.categorie_id AND a.etat=?";
			$bindable[]=1;
			if (isset($POST->q) && !empty($POST->q)) {
				$query.=" AND a.title LIKE ? OR a.description LIKE ? OR a.tags LIKE ?";
				$bindable[]="%".trim(strip_tags($POST->q))."%";
				$bindable[]="%".trim(strip_tags($POST->q))."%";
				$bindable[]="%".trim(strip_tags($POST->q))."%";
			}
			if (isset($POST->categorie) && !empty($POST->categorie) && $POST->categorie!="all") {
				$query.=" AND a.categorie_id = ?";
				$bindable[]=$POST->categorie;
			}
			if (isset($POST->ville) && !empty($POST->ville) && $POST->ville!="all") {
				$query.=" AND a.ville_id = ?";
				$bindable[]=$POST->ville;
			}

			if (isset($POST->prixmin) && isset($POST->prixmax)) {
				$query.=" AND a.prix BETWEEN ? AND ?";
				$bindable[]=$POST->prixmin;
				$bindable[]=$POST->prixmax;
			}

			$query.=" ORDER BY a.date_created DESC";
			$statement=$db->prepare($query);
			$statement->execute($bindable);
			$result=$statement->fetchAll(PDO::FETCH_ASSOC);
			$statement->closeCursor();

			return $result;
		}
		
		public function publishAnnonceByUser($POST,$FILES){
			$photolist=[];
			for ($i=1; $i < 4; $i++) { 
				if (!empty($FILES["photo".$i]['name'])) {
				# Pour allez vite il ny aura pas de controle du format pour le moment
				$filename=$FILES["photo".$i]['name'];
				$explode=explode('.', $filename);
				$fileextenxion=strtolower(end($explode));
				$nouveaunomdelimage=uniqid().time().$i.".".$fileextenxion;
				if (move_uploaded_file($FILES["photo".$i]['tmp_name'], "file/img/".$nouveaunomdelimage)) {
					$photolist[$i]=$nouveaunomdelimage;
				}
			}
			}

			$photojson=json_encode($photolist);

			return $GLOBALS['database']->getInsert('annonces','user_id,categorie_id,ville_id,title,description,tags,prix,photos,etat,date_created',[$_SESSION['user']['user_id'],$POST->categorie,$POST->ville,$POST->titre,$POST->description,$POST->tag,$POST->prix,$photojson,$POST->etat,date("Y-m-d H:i:s")]);

		}
	}