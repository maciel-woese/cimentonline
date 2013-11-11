/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.model.ModelTb_Posts', {
    extend: 'Ext.data.Model',

    fields: [
		{
			name: 'cod_pagina',								 
			type: 'int'
		},				
		{
			name: 'dsc_pagina',								 
			type: 'string'
		},				
		{
			name: 'texto_pagina',								 
			type: 'string'
		}				
    ]
});