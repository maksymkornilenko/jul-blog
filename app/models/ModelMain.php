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
    public $id;

    public function __construct() {
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_NAME);
        $this->id= filter_input(INPUT_POST, 'deleteNewsId');
    }

    public function all() {
        $query = "SELECT COUNT(comments.news_id), news.id, news.name, news.text, news.dateOfCreate FROM news LEFT JOIN comments ON comments.news_id=news.id GROUP BY news.name order by news.id;";
        $result = $this->db->query($query);
        if (!$result) {
            return false;
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function popular() {
        $query = "SELECT news.id, news.name, news.text,news.dateOfCreate,COUNT(comments.news_id) as total FROM comments INNER JOIN news ON comments.news_id = news.id group BY comments.news_id ORDER BY total desc;";
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

}
