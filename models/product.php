<?php
require_once('connection.php');
class Product {
    public $id;
    public $name;
    public $price;
    public $description;
    public $rating;
    public $category;
    public $date;
    public $default_img;
    public $feature_id;

    public function __construct($id, $name, $price, $description, $rating, $category, $date, $default_img, $feature_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->rating = $rating;
        $this->category = $category;
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
                $product['category'],
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
        $req = $db->query("SELECT * FROM product WHERE id = '$id';");

        if ($req->num_rows === 0) {
            return null; // or handle accordingly based on your logic
        }
        
        $result = $req->fetch_assoc();
        $product = new Product(
            $result['id'],
            $result['name'],
            $result['price'],
            $result['description'],
            $product['rating'],
            $result['category'],
            $product['date'],
            $result['default_img'],
            $product['feature_id']
        );
        return $product;
    }

    static function getFeaturePro($feature_id) {
        $db = DB::getInstance();
        $req = $db->query(
            "SELECT * FROM product WHERE feature_id = '$feature_id'"
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
                $product['rating'],
                $product['category'],
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
                $product['rating'],
                $product['category'],
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
            SELECT * FROM product 
            JOIN cart AS C
            ON product.id = cart.product_id
            WHERE C.purchase = 0 AND C.user_id = '$user_id';
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
                $product['rating'],
                $product['category'],
                $product['date'],
                $product['default_img'],
                $product['feature_id'],
            );
        }
        return $products;
    }

    static function insert($name, $price, $description, $rating, $category, $default_img) {
        $db = DB::getInstance();
        $req = $db->query("
            INSERT INTO product (name, price, description, rating, category, date, default_img)
            VALUES ('$name', $price, '$description', $rating, '$category', NOW(), '$default_img');
        ");
        return $req;
    }

    static function delete($id) {
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM product WHERE id = $id;");
        return $req;
    }

    static function update($id, $name, $price, $description, $rating, $category, $date, $default_img) {
        $db = DB::getInstance();
        $req = $db->query("
            UPDATE product SET name = '$name', price = $price, description = '$description', rating = $rating, category = '$category', date = '$date', default_img = '$default_img' WHERE id = '$id';
        ");
        return $req;
    }
}