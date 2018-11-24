
<?php
require_once('../config/connectionSql.php');
include ('../classes/pessoa.php');
$efetuarLogin = new Pessoa();

$email = $_POST['email'];
$senha = $_POST['password'];
if ($efetuarLogin->login($email, $senha)){
    echo true;
} else {
    echo 'Email ou senha inválidos';
}