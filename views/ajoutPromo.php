<?PHP
include "../entities/promotion.php";
include "../core/promotionC.php";

if (isset($_POST['id_promo']) and isset($_POST['id_produit']) and isset($_POST['date']) and isset($_POST['taux']) ){
$promo=new promotion($_POST['id_promo'],$_POST['id_produit'],$_POST['date'],$_POST['taux']);

$pro=new PromotionC();
$pro->ajouterPromo($promo);
header('Location: ../kiaalap-master/promotions.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>