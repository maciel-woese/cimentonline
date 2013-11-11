/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.store.StoreTb_Anunciante', {
    extend: 'Ext.data.Store',
    requires: [
        'ShSolutions.model.ModelTb_Anunciante'
    ],
	
    constructor: function(cfg) {
        var me = this;
        cfg = cfg || {};
        me.callParent([Ext.apply({
            storeId: 'StoreTb_Anunciante',
            model: 'ShSolutions.model.ModelTb_Anunciante',
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
	            url : 'server/modulos/tb_anunciante/list.php',
	            reader: {
	            	type: 'json',
	                root: 'dados'
	            }
            }
        }, cfg)]);
        
        
        me.on('beforeload', function(){
        	if(Ext.getCmp('GridTb_Anunciante')){
				Ext.getCmp('GridTb_Anunciante').getEl().mask('Aguarde Carregando Dados...');
			}	
  		});
  		
  		me.on('load', function(){
  			if(Ext.getCmp('GridTb_Anunciante')){
				Ext.getCmp('GridTb_Anunciante').getEl().unmask();
			}	
  		});
    }
});
