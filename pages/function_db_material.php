<?php
$servidor = "rds.unifacex.com.br";
$usuario = "editais_nead";
$senha = "Edi!#T@iSn3eD!@#";
$dbname = "editais_ead";
	
//Criar a conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

function retorna($cpf, $conn){
	$result = "SELECT name,nationality,profession,civilStatus, cep, number, street,neighborhood,city,state, compl,rg FROM user LEFT JOIN user_info ON user_info.user_id = user.id  WHERE cpf = '$cpf' LIMIT 1";
    $resultado = mysqli_query($conn, $result);

	if($resultado->num_rows){
		$row_resultado = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
        $valores['nome'] = utf8_encode($row_resultado['name']);
        $valores['rg'] = utf8_encode($row_resultado['rg']);
        $valores['nacionalidade'] = utf8_encode($row_resultado['nationality']);
        $valores['profissao'] = utf8_encode($row_resultado['profession']);
        $valores['est_civ'] = utf8_encode($row_resultado['civilStatus']);
        $valores['rua'] = utf8_encode($row_resultado['street']);
        $valores['numero'] = utf8_encode($row_resultado['number']);
        $valores['rua'] = utf8_encode($row_resultado['street']);
        $valores['bairro'] = utf8_encode($row_resultado['neighborhood']);
        $valores['cidade'] = utf8_encode($row_resultado['city']);
        $valores['estado'] = utf8_encode($row_resultado['state']);
        $valores['complemento'] = utf8_encode($row_resultado['compl']);
        $valores['cep'] = utf8_encode($row_resultado['cep']);
	}else{
        $valores['flag'] = 1;
	}
	return json_encode($valores);
}

if(isset($_GET['cpf'])){
	echo retorna($_GET['cpf'], $conn);
}
?>