<?php
/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

if($_POST){
	require('../../autoLoad.php');
	$tabela = 'tb_paginas';
	try {
		
		if($_POST['action'] == 'EDITAR'){
		
			$user->getAcao($tabela, 'editar');
		
			$pdo = $connection->prepare("
					UPDATE tb_paginas SET 
							dsc_pagina = ?,							
							texto_pagina = ?							
 					WHERE cod_pagina = ?
			");
			$params = array(
				$_POST['dsc_pagina'],
				$_POST['texto_pagina'],
				$_POST['cod_pagina']
			);
			$pdo->execute($params);
		}
		else if ($_POST['action'] == 'INSERIR'){
		
			$user->getAcao($tabela, 'adicionar');
		
			$pdo = $connection->prepare("
				INSERT INTO tb_paginas 
					(
						dsc_pagina,						
						texto_pagina						
					) 
				VALUES 
					(
						?,	?			
					)
			");
			$params = array(
				$_POST['dsc_pagina'],		
				$_POST['texto_pagina']		
			);
			$pdo->execute($params);
		}
		else{
			throw new PDOException(utf8_encode(ACTION_NOT_FOUND));
		}
		echo json_encode(array('success'=>true, 'msg'=>SAVED_SUCCESS));
	}
	catch (PDOException $e) {
		echo json_encode(array('success'=>false, 'msg'=>ERROR_SAVE_DATA, 'erro'=>$e->getMessage()));
	}
}