<link rel="stylesheet" href="style.css">



<?PHP
include "../entities/evenement.php";
include "../core/evenementC.php";
if (isset($_GET['id_event'])){
	$event=new EvenementC();
    $result=$event->recupererEvent($_GET['id_event']);
	foreach($result as $row){
		$id_event=$row['id_event'];
		$titre=$row['titre'];
		$date=$row['date'];
		$heure=$row['heure'];
		$description=$row['description'];
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
							<label>ID Evenement</label>
							
							<input  value="<?PHP echo $id_event ?>" name="id_event" type="text" class="form-control" readonly>
						</div>
						
						<div class="form-group">
							<label>Titre</label>
							<input value="<?PHP echo $titre ?>" type="text" name="titre" class="form-control" required>
						</div>
						<div class="form-group">

							<label>Date</label>
							<?PHP $date = date('Y-m-d'); ?>
							<input type="date" name="date" value="<?PHP echo $date ?>" min="<?php echo $date ?>" class="form-control" required></input>
						</div>
						<div class="form-group">
							<label>Heure</label>
							<input name="heure" type="text" value="<?PHP echo $heure ?>" class="form-control" required>
						</div>	
						<div class="form-group">
							<label>Description</label>
							<input name="description" type="text" value="<?PHP echo $description ?>" class="form-control" required>
						</div>				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" style="color: #fff; background-color: #d9534f; border-color: #d43f3a;" >
						<input type="submit" name="modifier" class="btn btn-success" value="Modifier" style="color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c;">
						<input type="hidden" name="id_event_ini" value="<?PHP echo $_GET['id_event'];?>">
					</div>
				</form>
			</div>
		</div>
	</div>
	<?PHP
	}
}
if (isset($_POST['modifier'])){
	$e=new evenement($_POST['id_event'],$_POST['titre'],$_POST['date'],$_POST['heure'],$_POST['description']);
	$event->modifierEvent($e,$_POST['id_event_ini']);
	echo $_POST['id_event_ini'];
	header('Location: afficherEvent.php');
}
?>