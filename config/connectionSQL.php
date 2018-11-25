<?php  
$dir  = str_replace('\\','/',$_SERVER['DOCUMENT_ROOT']."/Projetos/iCleanIt/");
$servername = "localhost";
$username = "root";
$password = null;
$database = "db_tcc";

$conn = mysqli_connect($servername, $username, $password,$database) or die("Erro na conexão");

if (!mysqli_set_charset($conn, "utf8")) {
    //printf("Error loading character set utf8: %s\n", mysqli_error($conn));
    exit();
} else {
    //printf("Current character set: %s\n", mysqli_character_set_name($conn));
}


?>