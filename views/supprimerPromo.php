<?PHP
include "../core/promotionC.php";
$promoC=new promotionC();
if (isset($_POST["id_promo"])){
	$promoC->supprimerPromo($_POST["id_promo"]);
	header('Location: ../kiaalap-master/promotions.php');
}

?>