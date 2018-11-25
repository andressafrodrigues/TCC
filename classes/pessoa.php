<?php  
/**
 * 
 */
class Pessoa
{
	public $idPessoa;
	public $nomePessoa;
	public $sobrenomePessoa;
	public $cep;
	public $rua;
	public $numero;
	public $descricao;
	public $cidade;
	public $bairro;
	public $uf;
	public $autonomo;
	public $celular;
	public $email;
	public $senha;

	public function login($email, $senha) 
	{
		$return = false;
		include("../../config/connectionSQL.php");
		$sql =  $conn->query("SELECT  senha FROM tbpessoa WHERE email = '$email' AND senha = '$senha'");
		$rowCount = $sql->num_rows;
		if ($rowCount > 0 ) {
			$user = mysqli_fetch_object($sql);
			$return = true;
		}
		return $return;
	}

	public function cadastrarPessoa($classe) 
	{
		$nomePessoa      = $classe->nomePessoa;
		$sobrenomePessoa = $classe->sobrenomePessoa;
		$cep             = $classe->cep;
		$rua             = $classe->rua;
		$numero          = $classe->numero;
		$descricao       = $classe->descricao;
		$cidade          = $classe->cidade;
	    $bairro          = $classe->bairro;
	    $uf              = $classe->uf;
	    $autonomo        = $classe->autonomo;
	    $celular         = $classe->celular;
	    $email           = $classe->email;
	    $senha           = $classe->senha;

	    include("../../config/connectionSQL.php");

		$sql = "INSERT INTO tbpessoa (nome, sobrenome, cep, rua, numero, descricao, cidade, bairro, uf, autonomo, celular, email, senha) VALUES ('$nomePessoa', '$sobrenomePessoa', '$cep', '$rua', '$numero', '$descricao', '$cidade', '$bairro', '$uf', '$autonomo', '$celular', '$email', '$senha');";
 
		if ($conn->query($sql)) {
			$return = true;
		} else {
			var_dump(sprintf("Errormessage: %s\n", $mysqli->error));
			$return = false;
		}

		var_dump($sql);
		return $return;
	}
}
 ?>