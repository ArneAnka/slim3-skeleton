<?php

namespace App\Models;

use PDO;

class User 
{
	/**
	* @var $db
	*/
	private $db;

	public function __construct(PDO $db)
	{
		$this->db = $db;
	}

    public function all($id)
	{
		return 'This return should be from a query....';
    }

    public function findOne($id)
    {
		$sql = 'SELECT * FROM hej WHERE id = :id';
		$query = $this->db->prepare($sql);
		$query->execute(array(':id' => $id));
		return $query->fetchAll();
    }

}