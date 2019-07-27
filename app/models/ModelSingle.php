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
        $this->id = filter_input(INPUT_GET, 'newsId');
        $this->newsId = filter_input(INPUT_POST, 'id');
        $this->user = filter_input(INPUT_POST, 'user');
        $this->comment = filter_input(INPUT_POST, 'comment');
        $time = date("Y-m-d");
        $today = date('H:m:s');
        $res_date = $time . ' ' . $today;
        $this->date_time = $res_date;
    }

    public function get() {
        $query = "SELECT * from news where news.id=" . $this->id . " ORDER BY id desc;";
        $result = $this->db->query($query);
        if (!$result) {
            return false;
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    protected function validator($user, $comment) {
        if (empty($user) || empty($comment)) {
            return FALSE;
        }
        return TRUE;
    }

    public function add() {
        if ($this->validator($this->user, $this->comment)) {
            $query = "INSERT INTO comments VALUES (null, '" . $this->user . "', '" . $this->comment . "', '" . $this->date_time . "', '" . $this->newsId . "')";
            $result = $this->db->query($query);
            if (!$result) {
                return false;
            }
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }else{
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }

    public function getCommentsById() {
        $query = "SELECT * FROM comments WHERE comments.news_id = '" . $this->id . "'ORDER BY id desc;";
        $result = $this->db->query($query);
        if (!$result) {
            return false;
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

}
