<?php
//error_reporting(0);
date_default_timezone_set('America/Fortaleza');
include_once("phpmailer/class.phpmailer.php");

define('VM_FETCH_ARRAY' ,'array');
define('VM_FETCH_ASSOC' ,'assoc');
define('VM_FETCH_OBJECT','object');
define('VM_FETCH_ROW'   ,'row');

class db
{
	var $link;		#ponteiro de conexao com o servidor
	var $host;		#endere�o do servidor
	var $db;		#banco de dados a ser acessado dentro do servidor
	var $user;		#usu�rio do servidor
	var $password;	#senha do usu�rio do servidor

	/**
	 * Identificador (ponteiro) da ultima consulta realizada no banco de dados.
	* @access private
	*/
	var $_query_id;

	function envia_email($Msg,$Aplicacao) {
		//instancia a objetos
		$mail = new PHPMailer();
		$mail->SetLanguage("br", 'phpmailer/language/');
		// mandar via SMTP
		$mail->IsSMTP();
		// Seu servidor smtp
		$mail->Host = "smtp.shsolutions.com.br";
		// habilita smtp autenticado
		$mail->SMTPAuth = true;
		// usu�rio deste servidor smtp
		$mail->Username = "noreply@shsolutions.com.br";
		$mail->Password = "fsj@1500";
		//email utilizado para o envio
		//pode ser o mesmo de username
		$mail->From = "noreply@shsolutions.com.br";
		$mail->FromName = "LOG DE ERROS SQL";

		//Enderecos que devem ser enviadas as mensagens
		$mail->AddAddress("sousa.justa@gmail.com","Sousa Justa");

		//wrap seta o tamanhdo do texto por linha
		$mail->WordWrap = 50;
		//anexando arquivos no email
		//$mail->AddAttachment("anexo/arquivo.zip");
		//$mail->AddAttachment("imagem/foto.jpg");
		$mail->IsHTML(true); //enviar em HTML

		// recebendo os dados od formulario

		$nome     = ucwords("LOG DE ERROS SQL");
		$email 	  = "sousa.justa@gmail.com";
		$mensagem   = "Mensagem Automatica";
		// informando a quem devemos responder
		//ou seja para o mail inserido no formulario
		$mail->AddReplyTo("$email","$nome");
		//criando o codigo html para enviar no email
		//voce pode utilizar qualquer tag html ok
		$mail->Subject = "Aplica��o ".$Aplicacao;
		//adicionando o html no corpo do email
		$mail->Body = $Msg;

		//enviando e retornando o status de envio
		if(!$mail->Send())
		{
			echo "<P>houve um erro ao  enviar o email! </P>".$mail->ErrorInfo;
		}else{
			return "OK";
		}
	}

	# construtor inicializa as variaveis que utilizarao o banco
	function db($ind='0')
	{
		global $arhost, $ardb, $aruser, $arpass;

		$this->host     = $arhost[$ind];	#endere�o do servidor de banco de dados
		$this->db       = $ardb[$ind];		#banco de dados padrao
		$this->user     = $aruser[$ind];	#usu�rio para conexao
		$this->password = $arpass[$ind];	#senha de conexao do usu�rio
	}

	# segue as fun��es de conexao, sele��o de banco de dados, etc.
	function connect()
	{
		@$this->link = mysql_connect($this->host, $this->user, $this->password);
		if(!$this->link) {
			$mensagem="<html>
					<body>
						<div align=\"center\">
							<b>Banco de dados \"$this->db\" em \"". $_SERVER['SERVER_NAME'] ."\" fora do ar!!</b>
						</div>
					</body>
					</html>";

			$this->envia_email("Banco de dados fora do ar".$mensagem."Content-Type: text/html;\n","CimentOnline");
			return 0;
		} else {
			$this->select_db();
			return 1;
		}
	}

	# selecione o banco a ser utilizado
	function select_db()
	{
		if(@!mysql_select_db($this->db, $this->link)){
			$this->link=0;
			return 0;
		}

		return 1;
	}

	function pconnect()
	{
		@$this->link = mysql_pconnect($this->host, $this->user, $this->password);
		if(!$this->link) {
			$mensagem="<html>
					<body>
						<div align=\"center\">
							<b>Banco de dados \"$this->db\" fora do ar!!</b>
						</div>
					</body>
					</html>";

			$this->envia_email("Banco de dados fora do ar".$mensagem."Content-Type: text/html;\n","CimentOnline");
			return 0;
		} else {
			$this->select_db();
			return 1;
		}
	}

