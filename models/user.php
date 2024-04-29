<?php
require_once('connection.php');

$salt = 'abcdefgh';

class User
{
    public $email;
    public $profile_photo;
    public $fname;
    public $lname;
    public $gender;
    public $birthday;
    public $phone;
    public $createAt;
    public $updateAt;
    public $password;

    public function __construct($email, $profile_photo, $fname, $lname, $gender, $birthday, $phone, $createAt, $updateAt, $password)
    {
        $this->email = $email;
        $this->profile_photo = $profile_photo;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->gender = $gender;
        $this->birthday = $birthday;
        $this->phone = $phone;
        $this->createAt = $createAt;
        $this->updateAt = $updateAt;
        $this->password = $password;
    }

    static function getAll()
    {
        $db = DB::getInstance();
        $req = $db->query(
            "SELECT *
            FROM user;"
        );
        $users = [];
        foreach($req->fetch_all(MYSQLI_ASSOC) as $user) {
            $users[] = new User(
                $user['email'],
                $user['profile_photo'],
                $user['fname'],
                $user['lname'],
                $user['gender'],
                $user['birthday'],
                $user['phone'],
                $user['createAt'],
                $user['updateAt'],
                '' // Do not return password
            );
        }
        return $users;
    }

    static function get($email)
    {
        $db = DB::getInstance();
        $req = $db->query(
            "
            SELECT email, profile_photo, fname, lname, gender, birthday, phone, createAt, updateAt 
            FROM user
            WHERE email = '$email'
            ;"
        );
    
        // Check if the query returned any results
        if ($req->num_rows === 0) {
            return null; // or handle accordingly based on your logic
        }
    
        $result = $req->fetch_assoc();
        $user = new User(
            $result['email'],
            $result['profile_photo'],
            $result['fname'],
            $result['lname'],
            $result['gender'],
            $result['birthday'],
            $result['phone'],
            $result['createAt'],
            $result['updateAt'],
            '' // Do not return password
        );
    
        return $user;
    }
    

    static function insert($email, $profile_photo, $fname, $lname, $gender, $birthday, $phone, $password)
    {
        $password_hash = password_hash($password . $salt, PASSWORD_DEFAULT);
        $db = DB::getInstance();
        $req = $db->query(
            "
            INSERT INTO user (email, profile_photo, fname, lname, gender, birthday, phone, createAt, updateAt, password)
            VALUES ('$email', '$profile_photo', '$fname', '$lname', $gender, $birthday, '$phone', NOW(), NOW(), '$password_hash')
            ;");
        return $req;
    }

    static function delete($email)
    {
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM user WHERE email = '$email';");
        return $req;
    }

    static function update($email, $profile_photo, $fname, $lname, $gender, $birthday, $phone)
    {
        $db = DB::getInstance();
        $req = $db->query(
            "
            UPDATE user
            SET profile_photo = '$profile_photo', fname = '$fname', lname = '$lname', gender = $gender, birthday = $birthday, phone = '$phone', updateAt = NOW()
            WHERE email = '$email'
            ;"
        );
        return $req;
    }

    static function validation($email, $password)
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM user WHERE email = '$email'");
        if (@password_verify($password . $salt, $req->fetch_assoc()['password']))
            return true;
        else
            return false;
    }

    static function validateRegister($email)
    {
        $db = DB::getInstance();

        $stmt = $db->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $stmt->close();
            return false;
        }

        $stmt->close();
        return true;
    }

    static function changePassword($email, $oldpassword, $newpassword)
    {
        if (User::validation($email, $oldpassword)) {
            $password_hash = password_hash($newpassword, PASSWORD_DEFAULT);
            $db = DB::getInstance();
            $req = $db->query(
                "UPDATE user
                SET password = '$password_hash', updateAt = NOW()
                WHERE email = '$email';");
            return $req;
        } else {
            return false;
        }
    }

    static function changePassword_($email, $newpassword)
    {
        $password_hash = password_hash($newpassword . $salt, PASSWORD_DEFAULT);
        $db = DB::getInstance();
        $req = $db->query(
            "UPDATE user
            SET password = '$password_hash', updateAt = NOW()
            WHERE email = '$email';");
        return $req;
    }
}

?>