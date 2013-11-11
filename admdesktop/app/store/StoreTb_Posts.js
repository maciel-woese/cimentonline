/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.store.StoreTb_Posts', {
    extend: 'Ext.data.Store',
    requires: [
        'ShSolutions.model.ModelTb_Posts'
    ],
	
    constructor: function(cfg) {
        var me = this;
        cfg = cfg || {};
        me.callParent([Ext.apply({
            storeId: 'StoreTb_Posts',
            model: 'ShSolutions.model.ModelTb_Posts',
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
	            url : 'server/modulos/tb_posts/list.php',
	            reader: {
	            	type: 'json',
	                root: 'dados'
	            }
            }
        }, cfg)]);
        
        
        me.on('beforeload', function(){
        	if(Ext.getCmp('GridTb_Posts')){
				Ext.getCmp('GridTb_Posts').getEl().mask('Aguarde Carregando Dados...');
			}	
  		});
  		
  		me.on('load', function(){
  			if(Ext.getCmp('GridTb_Posts')){
				Ext.getCmp('GridTb_Posts').getEl().unmask();
			}	
  		});
    }
});
