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
        $this->img = $img;
    }

    static function checkAvail($product_id, $size, $img, $amount) {
        $db = DB::getInstance();
        $req = $db->query("
            SELECT 1 FROM stock WHERE product_id = $product_id AND size = $size AND img = '$img' AND amount >= $amount;
        ");
        if ($req->num_rows === 0) {
            return true;
        }
        return false;
    }

    static function getAlt($product_id) {
        $db = DB::getInstance();
        $req = $db->query("
            SELECT * 
            FROM stock 
            WHERE product_id = $product_id 
              AND stock > 0
            GROUP BY img;
        ");
        $stocks = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $stock) {
            $stocks[] = new Stock(
                $stock['id'],
                $stock['product_id'],
                $stock['size'],
                $stock['stock'],
                $stock['img']
            );
        }
        return $stocks;
    }

    static function check($product_id, $size, $img) {
        $db = DB::getInstance();
        $req = $db->query("
            SELECT 1 FROM stock WHERE product_id = $product_id AND size = $size AND img = '$img';
        ");
        if ($req->num_rows === 0) {
            return true;
        }
        return false;
    }

    static function insert($product_id, $size,  $img, $stock) {
        if (Stock::check($product_id, $size, $img)) {
            $db = DB::getInstance();
            $req = $db->query("
                INSERT INTO stock (product_id, size, stock, img)
                VALUES ($product_id, $size, $stock, '$img');
            ");
            return $req;
        } else {
            return null;
        }
    }

    static function update($product_id, $size, $img, $stock) {
        if (Stock::check($product_id, $size, $img)) {
            return null;
        } else {
            $db = DB::getInstance();
            $req = $db->query("
                UPDATE stock SET stock = $stock WHERE product_id = $product_id AND size = $size AND img = '$img';
            ");
            return $req;
        }
    }

    static function makePurchase($product_id, $size, $img, $amount) {
        if (Stock::check($product_id, $size, $img)) {
            return null;
        } else {
            $db = DB::getInstance();
            $req = $db->query("
                UPDATE stock SET stock = $stock - $amount WHERE product_id = $product_id AND size = $size AND img = '$img';
            ");
            return $req;
        }
    }
}