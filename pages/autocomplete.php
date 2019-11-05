<?php
$servidor = "rds.unifacex.com.br";
$usuario = "editais_nead";
$senha = "Edi!#T@iSn3eD!@#";
$dbname = "editais_ead";

//Criar a conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
$lista = [];
$query = "SELECT cpf FROM user";
$resultado = mysqli_query($conn, $query);
while ($row_resultado = mysqli_fetch_array($resultado, MYSQLI_ASSOC))
    echo("'".$row_resultado["cpf"]."',");