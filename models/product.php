<?php
require_once('connection.php');
require_once('cart.php');
class Product {
    public $id;
    public $name;
    public $price;
    public $description;
    public $rating;
    public $date;
    public $default_img;
    public $feature_id;

    public function __construct($id, $name, $price, $description, $rating, $date, $default_img, $feature_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->rating = $rating;
        $this->date = $date;
        $this->default_img = $default_img;
        $this->feature_id = $feature_id;
    }

    static function getAll()
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM product;");
        $products = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $product)
        {
            $products[] = new Product(
                $product['id'],
                $product['name'],
                $product['price'],
                $product['description'],
                $product['rating'],
                $product['date'],
                $product['default_img'],
                $product['feature_id']
            );
        }
        return $products;
    }

    static function getProduct($id)
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM product WHERE id = $id;");

        if ($req->num_rows === 0) {
            return null; // or handle accordingly based on your logic
        }
        
        $result = $req->fetch_assoc();
        $product = new Product(
            $result['id'],
            $result['name'],
            $result['price'],
            $result['description'],
            $result['rating'],
            $result['date'],
            $result['default_img'],
            $result['feature_id']
        );
        return $product;
    }

    static function getFeaturePro($feature_id) {
        $db = DB::getInstance();
        $req = $db->query(
            "SELECT * FROM product WHERE feature_id = $feature_id"
        );
        $products = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $product)
        {
            $products[] = new Product(
                $product['id'],
                $product['name'],
                $product['price'],
                $product['description'],
                $product['rating'],
                $product['date'],
                $product['default_img'],
                $product['feature_id']
            );
        }
        return $products;
    }

    static function getNewPro() {
        $db = DB::getInstance();
        $req = $db->query(
            "SELECT * FROM product ORDER BY date DESC LIMIT 10;"
        );
        $products = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $product)
        {
            $products[] = new Product(
                $product['id'],
                $product['name'],
                $product['price'],
                $product['description'],
                $product['rating'],
                $product['date'],
                $product['default_img'],
                $product['feature_id']
            );
        }
        return $products;
    }

    static function getUserCart($user_id) {
        $db = DB::getInstance();
        $req = $db->query("
            SELECT 
                product.*, 
                C.*,
                C.id AS cart_id
            FROM product 
            JOIN cart AS C
            ON product.id = C.product_id
            WHERE C.purchase = 0 AND C.user_id = '$user_id';
        ");
        $products = [];
        $cart = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $product) {
            $products[] = new Product(
                $product['product_id'],
                $product['name'],
                $product['price'],
                $product['description'],
                $product['rating'],
                $product['date'],
                $product['default_img'],
                $product['feature_id'],
            );

            $cart[] = new Cart(
                $product['cart_id'],
                $product['user_id'],
                $product['product_id'],
                $product['size'],
                $product['img'],
                $product['amount'],
                $product['purchase'],
                $product['coupon_id'],
                $product['datePurchase']
            );
        }
        return array($products, $cart);
    }

    static function insert($name, $price, $description, $default_img) {
        $db = DB::getInstance();
        $req = $db->query("
            INSERT INTO product (name, price, description, rating, date, default_img)
            VALUES ('$name', $price, '$description', 5, NOW(), '$default_img');
        ");
        return $req;
    }

    static function delete($id) {
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM product WHERE id = $id;");
        return $req;
    }

    static function update($id, $name, $price, $description, $rating, $default_img, $feature_id) {
        $db = DB::getInstance();
        if ($feature_id === null) {
            $req = $db->query("
                UPDATE product 
                SET name = '$name', 
                price = $price, 
                description = '$description', 
                rating = $rating, 
                date = NOW(), 
                default_img = '$default_img', 
                feature_id = NULL
                WHERE id = $id;
            ");
            return $req;
        } else {
            $req = $db->query("
                UPDATE product 
                SET name = '$name', 
                price = $price, 
                description = '$description', 
                rating = $rating, 
                date = NOW(), 
                default_img = '$default_img', 
                feature_id = $feature_id WHERE id = $id;
            ");
            return $req;
        }
        
    }

    static function removeFeature($feature_id) {
        $db = DB::getInstance();
        $req = $db->query("
            UPDATE product SET feature_id = NULL WHERE feature_id = $feature_id;
        ");
    }
}