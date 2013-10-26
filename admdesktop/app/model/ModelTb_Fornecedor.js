/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.model.ModelTb_Fornecedor', {
    extend: 'Ext.data.Model',

    fields: [
		{
			name: 'for_codigo',								 
			type: 'int'
		},				
		{
			name: 'for_dsc',								 
			type: 'string'
		},				
		{
			name: 'for_comentario',								 
			type: 'string'
		},				
		{
			name: 'for_endereco',								 
			type: 'string'
		},				
		{
			name: 'for_tel',								 
			type: 'string'
		},				
		{
			name: 'for_cel',								 
			type: 'string'
		},				
		{
			name: 'for_email',								 
			type: 'string'
		},				
		{
			name: 'for_site',								 
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
			name: 'ativo',
			type: 'int'
		}				
    ]
});