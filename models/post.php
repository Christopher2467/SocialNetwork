<?php

require_once('../data/config.php');

class POST{	

	private $conn;
	
	public function __construct(){
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }

    public function createpost($posterid, $postcontent)	{
		try{
			
			$stmt = $this->conn->prepare("INSERT INTO posts(poster_id, post_content) 
		                                               VALUES(:pid, :pcontent)");
												  
			$stmt->bindparam(":pid", $posterid);
			$stmt->bindparam(":pcontent", $postcontent);
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}				
	}
	
	public function deletepost($postid)	{
		try{
			
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}				
	}
}

?>