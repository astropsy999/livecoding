<?php

/**
 * main model class
 */
class Model extends Database
{

	protected $table = "";

	public function insert($data)
	{

		//remove unwanted columns
		if(!empty($this->allowedColumns))
		{
			foreach ($data as $key => $value) {
				if(!in_array($key, $this->allowedColumns))
				{
					unset($data[$key]);
				}
			}
		}

		$keys = array_keys($data);

		$query = "INSERT into " . $this->table;
		$query .= " (".implode(",", $keys) .") values (:".implode(",:", $keys) .")";

		$this->query($query,$data);

	}

	public function update($id, $data)
	{

		//remove unwanted columns
		if(!empty($this->allowedColumns))
		{
			foreach ($data as $key => $value) {
				if(!in_array($key, $this->allowedColumns))
				{
					unset($data[$key]);
				}
			}
		}

		$keys = array_keys($data);

		$query = "UPDATE ". $this->table ." SET ";
		foreach($keys as $key) {
			$query .= $key ."=:" .$key . ",";
		}
		$query = trim($query, ",");
		$query.= " WHERE id= :id";

		$data['id'] = $id;
		$this->query($query,$data);

	}

	public function where($data)
	{

		$keys = array_keys($data);

		$query = "SELECT * FROM ".$this->table." WHERE ";

		foreach ($keys as $key) {
			$query .= $key . "=:" . $key . " && ";
		}

 		$query = trim($query,"&& ");
		$res = $this->query($query,$data);

		if(is_array($res))
		{
			return $res;
		}

		return false;

	}

	public function first($data)
	{

		$keys = array_keys($data);

		$query = "SELECT * FROM ".$this->table." WHERE ";

		foreach ($keys as $key) {
			$query .= $key . "=:" . $key . " && ";
		}

 		$query = trim($query,"&& ");
		$query .= " ORDER BY id desc LIMIT 1";
		$res = $this->query($query,$data);

		if(is_array($res))
		{
			return $res[0];
		}

		return false;

	}



}
