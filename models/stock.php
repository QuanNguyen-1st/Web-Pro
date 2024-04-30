<?php
require_once('connection.php');
class Stock {
    public $id;
    public $product_id;
    public $size;
    public $stock;
    public $img;

    public function __construct($id, $product_id, $size, $stock, $img) {
        $this->id = $id;
        $this->product_id = $product_id;
        $this->size = $size;
        $this->stock = $stock;
    }

    static function check($product_id, $size, $img) {
        $db = DB::getInstance();
        $req = $db->query("
            SELECT 1 FROM stock WHERE product_id = '$product_id' AND size = $size AND img = '$img';
        ");
        if ($req->num_rows === 0) {
            return true;
        }
        return false;
    }

    static function insert($product_id, $size, $stock, $img) {
        if (Stock::check($product_id, $size)) {
            $db = DB::getInstance();
            $req = $db->query("
                INSERT INTO stock (product_id, size, stock, img)
                VALUES ('$product_id', $size, $stock, '$img');
            ");
            return $req;
        } else {
            return null;
        }
    }

    static function update($product_id, $size, $stock) {
        if (Stock::check($product_id, $size)) {
            return null;
        } else {
            $db = DB::getInstance();
            $req = $db->query("
                UPDATE stock SET stock = $stock WHERE product_id = '$product_id' AND size = $size;
            ");
            return $req;
        }
    }
}