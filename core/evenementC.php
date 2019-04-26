<?PHP
include_once "../config1.php";
class EvenementC {
function afficherEvenement ($event){
		echo "Id Evenement: ".$event->getEvenement()."<br>";
		echo "Titre: ".$event->getTitre()."<br>";
		echo "Date: ".$event->getDate()."<br>";
		echo "Heure: ".$event->getHeure()."<br>";
		echo "Description: ".$event->getdescription()."<br>";
	
	}

	function ajouterEvent($event){
		$sql="insert into evenement (id_event,titre,date,heure,description)values (:id_event, :titre, :date, :heure, :description)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $id_event=$event->getEvenement();
        $titre=$event->getTitre();
        $date=$event->getDate();
        $heure=$event->getHeure();
        $description=$event->getDescription();

		$req->bindValue(':id_event',$id_event);
		$req->bindValue(':titre',$titre);
		$req->bindValue(':date',$date);
		$req->bindValue(':heure',$heure);
		$req->bindValue(':description',$description);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherEvent(){
		
		$sql="SElECT * From evenement";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function trierEvent()
	{
		$sql="SELECT * FROM evenement ORDER BY date ASC ,heure asc";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
        die('Erreur: '.$e->getMessage());
	}
}
	function supprimerEvent($id_event){
		$sql="DELETE FROM evenement where id_event= :id_event";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_event',$id_event);
		try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierEvent($event,$id_event){
		$sql="UPDATE evenement SET id_event=:id_event, titre=:titre, date=:date, heure=:heure, description=:description WHERE id_event=:id_event";
		
		$db = config::getConnexion();
try{		
        $req=$db->prepare($sql);
		$id_event=$event->getEvenement();
        $titre=$event->getTitre();
        $date=$event->getDate();
        $heure=$event->getHeure();
        $description=$event->getDescription();
		$datas = array(':id_event'=>$id_event, ':titre'=>$titre,':date'=>$date,':heure'=>$heure,':description'=>$description);
		$req->bindValue(':id_event',$id_event);
		$req->bindValue(':titre',$titre);
		$req->bindValue(':date',$date);
		$req->bindValue(':heure',$heure);
		$req->bindValue(':description',$description);

		
		
            $s=$req->execute();

        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererEvent($id_event){
		$sql="SELECT * from evenement where id_event=$id_event";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
/*
	function rechercherListeEmployes($tarif){
		$sql="SELECT * from employe where tarifHoraire=$tarif";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}*/
}

?>