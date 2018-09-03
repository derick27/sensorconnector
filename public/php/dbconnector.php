<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
class DBconnector{ // start DBconnector class
	// declarations
	private $host="localhost";
	private $user="derick";
	private $pass="Icunga1@";
	private $dbname ="silo";
	private $con;
     //constructor
	function __constructor(){
		$this->con = $this->connectDB();
	}
	// database conection
	function connectDB(){
		$con = mysqli_connect($this->host,$this->user,$this->pass,$this->dbname);
			return $con;	
		
	
	}
	//execute query
	function runQuery($query){
		$results = mysqli_query($this->con, $query);
		while($row =mysqli_fetch_ass($results)){
			$resultset[] =$row;
		}
		if(!empty($resultset))
			return $resultset;
	}// end execute query 
	 //function  returns number of rowa
	function numRow($query){
		$results =mysqli_query($this->con,$query);
		$numOfRow =mysqli_num_rows($results);
		return $numOfRow;
	}
	//function to insert new record
	function insertQuery($query){
		$results = mysqli_query($this->con,$query);
		if(!$results){
			die('Invalid query'.mysql_error());
		}
		else{
			return $results;
		}
	}
	//function to update  existing  record
	function updateQuery($query){
		$results = mysqli_query($this->con,$query);
		if(!$results){
			die('Invalid query'.mysqli_error());
		}
		else{
			return $results;
		}
	}
	// function to delete  a record
	function deleteQuery($query){
		$results = mysqli_query($this->con,$query);
		if(!$results){
			die('Invalid query'.mysql_error());
		}
		else{
			return $results;
		}
	}
  
}
?>
