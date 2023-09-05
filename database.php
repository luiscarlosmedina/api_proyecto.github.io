<?php
class Database{

    public function getConnection(){
		$localhost = 'b4zpdfljvwzlvh9yqpvc-mysql.services.clever-cloud.com:3306';
		$database = 'b4zpdfljvwzlvh9yqpvc';
		$user = 'ulcb8ojs5uz00guz';
		$password = 'XdvZTIccbpKQJnzSlI3f';

		$link = new PDO("mysql:host=$localhost;dbname=$database",$user,$password);

		return $link;
    }
}
?>
