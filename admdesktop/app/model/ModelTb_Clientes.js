/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.model.ModelTb_Clientes', {
    extend: 'Ext.data.Model',

    fields: [
		{
			name: 'cli_codigo',								 
			type: 'int'
		},				
		{
			name: 'cli_nome',								 
			type: 'string'
		},				
		{
			name: 'cli_nome_fan',								 
			type: 'string'
		},				
		{
			name: 'cli_email',								 
			type: 'string'
		},				
		{
			name: 'cli_tel',								 
			type: 'string'
		},				
		{
			name: 'cli_cel',								 
			type: 'string'
		},				
		{
			name: 'cli_cargo',								 
			type: 'string'
		},				
		{
			name: 'est_codigo',								 
			type: 'int'
		},				
		{
			name: 'cid_codigo',								 
			type: 'int'
		},				
		{
			name: 'cli_dt_cadastro_time',			
			dateFormat: 'H:i:s',					 
			type: 'date'
		},				
		{
			name: 'cli_dt_cadastro_date',			
			dateFormat: 'Y-m-d',					 
			type: 'date'
		},				
		{
			name: 'cli_dt_cadastro',			
			dateFormat: 'Y-m-d H:i:s',					 
			type: 'date'
		},				
		{
			name: 'ativo',
			type: 'int'
		}			
    ]
});