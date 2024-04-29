<?php
require_once('connection.php');
class Cart {
    public $id;
    public $user_id;
    public $product_id;
    public $size;
    public $amount;
    public $purchase;
    public $coupon_apply;

    public function __construct($user_id, $product_id, $size, $amount, $purchase, $coupon_apply)
    {
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->size = $size;
        $this->amount = $amount;
        $this->purchase = $purchase;
        $this->coupon_apply = $coupon_apply;
    }

    static function getAll() {
        $db = DB::getInstance();
        $req = $db->query(
            "SELECT * FROM cart;"
        )
        return $req;
    }

    static function insert($user_id, $product_id, $size, $amount, $coupon_apply) {
        $db = DB::getInstance();
        $req = $db->query("
            INSERT INTO cart (user_id, product_id, size, amount, purchase, coupon_apply)
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

    static function makePurchase($id, $coupon_apply) {
        $db = DB::getInstance();
        $req = $db->query("UPDATE cart SET coupon_apply = $coupon_apply, purchase = 1 WHERE id = $id;");
        return $req;
    }


    
}