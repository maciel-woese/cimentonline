/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.store.StoreTb_Fornecedor', {
    extend: 'Ext.data.Store',
    requires: [
        'ShSolutions.model.ModelTb_Fornecedor'
    ],
	
    constructor: function(cfg) {
        var me = this;
        cfg = cfg || {};
        me.callParent([Ext.apply({
            storeId: 'StoreTb_Fornecedor',
            model: 'ShSolutions.model.ModelTb_Fornecedor',
            remoteSort: true,
            sorters: [
            	{
            		direction: 'ASC',
            		property: 'cid_codigo'
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
	            url : 'server/modulos/tb_fornecedor/list.php',
	            reader: {
	            	type: 'json',
	                root: 'dados'
	            }
            }
        }, cfg)]);
        
        
        me.on('beforeload', function(){
        	if(Ext.getCmp('GridTb_Fornecedor')){
				Ext.getCmp('GridTb_Fornecedor').getEl().mask('Aguarde Carregando Dados...');
			}	
  		});
  		
  		me.on('load', function(){
  			if(Ext.getCmp('GridTb_Fornecedor')){
				Ext.getCmp('GridTb_Fornecedor').getEl().unmask();
			}	
  		});
    }
});
