	<?PHP
class Evenement{
	private $id_event;
	private $titre;
	private $date;
	private $heure;
	private $description;
	function __construct($id_event,$titre,$date,$heure,$description){
		$this->id_event=$id_event;
		$this->titre=$titre;
		$this->date=$date;
		$this->heure=$heure;
		$this->description=$description;

	}
	
	function getEvenement(){
		return $this->id_event;
	}
	function getTitre(){
		return $this->titre;
	}
	function getDate(){
		return $this->date;
	}
	function getHeure(){
		return $this->heure;
	}
	function getDescription(){
		return $this->description;
	}

	function setTitre($titre){
		$this->titre=$titre;
	}
	function setDate($date){
		$this->date;
	}
	function setHeures($heures){
		$this->heures=$heure;
	}
	function setdescription($description){
		$this->description=$description;
	}
	
}

?>