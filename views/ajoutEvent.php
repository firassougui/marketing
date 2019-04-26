<?PHP
include "../entities/evenement.php";
include "../core/evenementC.php";

if (isset($_POST['id_event']) and isset($_POST['titre']) and isset($_POST['date']) and isset($_POST['heure']) and isset($_POST['description'])){
$evenement=new evenement($_POST['id_event'],$_POST['titre'],$_POST['date'],$_POST['heure'],$_POST['description']);

$evenementC=new EvenementC();
$evenementC->ajouterEvent($evenement);
header('Location: ../kiaalap-master/events.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>