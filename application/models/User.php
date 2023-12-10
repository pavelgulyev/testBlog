<?php
namespace application\models;

use application\core\Model;
class User extends Model
{
    public $login;
    public $email;
    public $password;
    public function __construct($login='',$password='', $email='')
    {
        parent::__construct();
        $this->login=$login;
        $this->email=$email;
        $this->password=$password;
    }
    public function loginValidate() {
        $params = [
            'login' => $this->login,
            'password' => $this->password,
        ];
		$config = $this->db->row('SELECT * FROM user WHERE login = :login and password=:password', $params);
        if(empty($config))
        {
            return false;
        }else{
            return true;
        }

	}
    public function logout()
    {
        session_destroy();
    }
    public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }
    public function login($password)
    {
        $params = [
            'login' => $this->login
        ];
        $user = $this->db->row("SELECT * FROM user WHERE login = :login",$params);
        // $stmt->execute([$username]);
        // $user = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($user && password_verify($password, $user[0]['password_hash'])) {
            $_SESSION['user_id'] = $user[0]['id'];
            $_SESSION['login'] = $user[0]['login'];
            return true;
        }

        return false;
    }
    public function register()
    {
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
        $params = [
            'login' => $this->login,
            'password' => $hashedPassword,
            'email' => $this->email,
        ];
        $this->db->query("INSERT INTO user (email,login, password_hash) VALUES (:email, :login , :password)", $params);
        
        return true;
    }
}