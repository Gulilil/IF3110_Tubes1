<?php

require_once(dirname(__DIR__,1).'/define.php');
require_once(BASE_DIR.'/setup/setup.php');
require_once('database.php');

class Studio {
  private $table = 'studio';
  private $db;

  public function __construct(){
    $this->db = new Database();
  }

  public function getAllStudio(){
    $this->db->query('SELECT * FROM '.$this->table);
    return $this->db->fetchAllData();
  }

  public function getStudioByID($id){
    $this->db->query('SELECT * FROM '.$this->table.' WHERE studio_id = '.$id);
    return $this->db->fetchData();
  }

  public function insertStudio($data){
    $this->db->query('INSERT INTO '.$this->table.'(name, description, established_date) VALUES ('.$data['name'].','.$data['description'].','.$data['established_date'].')');
    $this->db->execute();
    return ($this->db->countRow() == 1);
    // if countRow != 1, query fails
  }

  public function updateStudio($data){
    $this->db->query('UPDATE ' . $this->table . 'SET name = '.$data['name'].', description = '.$data['description'].', established_date = '.$data['established_date'].' WHERE studio_id = '. $data['studio_id']);
    $this->db->execute();
    return ($this->db->countRow() == 1);
    // if countRow != 1, query fails
  }

  public function deleteStudio($id){
      $this->db->query('DELETE FROM ' . $this->table . ' WHERE studio_id = '. $id);
      $this->db->execute();
      return ($this->db->countRow() == 1);
      // if countRow != 1, query fails
  }
}