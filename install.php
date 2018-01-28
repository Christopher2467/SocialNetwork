<?php

require "data/config.php";


try 
{
	$database = new Database();
	$db = $database->dbConnection();	
	$sql = file_get_contents("data/init.sql");
	$db->exec($sql);
	
	echo "Database and table users created successfully.";
}

catch(PDOException $error)
{
	echo $sql . "<br>" . $error->getMessage();
}
