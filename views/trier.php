<?PHP
include "../core/promotionC.php";
$promoC=new promotionC();
if (isset($_POST["id_promo"])){
	$promoC->trierpromo($_POST["id_promo"]);
	header('Location: afficherPromo.php');
}

?>