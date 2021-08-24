<?php 
	
	session_start();

	//remover indices do array de sessao
	//unset EX: unset($_SESSION['autenticado']); // remove apenas se existir e nao da erro

	//destruit a varievel de sessao SESSION
	//session_destroy() // apos a sessao ser excluida forcar um redirecionamento

	session_destroy();
	header('Location: index.php'); 

?>