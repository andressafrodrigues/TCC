<?php
	include("config/connectionSQL.php");

	$selectDadosUltimaExec	=	"select * from tbconfigdir;";
	$conSelect 				= 	$conn->query($selectDadosUltimaExec);
	$dirA					=	"";
	while($row = $conSelect->fetch_array(MYSQLI_ASSOC)){
		$dirA 	= 	$row["diretorio"];
	}
	if ($dirA == ""){
		$query = $db->query("replace into tbconfigdir (diretorio) values ('".$dir."');");
		if ($query){}
	}
	$diretorioRoot = $dirA;
	$_SESSION["rooter"] = $diretorioRoot;
?>