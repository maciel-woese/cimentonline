/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.store.StoreTb_Paginas', {
    extend: 'Ext.data.Store',
    requires: [
        'ShSolutions.model.ModelTb_Paginas'
    ],
	
    constructor: function(cfg) {
        var me = this;
        cfg = cfg || {};
        me.callParent([Ext.apply({
            storeId: 'StoreTb_Paginas',
            model: 'ShSolutions.model.ModelTb_Paginas',
            remoteSort: true,
            sorters: [
            	{
            		direction: 'ASC',
            		property: 'cod_pagina'
            	}
            ],
   	        proxy: {
            	type: 'ajax',
				extraParams: {
					action: 'LIST'
				},
		    	actionMethods: {
			        create : 'POST',
			        read   : 'POST',
			        update : 'POST',
			        destroy: 'POST'
			    },	
	            url : 'server/modulos/tb_paginas/list.php',
	            reader: {
	            	type: 'json',
	                root: 'dados'
	            }
            }
        }, cfg)]);
        
        
        me.on('beforeload', function(){
        	if(Ext.getCmp('GridTb_Paginas')){
				Ext.getCmp('GridTb_Paginas').getEl().mask('Aguarde Carregando Dados...');
			}	
  		});
  		
  		me.on('load', function(){
  			if(Ext.getCmp('GridTb_Paginas')){
				Ext.getCmp('GridTb_Paginas').getEl().unmask();
			}	
  		});
    }
});
