<?php
// If there is no constant defined called __CONFIG__, do not load this file 
if (!defined('__CONFIG__')) {
	exit('You do not have a config file');
}

class User
{
	private $con;
	public $user_id;
	public $email;
	public $date;

	public function __construct(int $user_id)
	{
		//Setting the connection
		$this->con = DB::getConnection();

		//Making sure the user id is an integer
		$user_id = Filter::Int($user_id);

		//Extracting the user using the user id
		$user = $this->con->prepare("SELECT user_id, email, date FROM logintable WHERE user_id = :user_id LIMIT 1");
		$user->bindParam(':user_id', $user_id, PDO::PARAM_INT);
		$user->execute();

		//If the user exists
		if ($user->rowCount() == 1) {
			//Fetch the data of the selected user
			$user = $user->fetch(PDO::FETCH_OBJ);

			$this->user_id = (int)$user->user_id;
			$this->email = (string)$user->email;
			$this->date = (string)$user->date;
		} else {
			//Log out
			header[' Location : logout.php'];
			exit;
		}

	}
	public static function find($email, $returnAssoc = false)
	{
		$con = DB::getConnection();
		$email = (string)Filter::String($email);
		//Make sure the user does not array_key_exists
		$findUser = $con->prepare("SELECT user_id, password FROM logintable WHERE email = LOWER(:email) LIMIT 1");
		$findUser->bindParam(':email', $email, PDO::PARAM_STR);
		$findUser->execute();

		if ($returnAssoc) {
			return $findUser->fetch(PDO::FETCH_ASSOC);
		}
		$userFound = (boolean)$findUser->rowCount();

		return $userFound;
	}

}

?>
