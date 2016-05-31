<?php

namespace App\Models;

class User {

	protected $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

    public static function find($id)
	{
		// $sql = "SELECT * FROM hej WHERE id = :id";
		// $query = $database->prepare($sql);
		// $query->execute(array(':id' => $id));
		// return $query->fetchAll();

		return 'This return should be from a query....';
    }

    public static function findSecond($id)
    {
        $sql = 'SELECT * FROM hej WHERE id = :id';
        $query = $this->db->prepare($sql);
        // $query->bindParam(':id', $id, \PDO::PARAM_INT);
		$query->execute(array(':id' => $id));

        return $query->fetchAll();
    }

}