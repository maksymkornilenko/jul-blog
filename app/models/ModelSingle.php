<?php

namespace models;

use core\Model;
use mysqli;

class ModelSingle extends Model {
    /**
     *
     * @var mysqli 
     */
    protected $db;
    public $id;
    public $newsId;
    public $user;
    public $comment;
    public $date_time;


    public function __construct() {
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_NAME);
        $this->id= filter_input(INPUT_POST, 'newsId');
        $this->newsId= filter_input(INPUT_POST, 'id');
        $this->user= filter_input(INPUT_POST, 'user');
        $this->comment= filter_input(INPUT_POST, 'comment');
        $time = date("Y-m-d");
        $today = date('H:m:s');
        $res_date = $time.' '.$today;
        $this->date_time = $res_date;
    }
    public function get() {
        $query = "SELECT * from news where news.id=".$this->id.";";
        $result = $this->db->query($query);
        if (!$result) {
            return false;
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function add(){
        $query = "INSERT INTO comments VALUES (null, '" . $this->user . "', '" . $this->comment . "', '" . $this->date_time . "', '" . $this->newsId . "')";
        $url=$_SERVER['HTTP_ORGIN'];
        $result = $this->db->query($query);
        if (!$result) {
            return false;
        }
        header("Location: " . $url."/single");
    }
    public function refresh() {
        $query = "SELECT * from news where news.id=".$this->newsId.";";
        $result = $this->db->query($query);
        if (!$result) {
            return false;
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getCommentsById() {
        $query = "SELECT * FROM comments WHERE comments.news_id = '" . $this->id . "';";
        $result = $this->db->query($query);
        if (!$result) {
            return false;
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
