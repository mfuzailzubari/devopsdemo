<?php error_reporting( E_ALL ); ?>

<?php 

    // initialize errors variable
	$errors = "";

	// connect to database
	$db  = new PDO('pgsql:host=ec2-54-204-35-248.compute-1.amazonaws.com;dbname=dafi3q6vct9901', 'iukmjijvutphgh', '7583a6a3fac9d484e1a68113c2aefcf8dbbf1f0d64d4c5ad31a4ac94bb2e3667');
	// $db = mysqli_connect("localhost", "root", "", "todo");

	// insert a quote if submit button is clicked
	if (isset($_POST['submit'])) {
		if (empty($_POST['task'])) {
			$errors = "You must fill in the task";
		}else{
			$task = $_POST['task'];
			$sql = "INSERT INTO tasks(task) VALUES ('$task')";
			// mysqli_query($db, $sql);
			$result = $db->query($sql);
			// print_r($sql);
			// print_r($result);
			header('location: index.php');
		}
	}
	if (isset($_GET['del_task'])) {
		
		$task = $_GET['del_task'];
		$sql = 'delete from tasks where id = $task';
		// mysqli_query($db, $sql);
		$result = $db->query($sql);
		// print_r($sql);
		// print_r($result);
		header('location: index.php');
	}	
	?>

<!DOCTYPE html>
<html>
<head>
	<title>ToDo List Application</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="heading">
		<h2 style="font-style: 'Hervetica';">ToDo List Application</h2>
	</div>
	<form method="post" action="index.php" class="input_form">
		<?php if (isset($errors)) { ?>
			<p><?php echo $errors; ?></p>
		<?php } ?>
		<input type="text" name="task" class="task_input">
		<button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
	</form>
	<table>
	<thead>
		<tr>
			<th>#</th>
			<th>Tasks</th>
			<th style="width: 60px;">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		// select all tasks if page is visited or refreshed
		// $tasks = mysqli_query($db, "SELECT * FROM tasks");
		$data = $db->query("SELECT * FROM tasks");

		while($row = $data->fetch(PDO::FETCH_ASSOC)) { ?>
			<tr>
				<td> <?php echo $row['id']; ?> </td>
				<td class="task"> <?php echo $row['task']; ?> </td>
				<td class="delete"> 
					<a href="index.php?del_task=<?php echo $row['id'] ?>">x</a> 
				</td>
			</tr>
		<?php } ?>	
	</tbody>
</table>
</body>
</html>