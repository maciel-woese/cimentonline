<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );

	$con = mysql_connect( 'localhost', 'root', '' ) ;
	mysql_select_db( 'cimentoline', $con );

	$cod_estados = mysql_real_escape_string( $_REQUEST['cod_estados'] );

	$cidades = array();

	$sql = "SELECT cid_codigo, cid_dsc
			FROM tb_cidade
			WHERE cod_estado = $cod_estados
			ORDER BY cid_dsc";
	$res = mysql_query( $sql );
	while ( $row = mysql_fetch_assoc( $res ) ) {
		$cidades[] = array(
			'cid_codigo'	=> $row['cid_codigo'],
			'cid_dsc'			=> $row['cid_dsc'],
		);
	}

	echo( json_encode( $cidades ) );