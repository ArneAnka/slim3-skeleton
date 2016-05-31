<?php
namespace App\Models;

use PDO;

class User {

    public static function find($id){

		// $sql = "SELECT * FROM hej WHERE id = :id";
		// $query = $database->prepare($sql);
		// $query->execute(array(':id' => $id));
		// return $query->fetchAll();

		return 'This return should be from a query....';

    }

}