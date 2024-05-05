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

    public function __construct($id, $user_id, $product_id, $size, $img, $amount, $purchase, $coupon_id, $datePurchase)
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
        $carts = [];
        foreach($req->fetch_all(MYSQLI_ASSOC) as $cart) {
            $carts[] = new Cart(
                $cart['id'],
                $cart['user_id'],
                $cart['product_id'],
                $cart['size'],
                $cart['img'],
                $cart['amount'],
                $cart['purchase'],
                $cart['coupon_id'],
                $cart['datePurchase'],
            );
        }
        return $carts;
    }

    static function get($id) {
        $db = DB::getInstance();
        $req = $db->query(
            "SELECT * FROM cart WHERE id = $id"
        );
        if ($req->num_rows === 0) {
            return null;
        }
        $result = $req->fetch_assoc();
        $cart = new Cart(
            $result['id'],
            $result['user_id'],
            $result['product_id'],
            $result['size'],
            $result['img'],
            $result['amount'],
            $result['purchase'],
            $result['coupon_id'],
            $result['datePurchase'],
        );

        return $cart;
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
            $req = $db->query("UPDATE cart SET coupon_id = '$coupon_id', purchase = 1, datePurchase = NOW() WHERE id = $id;");
            return $req;
        }
        
    }


    
}