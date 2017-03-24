<?php
namespace Core\Auth;
use Core\Database;
/**
* Class Auth pour la connexion au site via DB
*/
class DBAuth
{
	protected $db;
	function __contruct(Database $db){
		$this->db =$db;
	}

	public function login($username, $password)
	{
		$user = $this->db->prepare("SELECT * 
									FROM users 
									WHERE name = ?",
									[$usernane], null, true);
		if ($user) {
			if ($user->password === sha1($password)) {
				$_SESSION['Auth'] = $user->id;
				return true;
			}
		}
		return false;
	}
	public function logged()
	{
		return isset($_SESSION['Auth']);
	}
}
?>