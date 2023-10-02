<?php

require_once(dirname(__DIR__,1).'/define.php');
require_once(BASE_DIR.'/setup/setup.php');
require_once('database.php');

class Anime {
  private $table = 'anime';
  private $db;

  public function __construct(){
    $this->db = new Database();
  }

  public function getAllAnime(){
    $this->db->query('SELECT * FROM ' . $this->table);
    return $this->db->fetchAllData();
  }

  public function getAllAnimeByStudioID($id){
    $this->db->query('SELECT * FROM '.$this->table.' WHERE studio_id = '.$id);
    return $this->db->fetchAllData();
  }

  public function getAnimeByID($id){
    $this->db->query('SELECT * FROM ' . $this->table . 'WHERE anime_id = ' . $id);
    return $this->db->fetchData();
  }

  public function getTop5AnimeScore(){
    $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY score DESC LIMIT 5');
    return $this->db->fetchAllData();
  }

  public function getAllAnimeIDByGenreID($id){
    $this->db->query('SELECT '.$this->table.'.anime_id FROM ' . $this->table . ' JOIN anime_genre ON '.$this->table.'.anime_id = anime_genre.anime_id JOIN genre ON anime_genre.genre_id = genre.genre_id WHERE genre.genre_id = '.$id);
    return $this->db->fetchAllData();
  }

  public function insertAnime($data){
    $this->db->query('INSERT INTO ' . $this->table . ' (title, type, status, episodes, rating, score, image, trailer, studio_id) VALUES ('.$data['title'].','.$data['type'].','.$data['status'].','.$data['episodes'].','.$data['rating'].','.$data['score'].','.$data['image'].','.$data['trailer'].','.$data['studio_id'].')');
    $this->db->execute();
    return ($this->db->countRow() == 1);
    // if countRow != 1, query fails
  }

  public function updateAnime($data){
    $this->db->query('UPDATE ' . $this->table . 'SET title = '.$data['title'].', type = '.$data['type'].', status = '.$data['status'].', episodes = '.$data['episodes'].', rating = '.$data['rating'].', score = '.$data['score'].', image = '.$data['image'].', trailer = '.$data['trailer'].', studio_id = '.$data['studio_id'].' WHERE anime_id = '. $data['anime_id']);
    $this->db->execute();
    return ($this->db->countRow() == 1);
    // if countRow != 1, query fails
  }

  public function deleteAnime($id){
    $this->db->query('DELETE FROM ' . $this->table . ' WHERE anime_id = '. $id);
    $this->db->execute();
    return ($this->db->countRow() == 1);
    // if countRow != 1, query fails
  }
}