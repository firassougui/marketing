<?PHP
include_once "../config1.php";
class PromotionC {
function afficherPromotion ($promo){
		echo "Id Promo: ".$promo->getIdPromo()."<br>";
		echo "Id_Produit: ".$promo->getIdProd()."<br>";
		echo "Date: ".$promo->getDate()."<br>";
		echo "Taux: ".$promo->getTaux()."<br>";
		
	}
	
	function ajouterPromo($promo){
		$sql="insert into promotion (id_promo,id_produit,date,taux) values (:id_promo, :id_produit,:date,:taux)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $id_promo=$promo->getIdPromo();
        $id_produit=$promo->getIdProd();
        $date=$promo->getDate();
        $taux=$promo->getTaux();
		$req->bindValue(':id_promo',$id_promo);
		$req->bindValue(':id_produit',$id_produit);
		$req->bindValue(':date',$date);
		$req->bindValue(':taux',$taux);
		
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	 
	function trierpromo()
	{
		$sql="SELECT * FROM promotion ORDER BY date ASC";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
        die('Erreur: '.$e->getMessage());
	}
}


	function afficherPromo(){
		
		$sql="SElECT * From promotion";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerPromo($id_promo){
		$sql="DELETE FROM promotion where id_promo= :id_promo";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_promo',$id_promo);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierPromo($promo,$id_promo){
		$sql="UPDATE promotion SET id_promo=:id_promo, id_produit=:id_produit,date=:date,taux=:taux WHERE id_promo=:id_promo";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$id_promo=$promo->getIdPromo();
        $id_produit=$promo->getIdProd();
        $date=$promo->getDate();
        $taux=$promo->getTaux();
       
		$datas = array(':id_promo'=>$id_promo, ':id_produit'=>$id_produit, ':date'=>$date,':taux'=>$taux);
		$req->bindValue(':id_promo',$id_promo);
		$req->bindValue(':id_produit',$id_produit);
		$req->bindValue(':date',$date);
		$req->bindValue(':taux',$taux);
		
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererPromo($id_promo){
		$sql="SELECT * from promotion where id_promo=$id_promo";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListePromo($id_promo){
		$sql="SELECT * from promotion where id_promo=$id_promo";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}

?>