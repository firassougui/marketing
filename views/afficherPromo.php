<?PHP 
include_once "../core/promotionC.php";
$promo=new PromotionC();
$listePromo=$promo->afficherPromo();

?>
<!DOCTYPE html>
<html lang="en">
<head>
		<link rel="stylesheet" href="style3.css">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Evenements</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Liste <b>Promotions</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span> Ajouter Nouvelle Promotion </span></a>
						<form method="POST" action="promotionsTrie.php"> 
						<button class="btn btn-success" type="submit" data-toggle="modal"><i class="glyphicon glyphicon-th-list"></i> <span> Trier Par Date  </span></button>
						
						</form>
												
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
                        <th>ID Promotion</th>
                        <th>ID Produit</th>
						<th>Date</th>
                        <th>Taux</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>     
                <?PHP 
                foreach($listePromo as $row)
                {
                ?> 		
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox5" name="options[]" value="1">
								<label for="checkbox5"></label>
							</span>
						</td>
                        <td><?PHP echo $row['id_promo']; ?></td>
						<td><?PHP echo $row['id_produit']; ?></td>
						<td><?PHP echo $row['date']; ?></td>
						<td><?PHP echo $row['taux'];?></td> 
						
						<td>
							<form method="POST" action="../views/supprimerPromo.php">
						 <button type="submit" class="btn btn-danger">  <i class="material-icons" data-toggle="tooltip" title="Supprimer">&#xE15C;</i> <span>Supprimer</span> </button>
						 <input type="hidden" value="<?PHP echo $row['id_promo']; ?>" name="id_promo">
						 </form>
						 <td>
						 <a href="../views/modifierPromo.php?id_promo=<?PHP echo $row['id_promo']; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
						</td>
						
						<?PHP }?>
						
						
						</td>
                        
                    </tr> 
                 
                </tbody>
            </table>
			
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="../views/ajoutPromo.php">
					<div class="modal-header">						
						<h4 class="modal-title">Ajouter une promotion</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>ID Promotion</label>
							<input type="text" class="form-control" required name="id_promo">
						</div>
						<div class="form-group">
							<label>ID Produit</label>
							<input name="id_produit" type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Date</label>
							<?PHP $date = date('Y-m-d'); ?>
							<input type="date" value="<?PHP echo $date?>" min="<?PHP echo $date?>" class="form-control" name="date" required></input>
						</div>
						<div class="form-group">
							<label>Taux</label>
							<input type="text" name="taux" class="form-control" required>
						</div>		
									
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Ajouter">
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
	

</body>

</html>                               		                              