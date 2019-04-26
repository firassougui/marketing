<link rel="stylesheet" href="../kiaalap-master/style3.css">
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
<body>
<div class="container">
		<div class="table-wrapper">
			<div class="modal-content" align="center">
				
				<form method="POST">
					<table>
					<div class="table-title">						
						<h2 class="modal-title">Modifier Evenement</h2>
						
					</div>
					<div class="modal-body" >
					<tr>					
						<div class="form-group">
							<td>
							<label>ID Evenement</label>
							</td>
							<td>
							<input  value="<?PHP echo $id_event ?>" name="id_event" type="text" class="form-control" readonly>
						</td>
						</div>
					</tr>
					<tr>
						<div class="form-group">
							<td>
							<label>Titre</label>
						</td>
						<td>
							<input value="<?PHP echo $titre ?>" type="text" name="titre" class="form-control" required>
						</td>
						</div>
					</tr>
					<tr>
						<div class="form-group">
							<td>
							<label>Date</label>
						</td>
						<td>
							<?PHP $date = date('Y-m-d'); ?>
							<input type="date" name="date" value="<?PHP echo $date ?>" min="<?php echo $date ?>" class="form-control" required></input>
						</td>
						</div>
					</tr>
					<tr>
						<div class="form-group">
							<td>
							<label>Heure</label>
						</td>
						<td>
							<input name="heure" type="time" value="<?PHP echo $heure ?>" class="form-control" required>
						</td>
						</div>	
					</tr>
					<tr>
						<div class="form-group">
							<td>
							<label>Description</label>
						</td>
						<td>	
							<input name="description" type="text" value="<?PHP echo $description ?>" class="form-control" required>
						</td>
						</div>
					</tr>
					</div>
					<tr>
					<div class="modal-footer">
						<td>
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" style="color: #fff; background-color: #d9534f; border-color: #d43f3a;" >
					</td>
					<td>
						<input type="submit" name="modifier" class="btn btn-success" value="Modifier" style="color: #fff;

    background-color: #5cb85c;
    border-color: #4cae4c;">
</td>
						<input type="hidden" name="id_event_ini" value="<?PHP echo $_GET['id_event'];?>">
					</div>
				</tr>
				</table>
				</form>
			</div>
		</div>
	</div>
</body>
	<?PHP
	}
}
if (isset($_POST['modifier'])){
	$e=new evenement($_POST['id_event'],$_POST['titre'],$_POST['date'],$_POST['heure'],$_POST['description']);
	$event->modifierEvent($e,$_POST['id_event_ini']);
	echo $_POST['id_event_ini'];
	header('Location: ../kiaalap-master/events.php');
}
?>