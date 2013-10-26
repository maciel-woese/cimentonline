/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.store.StoreTb_Clientes', {
    extend: 'Ext.data.Store',
    requires: [
        'ShSolutions.model.ModelTb_Clientes'
    ],
	
    constructor: function(cfg) {
        var me = this;
        cfg = cfg || {};
        me.callParent([Ext.apply({
            storeId: 'StoreTb_Clientes',
            model: 'ShSolutions.model.ModelTb_Clientes',
            remoteSort: true,
            sorters: [
            	{
            		direction: 'ASC',
            		property: 'cli_codigo'
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
	            url : 'server/modulos/tb_clientes/list.php',
	            reader: {
	            	type: 'json',
	                root: 'dados'
	            }
            }
        }, cfg)]);
        
        
        me.on('beforeload', function(){
        	if(Ext.getCmp('GridTb_Clientes')){
				Ext.getCmp('GridTb_Clientes').getEl().mask('Aguarde Carregando Dados...');
			}	
  		});
  		
  		me.on('load', function(){
  			if(Ext.getCmp('GridTb_Clientes')){
				Ext.getCmp('GridTb_Clientes').getEl().unmask();
			}	
  		});
    }
});
