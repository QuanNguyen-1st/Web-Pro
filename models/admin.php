<?php
require_once('connection.php');

$salt = 'abcdefgh';
class Admin
{
    public $username;
    public $password;
    public $createAt;
    public $updateAt;
    public $role=0;

    public function __construct($username, $password, $role, $createAt, $updateAt)
    {
        $this->username = $username;
        $this->password = $password;
        $this->createAt = $createAt;
        $this->updateAt = $updateAt;
        $this->role = $role;

    }

    static function insert($username, $password)
    {
        $password_hash = password_hash($password . $salt, PASSWORD_DEFAULT);
        $db = DB::getInstance();
        $req = $db->query("INSERT INTO admin (username, password, role, createAt, updateAt) VALUES ('$username', '$password_hash', 0, NOW(), NOW());");
        return $req;
    }

    static function getInit($username){
        $db = DB::getInstance();
        $req = $db->query("SELECT role FROM admin WHERE username = '$username'");
        $result = $req->fetch_assoc();
        return $result['role'];
    }


    static function delete($username)
    {
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM admin WHERE username = '$username';");
        return $req;
    }

    static function validation($username, $password)
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM admin WHERE username = '$username'");
        if (@password_verify($password . $salt, $req->fetch_assoc()['password']))
            return true;
        else
            return false;
    }

    static function changePassword($username, $oldpassword, $newpassword)
    {
        if (Admin::validation($username, $oldpassword)) {
            $password_hash = password_hash($newpassword . $salt, PASSWORD_DEFAULT);
            $db = DB::getInstance();
            $req = $db->query(
                "UPDATE admin
                SET password = '$password_hash', updateAt = NOW()
                WHERE username = '$username';"
            );
            return $req;
        } else {
            return false;
        }
    }

    static function changePassword_($username, $newpassword)
    {
        $password_hash = password_hash($newpassword . $salt, PASSWORD_DEFAULT);
        $db = DB::getInstance();
        $req = $db->query(
            "UPDATE admin
            SET password = '$password_hash', updateAt = NOW()
            WHERE username = '$username';"
        );
        return $req;
    }

    static function getAll()
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM admin");
        $admins = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $admin) {
            $admins[] = new Admin(
                $admin['username'],
                $admin['password'],
                $admin['createAt'],
                $admin['updateAt'],
                $admin['role']
            );
        }
        return $admins;
    }
}
