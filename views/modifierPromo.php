<link rel="stylesheet" href="style.css">



<?PHP
include "../entities/promotion.php";
include "../core/promotionC.php";
if (isset($_GET['id_promo'])){
	$promo=new PromotionC();
    $result=$promo->recupererPromo($_GET['id_promo']);
	foreach($result as $row){
		$id_promo=$row['id_promo'];
		$id_produit=$row['id_produit'];
		$date=$row['date'];
		$taux=$row['taux'];
		
?>

<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<form method="POST">
					<div class="table-title">						
						<h4 class="modal-title">Edit Employee</h4>
						
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Id Promotion</label>
							
							<input  value="<?PHP echo $id_promo ?>" name="id_promo" type="text" class="form-control" readonly>
						</div>
						
						<div class="form-group">
							<label>Id Produit</label>
							<input value="<?PHP echo $id_produit ?>" type="text" name="id_produit" class="form-control" required>
						</div>
						<div class="form-group">

							<label>Date</label>
														<?PHP $date = date('Y-m-d'); ?>

							<input name="date" value="<?PHP echo $date?>" min="<?PHP echo $date?>" class="form-control" required></input>
						</div>
						<div class="form-group">
							<label>Taux</label>
							<input name="taux" type="text" value="<?PHP echo $taux ?>" class="form-control" required>
						</div>	
										
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" style="color: #fff; background-color: #d9534f; border-color: #d43f3a;" >
						<input type="submit" name="modifier" class="btn btn-success" value="Modifier" style="color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c;">
						<input type="hidden" name="id_promo_ini" value="<?PHP echo $_GET['id_promo'];?>">
					</div>
				</form>
			</div>
		</div>
	</div>
	<?PHP
	}
}
if (isset($_POST['modifier'])){
	$pro=new promotion($_POST['id_promo'],$_POST['id_produit'],$_POST['date'],$_POST['taux']);
	$promo->modifierPromo($pro,$_POST['id_promo_ini']);
	echo $_POST['id_promo_ini'];
	header('Location: ../kiaalap-master/promotions.php');
}
?>