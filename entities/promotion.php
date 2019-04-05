	<?PHP
class Promotion{
	private $id_promo;
	private $id_produit;
	private $date;
	private $taux;
	function __construct($id_promo,$id_produit,$date,$taux){
		$this->id_promo=$id_promo;
		$this->id_produit=$id_produit;
		$this->date=$date;
		$this->taux=$taux;
		
	}
	
	function getIdPromo(){
		return $this->id_promo;
	}
	function getIdProd(){
		return $this->id_produit;
	}
	function getDate(){
		return $this->date;
	}
	function getTaux(){
		return $this->taux;
	}


	
	
}

?>