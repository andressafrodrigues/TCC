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
		include("../config/connectionSQL.php");
		$sql =  $conn->query("SELECT email, senha FROM tbpessoa WHERE email = '$email' AND senha = '$senha'");
		$rowCount = $sql->num_rows;
		 var_dump(mysqli_num_rows($sql));

		if ($rowCount > 0 ) {
			var_dump("oi");
			$user = mysqli_fetch_object($sql);
		}
	}
}
 ?>