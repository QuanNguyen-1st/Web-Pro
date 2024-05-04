<?php
require_once('connection.php');
class Feature {
    public $id;
    public $title;
    public $createAt;

    public function __construct($id, $title, $createAt)
    {
        $this->id = $id;
        $this->title = $title;
        $this->createAt = $createAt;
    }

    static function getAll()
    {
        $db = DB::getInstance();
        $req = $db->query(
            "SELECT *
            FROM feature;"
        );
        $features = [];
        foreach($req->fetch_all(MYSQLI_ASSOC) as $feature) {
            $features[] = new Feature(
                $feature['id'],
                $feature['title'],
                $feature['createAt'],
            );
        }
        return $features;
    }

    static function insert($title)
    {
        $db = DB::getInstance();
        $req = $db->query("
            INSERT INTO feature (title, createAt)
            VALUES ('$title', NOW())
        ");
        return $req;
    }

    static function delete($id) {
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM feature WHERE id = $id;");
        return $req;
    }

    static function update($id, $title) {
        $db = DB::getInstance();
        $req = $db->query("
            UPDATE feature SET title = '$title' WHERE id = $id;
        ");
        return $req;
    }

}