	function free_result($query_id = '')
	{
		$query_id = $this->_query_id != null ? $this->_query_id : $query_id;
		return mysql_free_result($query_id);
	}

	# fun��o que fecha a conex�o com o banco
	function close()
	{
		return mysql_close($this->link);
	}

	# fun��o que retorna a string de erro
	function error()
	{
		return mysql_error($this->link);
	}

	# fun��o que retorna o n�mero do erro
	function errno()
	{
		return mysql_errno($this->link);
	}

	function ultInsert()
	{
		return mysql_insert_id($this->link);
	}

	function Erro_info($sql){
		$msg =  '<ul style="-webkit-font-smoothing:antialiased;font:13px / 1.231 HelveticaNeue,helvetica,arial,clean,sans-serif;min-width:980px;color:#484848">
                <div style="border-radius:10px !important;-moz-border-radius:10px !important;background-color:#f7f7f7;border:1px solid #ebebeb !important;padding:0 15px 15px 10px !important;margin:0 20px 10px 0 !important; width:850px; display:block !important;">
                <div style="font-size:18px;">Data: '.date("d/m/Y H:m:s").'</div>
                <div style="color:#06C"><b>Erro na Query:</b> '.$sql.'</div>
                <div style="color:#F00"><b>Msg Erro:</b> '.mysql_error().'</div>
                <div style="color:#06C"><b>Numero do Erro:</b> '.mysql_errno().'</div>
                </div>
                </ul>';
				die($msg);
		//error_log($msg, 3, 'log/log.html');
		//$this->envia_email($msg,"CimentOnline");
	}

	/**
	 * M�todo que executa uma solicita��o no banco de dados.
	 *
	 * @todo Evitar o uso de mysql_db_query() pois � uma fun��o depreciada do PHP
	 * e pode ser descontinuada em futuras vers�es, al�m de ser bem mais lenta que
	 * a fun��o mysql_query().
	 */
	function query($string_query)
	{
		if($this->_query_id = mysql_query($string_query, $this->link))
		{
			return $this->_query_id;
		}
		else
		{
			$this->Erro_info($string_query);
			return false;
		}
	}


	/**
	 * Alternativa ao m�todo {@link db::query}, pois esta � lenta e utiliza recursos
	 * depreciados do PHP.
	 *
	 * @param string $sql String contendo a instru��o SQL a ser executada.
	 * @see db::query()
	 * @link http://www.php.net/mysql_db_query
	 */
	function vmQuery($sql)
	{
		$this->_query_id = mysql_query($sql,$this->link);
		return $this->_query_id ? $this->_query_id : false;
	}

	/*# fun��o que executa uma query num bco espec�fico
	 function db_query($string_query)
	{
	return mysql_db_query($this->db, $string_query, $this->link);
	}*/

	# fun��o que retorna o �ltimo id inserido
	function insert_id()
	{
		return mysql_insert_id($this->link);
	}

	/**
	 * M�todo que retorna um array associativo e indexado numericamente com os
	 * resultados referentes � consulta $querry_id, passada como par�metro
	 *
	 * @param resource $query_id Identificador (ponteiro) da consulta MySQL.
	 *        Opcional, caso n�o seja declarado, {@link db::$_query_id} � usado.
	 */
	function fetch_array($query_id = '')
	{
		$query_id = (!$query_id) ? $this->_query_id : $query_id;
		return mysql_fetch_array($query_id, MYSQL_ASSOC);
	}

	/**
	 * Retorna uma matriz numericamente indexada dos resutlados obtidos pela
	 * constula informada em $query_id.
	 *
	 * @param resource $query_id Identificador da consulta MySQL a ser usada.
	 *        Opcional, caso n�o seja declarado {@link db::$_query_id} ser� usado.
	 */
	function fetch_row($query_id = '')
	{
		$query_id = (!$query_id) ? $this->_query_id : $query_id;
		return mysql_fetch_row($query_id);
	}

	/**
	 * Retorna uma matriz com os resultados da consulta $query_id por�m com as
	 * informa��es sobre as colunas do resultado como atributos de objeto.
	 *
	 * @param $query_id
	 */
	function fetch_object($query_id = '')
	{
		//print mysql_error();
		$query_id = (!$query_id) ? $this->_query_id : $query_id;
		return mysql_fetch_object($query_id);
	}

	/**
	 * Retorna uma matriz associativa contendo os resultados da consulta indicada
	 * por $query_id.
	 *
	 * @param resource $query_id Identificador da consulta SQL a ser utilizada.
	 *        Opcional, caso n�o seja declarado {@link db::$_query_id} ser� utilizado.
	 */
	function fetch_assoc($query_id = '')
	{
		$query_id = (!$query_id) ? $this->_query_id : $query_id;
		return @mysql_fetch_assoc($query_id);
	}

