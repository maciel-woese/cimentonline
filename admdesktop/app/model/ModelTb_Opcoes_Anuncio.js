/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.model.ModelTb_Opcoes_Anuncio', {
    extend: 'Ext.data.Model',

    fields: [
		{
			name: 'id',								 
			type: 'int'
		},				
		{
			name: 'anu_nome',								 
			type: 'string'
		},				
		{
			name: 'tipo_anucio_id',								 
			type: 'int'
		},				
		{
			name: 'valor',								 
			type: 'float'
		},				
		{
			name: 'periodo',								 
			type: 'int'
		}				
    ]
});