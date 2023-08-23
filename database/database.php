<?php
class Database{

    public function getConnection(){
		$localhost = 'localhost';
		$database = 'id20370749_asocivica';
		$user = 'id20370749_ljjft';
		$password = 'Adso*2522';

		$link = new PDO("mysql:host=$localhost;dbname=$database",$user,$password);

		return $link;
    }
}
?>
