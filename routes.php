<?php
$pages = array(
  'error' => ['errors'],
  'main' => ['layouts', 'shop', 'cart', 'blog', 'about', 'contact', 'login', 'register'],
  'admin' => ['layouts', 'members', 'products', 'news', 'comments'. 'stocks', 'features', 'coupons', 'carts', 'admin', 'user']
);

$controllers_main = array(
  //Main controller
  'about' => ['index'],
  'shop' => ['index'],
  'contact' => ['index', 'submit'],
  'blog' => ['index', 'comment', 'reply'],
  'cart' => ['index', 'add', 'purchase', 'delete'],
  'register' => ['index', 'submit', 'editInfo']

);

$controllers_admin = array(
    //Admin controller
    'errors' => ['index'],
    'layouts' => ['index'], // Bổ sung thêm các hàm trong controllers
    'products' => ['index','add','edit','delete'],
    'stocks' => ['index','add','edit','delete'],
    'features' => ['index','add','edit','delete'],
    'carts' => ['index','delete'],
    'news' => ['index','add','edit','delete','hide'],
    'coupons' => ['index','add','edit','delete'],
    'comments' => ['index','hide','add','edit','delete'],
    'admin' => ['index', 'add', 'edit', 'delete'],
    'user' => ['index', 'add', 'editInfo', 'editPass', 'delete'],
    'login' => ['index', 'check', 'logout'],
);

$controllers = array(
  'login' => ['index', 'check', 'logout'],
  'layouts' => ['index'],

  //Admin controller
  'errors' => ['index'],
  'products' => ['index','add','edit','delete'],
  'stocks' => ['index','add','edit','delete'],
  'features' => ['index','add','edit','delete'],
  'carts' => ['index','delete'],
  'news' => ['index','add','edit','delete','hide'],
  'coupons' => ['index','add','edit','delete'],
  'comments' => ['index','hide','add','edit','delete'],
  'admin' => ['index', 'add', 'edit', 'delete'],
  'user' => ['index', 'add', 'editInfo', 'editPass', 'delete'],

  //Main controller
  'about' => ['index'],
  'shop' => ['index'],
  'contact' => ['index', 'submit'],
  'blog' => ['index', 'comment', 'reply'],
  'cart' => ['index', 'add', 'purchase', 'delete'],
  'register' => ['index', 'submit', 'editInfo']
);

// Nếu các tham số nhận được từ URL không hợp lệ (không thuộc list controller và action có thể gọi
// thì trang báo lỗi sẽ được gọi ra.
if (!array_key_exists($page, $pages) || !array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
  $page = 'error';
  $controller = 'errors';
  $action = 'index';
}
elseif ( $page=='admin' && !array_key_exists($controller, $controllers_admin) ){
  $page = 'error';
  $controller = 'errors';
  $action = 'index';
}


if($page=='error'){
  $controller = 'errors';
  $action = 'index';
}



// Nhúng file định nghĩa controller vào để có thể dùng được class định nghĩa trong file đó

include_once('controllers/' .$page ."/" . $controller . '_controller.php');
// Tạo ra tên controller class từ các giá trị lấy được từ URL sau đó gọi ra để hiển thị trả về cho người dùng.
$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $klass;
$controller->$action();