	function fetch_field($result,$offset = 0)
	{
		$result = !$result ? $this->_query_id : $result;
		return mysql_fetch_field($result,$offset);
	}

	/**
	 * Retorna o n�mero de linhas de um resultado de uma consulta SQL.
	 *
	 * @param resource $query_id Identificador da consulta MySQL. Opcional, caso
	 *        n�o seja declarado, {@link db::$_query_id} ser� usado.
	 */
	function num_rows($query_id = '')
	{
		$query_id = (!$query_id) ? $this->_query_id : $query_id;
		return mysql_num_rows($query_id);
	}

	# fun��o que retorna um resultado espec�fico
	function result($result = '', $row = 0, $cols = 0)
	{
		$result = !$result ? $this->_query_id : $result;
		return mysql_result($result, $row, $cols);
	}

	# fun��o que retorna o n�mero de campos
	function num_fields($result = '')
	{
		$result = !$result ? $this->_query_id : $result;
		return mysql_num_fields($result);
	}

	# fun��o que retorna o n�mero de registros afetados
	function affected_rows()
	{
		return mysql_affected_rows($this->link);
	}

	# fun��o que retorna o nome de campo
	function field_name($result = '', $i = 0)
	{
		$result = !$result ? $this->_query_id : $result;
		return mysql_field_name($result, $i);
	}

	# fun��o que retorna o tamanho do campo
	function field_len($result = '', $i = 0)
	{
		$result = !$result ? $this->_query_id : $result;
		return mysql_field_len($result, $i);
	}

	# fun��o que retorna o tipo de campo
	function field_type($result = '', $i = 0)
	{
		$result = !$result ? $this->_query_id : $result;
		return mysql_field_type($result, $i);
	}

	function list_fields($table)
	{
		if(!is_string($table)) return;
		return mysql_list_fields($this->db,$table,$this->link);
	}

	# inicia uma transa��o ( somente para tipos de tabela com suporte :: innoDB )
	function start_transaction()
	{
		mysql_query("START TRANSACTION");
	}

	# libera a execu��o das querys ( somente para tipos de tabela com suporte :: innoDB )
	function commit()
	{
		mysql_query("COMMIT");
	}

	# "esquece" as querys ( somente para tipos de tabela com suporte :: innoDB )
	function rollback()
	{
		mysql_query("ROLLBACK");
	}

	/* M�todos de automatiza��o de tarefas simples */
	/**
	 * "Escapa" uma instru��o para inser��o segura de dados no banco.
	 *
	 * @param string $instruction
	 */
	function escape($instruction)
	{
		if(is_numeric($instruction))
		{
			$instruction = $instruction;
		}
		else
		{
			// Desfaz o efeito de magic_quotes.
			if(get_magic_quotes_gpc())
			$instruction = stripslashes($instruction);

			// Adiciona aspas para inser��o segura com o texto j� escapado.
			$instruction = "'".mysql_real_escape_string($instruction,$this->link)."'";
		}
		return $instruction;
	}

	/**
	 * Executa e retorna o resultado de uma query $sql (usualmente SELECT ou
	 * qualquer instru��o que retorne um resultado v�lido) de acordo com o tipo
	 * de retorno definido em $result_type.
	 *
	 * @param string $sql
	 * @param string $result_type
	 */
	function queryAndFetch($sql,$result_type = null,$dump = false)
	{
		if($dump) vm_dump($dump,'');
		$query = $this->vmQuery($sql);
		switch($result_type)
		{
			default:
			case VM_FETCH_ARRAY:
				$fetch_method = 'fetch_array';
			break;

			case VM_FETCH_ASSOC:
				$fetch_method = 'fetch_assoc';
				break;

			case VM_FETCH_OBJECT:
				$fetch_method = 'fetch_object';
				break;

			case VM_FETCH_ROW:
				$fetch_method = 'fetch_row';
				break;
		}

		//Array de resultados a ser retornado
		$result = array();
		while($res =  $this->$fetch_method($query))
		{
			$result[] = $res;
		}
		return $result;
	}

	/**
	 * Mapeia a tabela indicada por $table, retornando suas colunas em uma matriz
	 * associativa.
	 */
	function mapTable($table)
	{
		if(!is_string($table))
		return false;

		$map = array();
		$res = $this->list_fields($table);
		$x = 0;
		while($field = $this->fetch_field($res,$x))
		{
			$map[$field->name] = null;
			$x++;
		}

		return $map;
	}


}
?>