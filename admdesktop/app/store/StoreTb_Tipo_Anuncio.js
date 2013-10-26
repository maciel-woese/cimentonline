/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.store.StoreTb_Tipo_Anuncio', {
    extend: 'Ext.data.Store',
    requires: [
        'ShSolutions.model.ModelTb_Tipo_Anuncio'
    ],
	
    constructor: function(cfg) {
        var me = this;
        cfg = cfg || {};
        me.callParent([Ext.apply({
            storeId: 'StoreTb_Tipo_Anuncio',
            model: 'ShSolutions.model.ModelTb_Tipo_Anuncio',
            remoteSort: true,
            sorters: [
            	{
            		direction: 'ASC',
            		property: 'anu_codigo'
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
	            url : 'server/modulos/tb_tipo_anuncio/list.php',
	            reader: {
	            	type: 'json',
	                root: 'dados'
	            }
            }
        }, cfg)]);
        
        
        me.on('beforeload', function(){
        	if(Ext.getCmp('GridTb_Tipo_Anuncio')){
				Ext.getCmp('GridTb_Tipo_Anuncio').getEl().mask('Aguarde Carregando Dados...');
			}	
  		});
  		
  		me.on('load', function(){
  			if(Ext.getCmp('GridTb_Tipo_Anuncio')){
				Ext.getCmp('GridTb_Tipo_Anuncio').getEl().unmask();
			}	
  		});
    }
});
