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

    static function radomString($length = 10) {
		$chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		
		$totalChars = strlen($chars);

		$result = '';

		for ($i = 0; $i < $length; $i++) {
			$index = mt_rand(0, $totalChars - 1);
			$result = $result . $chars[$index];
		}


		return $result;
	}

    static function getAll() {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM coupon");
        $coupons = [];
        foreach($req->fetch_all(MYSQLI_ASSOC) as $coupon) {
            $coupons[] = new Coupon(
                $coupon['stock'],
                $coupon['coupon_num'],
                $coupon['discount'],
                $coupon['createAt'],
                $coupon['expireAt']
            );
        }
        return $coupons;
    }

    static function getCoupon($number) {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM coupon WHERE coupon_num = '$number' AND stock > 0");

        if ($req->num_rows === 0) {
            return null; // or handle accordingly based on your logic
        }

        $result = $req->fetch_assoc();
        $coupon = new Coupon(
            $result['stock'],
            $result['coupon_num'],
            $result['discount'],
            $result['createAt'],
            $result['expireAt']
        );

        return $coupon;
    }

    static function use($number) {
        $db = DB::getInstance();
        $req = $db->query("UPDATE coupon SET stock = stock - 1 WHERE coupon_num = '$number';");
        return $req;
    }

    static function check($number) {
        $db = DB::getInstance();
        $req = $db->query("SELECT 1 FROM coupon WHERE coupon_num = '$number';");
        if ($req->num_rows === 0) {
            return false;
        }
        return true;
    }

    static function update($coupon_num, $stock, $discount, $expireAt) {
        $db = DB::getInstance();
        $req = $db->query("
            UPDATE coupon SET
            stock = $stock,
            discount = $discount,
            expireAt = '$expireAt'
            WHERE coupon_num = '$coupon_num';
        ");
        return $req;
    }

    static function insert($stock, $coupon_num, $discount, $expireAt) {
        $db = DB::getInstance();
        $req = $db->query("
            INSERT INTO coupon (stock, coupon_num, discount, createAt, expireAt)
            VALUES ($stock, '$coupon_num', $discount, NOW(), '$expireAt')
        "); 
        return $req;
    }

    static function delete($number) {
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM coupon WHERE coupon_num = '$number';");
        return $req;
    }
    
}