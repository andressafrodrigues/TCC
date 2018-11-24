<?php
require('../config/connectionSql.php');
include ('../classes/pessoa.php');
$efetuarLogin = new Pessoa();
$retorno = false;
$email = $_POST['email'];
$senha = $_POST['password'];
if ($efetuarLogin->login($email, $senha)){
	$retorno = true;
}
echo $retorno; 
