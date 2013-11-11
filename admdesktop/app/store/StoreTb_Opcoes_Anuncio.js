/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.store.StoreTb_Opcoes_Anuncio', {
    extend: 'Ext.data.Store',
    requires: [
        'ShSolutions.model.ModelTb_Opcoes_Anuncio'
    ],
	
    constructor: function(cfg) {
        var me = this;
        cfg = cfg || {};
        me.callParent([Ext.apply({
            storeId: 'StoreTb_Opcoes_Anuncio',
            model: 'ShSolutions.model.ModelTb_Opcoes_Anuncio',
            remoteSort: true,
            sorters: [
            	{
            		direction: 'ASC',
            		property: 'id'
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
	            url : 'server/modulos/tb_opcoes_anuncio/list.php',
	            reader: {
	            	type: 'json',
	                root: 'dados'
	            }
            }
        }, cfg)]);
        
        
        me.on('beforeload', function(){
        	if(Ext.getCmp('GridTb_Opcoes_Anuncio')){
				Ext.getCmp('GridTb_Opcoes_Anuncio').getEl().mask('Aguarde Carregando Dados...');
			}	
  		});
  		
  		me.on('load', function(){
  			if(Ext.getCmp('GridTb_Opcoes_Anuncio')){
				Ext.getCmp('GridTb_Opcoes_Anuncio').getEl().unmask();
			}	
  		});
    }
});
