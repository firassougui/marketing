<?PHP 
include "../core/evenementC.php";
$evenement1C=new EvenementC();
$listeEvenement=$evenement1C->trierEvent();
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<link rel="stylesheet" href="style.css">

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
						<h2>Liste<b>D'Evenements</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Ajouter Des Evenements</span></a>
						<form method="POST" action="afficherEvent.php"> 
						<button class="btn btn-success" type="submit" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span> Reset  </span></button>
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
                        <th>ID Evenement</th>
                        <th>Titre</th>
						<th>Date</th>
                        <th>Heure</th>
                        <th>Description
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>     
                <?PHP 
                foreach($listeEvenement as $row)
                {
                ?> 		
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox5" name="options[]" value="1">
								<label for="checkbox5"></label>
							</span>
						</td>
                        <td><?PHP echo $row['id_event']; ?></td>
						<td><?PHP echo $row['titre']; ?></td>
						<td><?PHP echo $row['date']; ?></td>
						<td><?PHP echo $row['heure'];?></td> 
						<td><?PHP echo $row['description'];?></td> 
						
						<td>
							<form method="POST" action="supprimerEvenement.php">
						 <button type="submit" class="btn btn-danger">  <i class="material-icons" data-toggle="tooltip" title="Supprimer">&#xE15C;</i> <span>Supprimer</span> </button>
						 <input type="hidden" value="<?PHP echo $row['id_event']; ?>" name="id_event">
						 </form>
						 <td>
						 <a href="modifierEvent.php?id_event=<?PHP echo $row['id_event']; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
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
				<form method="POST" action="ajoutEvent.php">
					<div class="modal-header">						
						<h4 class="modal-title">Ajoute un Evenement</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Id Evenement</label>
							<input type="text" name="id_event" class="form-control" required name="id_event">
						</div>
						<div class="form-group">
							<label>Titre</label>
							<input name="titre" type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Date</label>
							<?PHP $date = date('Y-m-d'); ?>
							<input type="date" class="form-control" name="date" min="<?php echo $date ?>" value="<?php echo $date ?>" required></input>
						</div>
						<div class="form-group">
							<label>Heure</label>
							<input type="time" name="heure" class="form-control" required>
						</div>		
						<div class="form-group">
							<label>Description</label>
							<input type="text" name="description" class="form-control" required>
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