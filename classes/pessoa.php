<?php  
/**
 * 
 */
class Pessoa
{
	public $email;
	public $senha;

	public function login($email, $senha) 
	{
		$return = false;
		include("../config/connectionSQL.php");
		$sql =  $conn->query("SELECT email, senha FROM tbpessoa WHERE email = '$email' AND senha = '$senha'");
		$rowCount = $sql->num_rows;

		if ($rowCount > 0 ) {
			$user = mysqli_fetch_object($sql);
			$return = true;
		}

		return $return;
	}
}
 ?>