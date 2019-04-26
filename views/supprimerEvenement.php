<?PHP
include "../core/evenementC.php";
$evenementC=new EvenementC();
if (isset($_POST["id_event"])){
	$evenementC->supprimerEvent($_POST["id_event"]);
	header('Location: ../kiaalap-master/events.php');
}

?>