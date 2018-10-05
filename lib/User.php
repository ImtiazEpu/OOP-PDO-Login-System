 <?php
include_once "Session.php";
include "Database.php";

class User {
    private $db;
    public function __construct() {
        
        $this->db = new Database();
    }
    
    
    //User Registration Mechanism
    //=========================
    
    public function UserRegistration($data) {
        $name         = $data['name'];
        $username     = $data['username'];
        $email        = $data['email'];
        $password     = ($data['password']);
        $emailchecker = $this->emailCheck($email);
        
        if ($name == "" or $username == "" or $email == "" or $password == "") {
            $msg = "<div class='alert alert-danger'><strong>Error !</strong> Field must not Empty</div>";
            return $msg;
        }
        if (strlen($username) < 4) {
            $msg = "<div class='alert alert-danger'><strong>Error !</strong> Username atlest 4 character</div>";
            return $msg;
        }
        if (preg_match('/[^a-zA-Z0-9_-]+/i', $username)) {
            $msg = "<div class='alert alert-danger'><strong>Error !</strong> Username must only contain [a-z] [0-9] dashes and Underscores !</div>";
            return $msg;
        }
        
        
        //Password validation
        //=====================
        if (strlen($password) < 7) {
            $msg = "<div class='alert alert-danger'><strong>Error !</strong> Password must be 8 digit long!!</div>";
            return $msg;
        }
        if (preg_match("/[^a-zA-Z0-9@#$%^&+=§!?]+/i", $password)) {
            $msg = "<div class='alert alert-danger'><strong>Error !</strong> Password must contain lowercase, uppercase, numeric, and @#$%^& !!</div>";
            return $msg;
        }
        
        //Email validation
        //=====================
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $msg = "<div class='alert alert-danger'><strong>Error !</strong> Please Enter Valid Email</div>";
            return $msg;
        }
        
