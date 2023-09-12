<?php
class Database{

    public function getConnection(){
		$localhost = 'localhost';
		$database = 'asocivica';
		$user = 'root';
		$password = 'admin';

		$link = new PDO("mysql:host=$localhost;dbname=$database",$user,$password);

		return $link;
    }
}
?>
