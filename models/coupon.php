<?php
require_once('connection.php');
class Coupon {
    public $id;
    public $stock;
    public $coupon_num;
    public $discount;
    public $category_apply;
    public $id_apply;
    public $createAt;
    public $expireAt;

    public function __construct($stock, $coupon_num, $discount, $category_apply, $id_apply, $createAt, $expireAt)
    {
        $this->stock = $stock;
        $this->coupon_num = $coupon_num;
        $this->discount = $discount;
        $this->category_apply = $category_apply;
        $this->id_apply = $id_apply;
        $this->createAt = $createAt;
        $this->expireAt = $expireAt;
    }

    static function getCoupon($number) {
        $db = DB::getInstance();
        $req = $db->query("SELECT 1 FROM coupon WHERE coupon_num = $number");

        if ($req->num_rows === 0) {
            return null; // or handle accordingly based on your logic
        }

        $result = $req->fetch_assoc();
        $coupon = new Coupon(
            $result['stock'],
            $result['coupon_num'],
            $result['discount'],
            $result['category_apply'],
            $result['id_apply'],
            $result['createAt'],
            $result['expireAt'],
        );

        return $coupon;
    }

    static function insert($stock, $coupon_num, $discount, $category_apply, $id_apply, $expireAt) {
        $db = DB::getInstance();
        $req = $db->query("
            INSERT INTO coupon (stock, coupon_num, discout, category_apply, id_apply, createAt, expireAt)
            VALUES ($stock, $coupon_num, $discount, $category_apply, $id_apply, NOW(), $expireAt)
        ");
        return $req;
    }

    static function delete($id) {
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM coupon WHERE id = $id;");
        return $req;
    }
    
}