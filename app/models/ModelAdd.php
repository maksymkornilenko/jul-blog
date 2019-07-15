<?php

namespace models;

use core\Model;
use mysqli;

class ModelAdd extends Model {

    /**
     *
     * @var mysqli
     */
    protected $db;
    public $title;
    public $text;
    public $date_time;

    public function __construct() {
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_NAME);
        $this->title = filter_input(INPUT_POST, 'title');
        $this->text = filter_input(INPUT_POST, 'content');
        $this->date_time = filter_input(INPUT_POST, 'date');
        $time = date("Y-m-d");
        $today = date('H:m:s');
        $res_date = $time . ' ' . $today;
        $this->date_time = $res_date;
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
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->error_message = $_SESSION["file_error_message"];
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

}
