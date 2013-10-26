/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.model.ModelTb_Anunciante', {
    extend: 'Ext.data.Model',

    fields: [
		{
			name: 'anun_codigo',								 
			type: 'int'
		},				
		{
			name: 'anun_dsc',								 
			type: 'string'
		},				
		{
			name: 'anun_comentario',								 
			type: 'string'
		},				
		{
			name: 'anun_endereco',								 
			type: 'string'
		},				
		{
			name: 'anun_tel',								 
			type: 'string'
		},				
		{
			name: 'anun_cel',								 
			type: 'string'
		},				
		{
			name: 'anun_email',								 
			type: 'string'
		},				
		{
			name: 'anun_site',								 
			type: 'string'
		},				
		{
			name: 'est_dsc',								 
			type: 'string'
		},				
		{
			name: 'est_codigo',								 
			type: 'int'
		},				
		{
			name: 'cid_dsc',								 
			type: 'string'
		},				
		{
			name: 'cid_codigo',								 
			type: 'int'
		},				
		{
			name: 'anun_dt_cadastro_time',			
			dateFormat: 'H:i:s',					 
			type: 'date'
		},				
		{
			name: 'anun_dt_cadastro_date',			
			dateFormat: 'Y-m-d',					 
			type: 'date'
		},				
		{
			name: 'anun_dt_cadastro',			
			dateFormat: 'Y-m-d H:i:s',					 
			type: 'date'
		}				
    ]
});