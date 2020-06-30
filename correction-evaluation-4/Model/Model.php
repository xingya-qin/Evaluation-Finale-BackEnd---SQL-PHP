<?php

/**
 * 
 */
abstract class Model
{
	abstract public function findAll($table);
	abstract public function edit();
	abstract public function delete();

	public function getConnection()
	{
		try{
			$db =new PDO('mysql:host=localhost;dbname=vtc', "root", "");
		}
		catch(PDOException $e){
			print "Erreur";
			die;
		}
		return $db;
	}
}