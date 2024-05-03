<?php
require_once('connection.php');
class Cart {
    public $id;
    public $user_id;
    public $product_id;
    public $size;
    public $img;
    public $amount;
    public $purchase;
    public $coupon_id;
    public $datePurchase;

    public function __construct($user_id, $product_id, $size, $img, $amount, $purchase, $coupon_id, $datePurchase)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->size = $size;
        $this->img = $img;
        $this->amount = $amount;
        $this->purchase = $purchase;
        $this->coupon_id = $coupon_id;
        $this->datePurchase = $datePurchase;
    }

    static function getAll() {
        $db = DB::getInstance();
        $req = $db->query(
            "SELECT * FROM cart;"
        );
        return $req;
    }

    static function insert($user_id, $product_id, $size, $img, $amount) {
        $db = DB::getInstance();
        $req = $db->query("
            INSERT INTO cart (user_id, product_id, size, img, amount, purchase, coupon_id, datePurchase)
            VALUES ('$user_id', $product_id, $size, '$img', $amount, 0, NULL, NULL);
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
        if ($coupon_id === null) {
            $req = $db->query("UPDATE cart SET coupon_id = NULL, purchase = 1, datePurchase = NOW() WHERE id = $id;");
            return $req;
        } else {
            $req = $db->query("UPDATE cart SET coupon_id = $coupon_id, purchase = 1, datePurchase = NOW() WHERE id = $id;");
            return $req;
        }
        
    }


    
}