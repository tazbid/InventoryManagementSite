<?php

//category_action.php

include('database_connection.php');

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO category (category_name) 
		VALUES (:category_name)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':category_name'	=>	$_POST["category_name"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'New Category Added';
		}
	}
	
	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "SELECT * FROM category WHERE category_id = :category_id";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':category_id'	=>	$_POST["category_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['category_name'] = $row['category_name'];
		}
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE category set category_name = :category_name  
		WHERE category_id = :category_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':category_name'	=>	$_POST["category_name"],
				':category_id'		=>	$_POST["category_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Category Name Edited';
		}
	}
	if($_POST['btn_action'] == 'stchange')
	{
		$status = 'Active';
		if($_POST['status'] == 'Active')
		{
			$status = 'Inactive';	
		}
		$query = "
		UPDATE category 
		SET category_status = :category_status 
		WHERE category_id = :category_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':category_status'	=>	$status,
				':category_id'		=>	$_POST["category_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Category status changed to ' . $status;
		}
	}

	if($_POST['btn_action'] == 'delete')
	{
		$query = " DELETE FROM category WHERE category_id = :category_id ";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':category_id'   => $_POST["category_id"]
			)
		);
		$result =$statement->fetchAll();
		if(isset($result))
		{
			echo 'Category Deleted Successfully';
		}

	}


}

?>