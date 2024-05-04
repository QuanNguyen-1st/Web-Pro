<?php
require_once('connection.php');
class Stock {
    public $id;
    public $product_id;
    public $size;
    public $stock_num;
    public $img;

    public function __construct($id, $product_id, $size, $stock_num, $img) {
        $this->id = $id;
        $this->product_id = $product_id;
        $this->size = $size;
        $this->stock_num = $stock_num;
        $this->img = $img;
    }

    static function checkAvail($product_id, $size, $img, $amount) {
        $db = DB::getInstance();
        $req = $db->query("
            SELECT 1 FROM stock WHERE product_id = $product_id AND size = $size AND img = '$img' AND stock_num >= $amount;
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
              AND stock_num > 0
            GROUP BY img;
        ");
        $stocks = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $stock) {
            $stocks[] = new Stock(
                $stock['id'],
                $stock['product_id'],
                $stock['size'],
                $stock['stock_num'],
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

    static function insert($product_id, $size,  $img, $stock_num) {
        if (Stock::check($product_id, $size, $img)) {
            $db = DB::getInstance();
            $req = $db->query("
                INSERT INTO stock (product_id, size, stock_num, img)
                VALUES ($product_id, $size, $stock_num, '$img');
            ");
            return $req;
        } else {
            return null;
        }
    }

    static function update($product_id, $size, $img, $stock_num) {
        if (Stock::check($product_id, $size, $img)) {
            return null;
        } else {
            $db = DB::getInstance();
            $req = $db->query("
                UPDATE stock SET stock_num = $stock_num WHERE product_id = $product_id AND size = $size AND img = '$img';
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
                UPDATE stock SET stock_num = $stock_num - $amount WHERE product_id = $product_id AND size = $size AND img = '$img';
            ");
            return $req;
        }
    }
}