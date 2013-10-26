/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.model.ModelTb_Tipo_Anuncio', {
    extend: 'Ext.data.Model',

    fields: [
		{
			name: 'anu_codigo',								 
			type: 'int'
		},				
		{
			name: 'anu_nome',								 
			type: 'string'
		},				
		{
			name: 'anu_tamanho',								 
			type: 'string'
		},				
		{
			name: 'anu_valor',								 
			type: 'float'
		}				
    ]
});