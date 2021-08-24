<?php

	session_start();

	//Variável que verifica se a autenticão foi realizada
	$usuario_autenticado = false;
	$usuario_id = null;
	$usuario_perfil_id = null;

	$perfis = array(1 => 'Administrativo', 2 => 'Usuario');

	

	//Usuários do sistema
	$Usuarios_app = array(
		array('id' => 1,'email' => 'adm@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
		array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
		array('id' => 3, 'email' => 'jose@teste.com.br', 'senha' => '1234', 'perfil_id' => 2),
		array('id' => 4, 'email' => 'maria@teste.com.br', 'senha' => '1234', 'perfil_id' => 2)
	);

	/*
	echo '<pre>';
	print_r($Usuarios_app);
	echo '<pre/>';
	*/

	//Autenticando Login recebendo parâmetro atraves do array global $_POST
	foreach ($Usuarios_app as $user) {

		if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
			$usuario_autenticado = true;
			$usuario_id = $user['id'];
			$usuario_perfil_id = $user['perfil_id'];
		}

	}

	if($usuario_autenticado) {
		echo 'Usuário autenticado';
		$_SESSION['autenticado'] = 'SIM';
		$_SESSION['id'] = $usuario_id;
		$_SESSION['perfil_id'] = $usuario_perfil_id;
		header('Location: home.php');

	} else {
		$_SESSION['autenticado'] = 'NAO';
		header('Location: index.php?login=erro');
	}

	/* ---- FORMAS DE RECEBER UM PARÂMETRO DE VALIDAÇÃO
	print_r($_GET);

	echo '<br/>';

	echo $_GET['email'];
	echo '<br/>';
	echo $_GET['senha'];

	print_r($_POST);

	echo '<br/>';

	echo $_POST['email'];
	echo '<br/>';
	echo $_POST['senha'];
	*/

?>