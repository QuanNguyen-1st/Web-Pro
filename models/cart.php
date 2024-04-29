<?php
require_once('connection.php');
class Cart {
    public $id;
    public $user_id;
    public $product_id;
    public $size;
    public $amount;
    public $purchase;
    public $coupon_id;

    public function __construct($user_id, $product_id, $size, $amount, $purchase, $coupon_id)
    {
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->size = $size;
        $this->amount = $amount;
        $this->purchase = $purchase;
        $this->coupon_id = $coupon_id;
    }

    static function getAll() {
        $db = DB::getInstance();
        $req = $db->query(
            "SELECT * FROM cart;"
        )
        return $req;
    }

    static function insert($user_id, $product_id, $size, $amount, $coupon_id) {
        $db = DB::getInstance();
        $req = $db->query("
            INSERT INTO cart (user_id, product_id, size, amount, purchase, coupon_id)
            VALUES ($user_id, $product_id, $size, $amount, 0, '');
        ");
        return $req;
    }

    static function delete($id) {
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM cart WHERE id = $id;");
        return $req;
    }

    static function update($id, $amount) {
        $db = DB::getInstance();
        $req = $db->query("UPDATE cart SET amount = $amount WHERE id = $id;");
        return $req;
    }

    static function makePurchase($id, $coupon_id) {
        $db = DB::getInstance();
        $req = $db->query("UPDATE cart SET coupon_id = $coupon_id, purchase = 1 WHERE id = $id;");
        return $req;
    }


    
}