        if ($emailchecker == true) {
            $msg = "<div class='alert alert-danger'><strong>Error !</strong> This email address already existl</div>";
            return $msg;
        }
        $password = md5($password);
        $sql      = "INSERT INTO tbl_user(name,username,email,password) VALUES (:name,:username,:email,:password)";
        $query    = $this->db->pdo->prepare($sql);
        $query->bindValue(':name', $name);
        $query->bindValue(':username', $username);
        $query->bindValue(':email', $email);
        $query->bindValue(':password', $password);
        $result = $query->execute();
        if ($result) {
            $msg = "<div class='alert alert-success'><strong>Success !</strong> Thank You. You have been Registerd</div>";
            return $msg;
        } else {
            $msg = "<div class='alert alert-danger'><strong>Error !</strong> Sorry, There has been problem inserting your data !</div>";
            return $msg;
        }
    }
    
    //Email Validation
    //=========================
    
    public function emailCheck($email) {
        $sql   = "SELECT email FROM tbl_user WHERE email = :email";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':email', $email);
        $query->execute();
        if ($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    
    
    public function getLoginUser($email, $password) {
        $sql   = "SELECT * FROM tbl_user WHERE email = :email AND password = :password LIMIT 1";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':email', $email);
        $query->bindValue(':password', $password);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
        
    }
    
    
    //User Login Mechanism
    //=====================
    public function userLogin($data) {
        $email           = $data['email'];
        $password        = ($data['password']);
        $logemailchecker = $this->emailCheck($email);
        
        if ($email == "" or $password == "") {
            $msg = "<div class='alert alert-danger'><strong>Error !</strong> Field must not Empty</div>";
            return $msg;
        }
        
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $msg = "<div class='alert alert-danger'><strong>Error !</strong> Please Enter Valid Email</div>";
            return $msg;
        }
        
        if ($logemailchecker == false) {
            $msg = "<div class='alert alert-danger'><strong>Error !</strong> Email or Password are wrong!</div>";
            return $msg;
        }
        
        
        //User data collect
        //==================
        $password = md5($password);
        $result   = $this->getLoginUser($email, $password);
        if ($result) {
            Session::init();
            Session::set("login", true);
            Session::set("id", $result->id);
            Session::set("name", $result->name);
            Session::set("username", $result->username);
            Session::set("loginmsg", "<div class='alert alert-success'><strong>Success !</strong> You're logged In</div>");
            echo "<script type='text/javascript'>window.top.location='index.php';</script>";
        } else {
            $msg = "<div class='alert alert-danger'><strong>Error !</strong> Data Not found</div>";
            return $msg;
        }
    }


    public function getUserData(){
        $sql   = "SELECT * FROM tbl_user ORDER BY id ASC";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }


    public function getUserById($id){
        $sql   = "SELECT * FROM tbl_user WHERE id = :id LIMIT 1";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':id', $id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }


    //User Info Update
    //=================

    public function userUpdate($id, $data){
        $name         = $data['name'];
        $username     = $data['username'];
        $email        = $data['email'];
        
        if ($name == "" or $username == "" or $email == "") {
            $msg = "<div class='alert alert-danger'><strong>Error !</strong> Field must not Empty</div>";
            return $msg;
        }
        if (strlen($username) < 4) {
            $msg = "<div class='alert alert-danger'><strong>Error !</strong> Username atlest 4 character</div>";
            return $msg;
        }
        if (preg_match('/[^a-zA-Z0-9_-]+/i', $username)) {
            $msg = "<div class='alert alert-danger'><strong>Error !</strong> Username must only contain [a-z] [0-9] dashes and Underscores !</div>";
            return $msg;
        }
        
        
        //Email validation
        //=====================
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $msg = "<div class='alert alert-danger'><strong>Error !</strong> Please Enter Valid Email</div>";
            return $msg;
        }
    
        
        $sql      = "UPDATE tbl_user SET name=:name,username=:username,email=:email WHERE id = :id";
        $query    = $this->db->pdo->prepare($sql);
        $query->bindValue(':name', $name);
        $query->bindValue(':username', $username);
        $query->bindValue(':email', $email);
        $query->bindValue(':id', $id);
        $result = $query->execute();
        if ($result) {
            $msg = "<div class='alert alert-success'><strong>Success !</strong> User Data updated successfully</div>";
            return $msg;
        } else {
            $msg = "<div class='alert alert-danger'><strong>Error !</strong> Sorry, user data not updated !</div>";
            return $msg;
        }
        
    }

    //Password Change
    //===============

    private function checkPassword($id,$oldpass){
        $password = md5($oldpass);
        $sql   = "SELECT password FROM tbl_user WHERE id =:id  AND password = :password ";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':id', $id);
        $query->bindValue(':password', $password);
        $query->execute();
        if ($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function passUpdate($id, $data){
        $oldpass = $data['oldpass'];
        $password = $data['password'];
        $checkpass = $this->checkPassword($id,$oldpass);

        if ($oldpass == "" or $password == "") {
            $msg = "<div class='alert alert-danger'><strong>Error !</strong> Field must not Empty</div>";
            return $msg;
        }

        if ($checkpass == false) {
            $msg = "<div class='alert alert-danger'><strong>Error !</strong> Old password doen't exist</div>";
            return $msg;
        }
        if (strlen($password) < 8) {
            $msg = "<div class='alert alert-danger'><strong>Error !</strong> Password must be 8 digit long!!</div>";
            return $msg;
        }
        if (preg_match("/[^a-zA-Z0-9@#$%^&+=§!?]+/i", $password)) {
            $msg = "<div class='alert alert-danger'><strong>Error !</strong> Password must contain lowercase, uppercase, numeric, and @#$%^& !!</div>";
            return $msg;
        }

        $password = md5($password);
        $sql      = "UPDATE tbl_user SET password=:password WHERE id = :id";
        $query    = $this->db->pdo->prepare($sql);
        $query->bindValue(':password', $password);
        $query->bindValue(':id', $id);
        $result = $query->execute();
        if ($result) {
            $msg = "<div class='alert alert-success'><strong>Success !</strong> Password updated successfully</div>";
            return $msg;
        } else {
            $msg = "<div class='alert alert-danger'><strong>Error !</strong> Sorry, Password not updated !</div>";
            return $msg;
        }
    
    }

}


?> 

