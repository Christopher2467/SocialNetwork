<?php

require_once('../data/config.php');

class FRIEND{	

	private $conn;
	
	public function __construct(){
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }

    public function redirect($url){
		header("Location: $url");
	}
	
	public function addfriend($userid, $friendid){
		try{
			
			$sql = $this->conn->prepare("INSERT INTO friends(user_id, friend_id) 
		                                               VALUES(:uid, :fid)");
												  
			$sql->bindparam(":uid", $userid);
			$sql->bindparam(":fid", $friendid);
				
			$sql->execute();	
			
			return $sql;	
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}				
	}

	public function checkiffriend($userid, $friendid){
		
		try{

			$sql = $this->conn->prepare("SELECT * FROM friends WHERE user_id = :uid AND friend_id = :fid");
			$sql->execute(array(':uid'=>$userid, ':fid'=>$friendid));						

			if($sql->rowCount() == 1){
				return true;
			}else{
				return false;
			}
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}				
	}

	public function deletefriend($userid, $friendid){
		try{
			$sql = $this->conn->prepare("DELETE FROM friends WHERE user_id = :uid AND friend_id = :fid");
			$sql->bindparam(":uid", $userid);
			$sql->bindparam(":fid", $friendid);
			$sql->execute();	
			
			return $sql;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}				
	}
	
}

?>