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
			
			$sql = $this->conn->prepare("INSERT INTO posts(poster_id, post_content) 
		                                               VALUES(:pid, :pcontent)");
												  
			$sql->bindparam(":pid", $posterid);
			$sql->bindparam(":pcontent", $postcontent);
				
			$sql->execute();	
			
			return $sql;	
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}				
	}
	
	public function deletepost($postid)	{
		try{
			$sql = $this->conn->prepare("DELETE FROM posts WHERE id = :postid");
			$sql->bindparam(":postid", $postid);
			$sql->execute();	
			
			return $sql;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}				
	}

	public function getuserposts($posterid)	{
		try{

			$sql = $this->conn->prepare("SELECT * FROM posts WHERE poster_id=:posterid ORDER BY post_date DESC");
			$sql->execute(array(":posterid"=>$posterid));
			
			$user_posts_req = $sql->fetchALL(PDO::FETCH_ASSOC);
			
			return $user_posts_req;

		}
		catch(PDOException $e){
			echo $e->getMessage();
		}				
	}
}

?>