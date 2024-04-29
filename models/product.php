<?php
require_once('connection.php');
class Product {
    public $id;
    public $name;
    public $price;
    public $description;
    public $category;
    public $date;
    public $img;
    public $feature_id;

    public function __construct($id, $name, $price, $description, $category, $date, $img, $feature_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->category = $category;
        $this->date = $date;
        $this->img = $img;
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
                $product['category'],
                $product['date'],
                $product['img'],
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
            $result['category'],
            $product['date'],
            $result['img'],
            $product['feature_id']
        );
        return $product;
    }

    static function getFeaturePro($feature_id) {
        $db = DB::getInstance();
        $req = $db->query(
            "SELECT * FROM product WHERE feature_id = $feature_id"
        );
        if ($req->num_rows === 0) {
            return null; // or handle accordingly based on your logic
        }
        $products = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $product)
        {
            $products[] = new Product(
                $product['id'],
                $product['name'],
                $product['price'],
                $product['description'],
                $product['category'],
                $product['date'],
                $product['img'],
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
        if ($req->num_rows === 0) {
            return null; // or handle accordingly based on your logic
        }
        $products = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $product)
        {
            $products[] = new Product(
                $product['id'],
                $product['name'],
                $product['price'],
                $product['description'],
                $product['category'],
                $product['date'],
                $product['img'],
                $product['feature_id']
            );
        }
        return $products;
    }

    static function getUserCart($user_id) {
        $db = DB::getInstance();
        $req = $db->query("
            SELECT * FROM product 
            JOIN cart AS C
            ON product.id = cart.product_id
            WHERE C.purchase = 0 AND C.user_id = $user_id;
        ")
        if ($req->num_rows === 0) {
            return null; // or handle accordingly based on your logic
        }
        $products = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $product) {
            $products[] = new Product(
                $product['id'],
                $product['name'],
                $product['price'],
                $product['description'],
                $product['category'],
                $product['date'],
                $product['img'],
                $product['feature_id'],
            );
        }
        return $products;
    }

    static function insert($name, $price, $description, $category, $img) {
        $db = DB::getInstance();
        $req = $db->query("
            INSERT INTO product (name, price, description, category, date, img)
            VALUES ($name, $price, $description, $category, NOW(), $img);
        ");
        return $req;
    }

    static function delete($id) {
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM product WHERE id = $id;");
        return $req;
    }

    static function update($id, $name, $price, $description, $category, $date, $img) {
        $db = DB::getInstance();
        $req = $db->query("
            UPDATE product SET name = $name, price = $price, description = $description, category = $category, date = $date, img = $img WHERE id = $id;
        ");
        return $req;
    }
}