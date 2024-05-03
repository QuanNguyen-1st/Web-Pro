<?php
require_once('connection.php');
class Coupon {
    public $stock;
    public $coupon_num;
    public $discount;
    public $createAt;
    public $expireAt;

    public function __construct($stock, $coupon_num, $discount, $createAt, $expireAt)
    {
        $this->stock = $stock;
        $this->coupon_num = $coupon_num;
        $this->discount = $discount;
        $this->createAt = $createAt;
        $this->expireAt = $expireAt;
    }

    static function getCoupon($number) {
        $db = DB::getInstance();
        $req = $db->query("SELECT 1 FROM coupon WHERE coupon_num = '$number'");

        if ($req->num_rows === 0) {
            return null; // or handle accordingly based on your logic
        }

        $result = $req->fetch_assoc();
        $coupon = new Coupon(
            $result['stock'],
            $result['coupon_num'],
            $result['discount'],
            $result['createAt'],
            $result['expireAt'],
        );

        return $coupon;
    }

    static function insert($stock, $coupon_num, $discount, $expireAt) {
        $db = DB::getInstance();
        $req = $db->query("
            INSERT INTO coupon (stock, coupon_num, discout, createAt, expireAt)
            VALUES ($stock, '$coupon_num', $discount, NOW(), '$expireAt')
        ");
        return $req;
    }

    static function delete($id) {
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM coupon WHERE id = $id;");
        return $req;
    }
    
}