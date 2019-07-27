<?php

namespace models;

use core\Model;
use mysqli;

class ModelMain extends Model {

    /**
     *
     * @var mysqli
     */
    protected $db;
    public $title;
    public $text;
    public $date_time;
    public $id;

    public function __construct() {
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_NAME);
        $this->title = filter_input(INPUT_POST, 'title');
        $this->text = filter_input(INPUT_POST, 'content');
        $this->date_time = filter_input(INPUT_POST, 'date');
        $time = date("Y-m-d");
        $today = date('H:m:s');
        $res_date = $time . ' ' . $today;
        $this->date_time = $res_date;
        $this->id= filter_input(INPUT_POST, 'deleteNewsId');
    }

    public function all() {
        $query = "SELECT news.id, news.name, news.text, news.dateOfCreate, COUNT(comments.news_id) FROM news LEFT JOIN comments ON comments.news_id=news.id GROUP BY news.id ORDER BY news.id DESC;";
        $result = $this->db->query($query);
        if (!$result) {
            return false;
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function popular() {
        $query = "SELECT news.id, news.name, news.text,news.dateOfCreate,COUNT(comments.news_id) as total FROM comments INNER JOIN news ON comments.news_id = news.id group BY comments.news_id ORDER BY total desc limit 5;";
        $result = $this->db->query($query);
        if (!$result) {
            return false;
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function delete() {
        $query = "DELETE FROM `news` WHERE `news`.`id` = " . $this->id . ";";
        $result = $this->db->query($query);
        $url = $_SERVER['HTTP_ORIGIN'];
        if (!$result) {
            return false;
        }
        header('Location: ' . $url . '/');
    }

    public function validator($title, $text) {
        if (empty($title) || strlen($title) > 150) {
            return false;
        } else if (empty($text)) {
            return false;
        } else {
            return true;
        }
    }

    public function addNews() {
        if ($this->validator($this->title, $this->text)) {
            $query = "INSERT INTO news VALUES (null, '" . $this->title . "', '" . $this->text . "', '" . $this->date_time . "');";
            $result = $this->db->query($query);
            $url = $_SERVER['HTTP_ORIGIN'];
            if (!$result) {
                return false;
            } else {
                header("Location: " . $url . "/");
            }
        } else {
            header("Location: " . $url . "/");
        }
    }

}
