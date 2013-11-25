/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.model.ModelConfig', {
    extend: 'Ext.data.Model',

    fields: [
		{
			name: 'id',
			type: 'int'
		},
		{
			name: 'tipo',
			type: 'string'
		},
		{
			name: 'valor',
			type: 'string'
		}
    ]
});