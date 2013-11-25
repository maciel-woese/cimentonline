/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/


Ext.define('ShSolutions.view.config.List', {
    extend: 'ShSolutions.view.WindowBig',
	alias: 'widget.configlist',
    requires: [
    	'ShSolutions.store.StoreConfig'
    ],
	
    maximizable: true,
    minimizable: true,
    iconCls: 'config',

    id: 'List-Config',
    layout: {
        type: 'fit'
    },
    height: 350,
    title: 'Listagem de Config',

    initComponent: function() {
    	var me = this;
    	Ext.applyIf(me, {
    		items: [
    		    {
    		    	xtype: 'gridpanel',
    		    	id: 'GridConfig',
    		        store: 'StoreConfig',
					viewConfig: {
						autoScroll: true,
						loadMask: false
					},
					forceFit: true,
					columns: [
						{
							xtype: 'numbercolumn',
							dataIndex: 'id',
							hidden: true,
							format: '0',
							text: 'Id',
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'tipo',
							text: 'Tipo',
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'valor',
							text: 'Valor',
							width: 140
						}
					],
    	            dockedItems: [
						{
							xtype: 'pagingtoolbar',
							displayInfo: true,
							store: 'StoreConfig',
							dock: 'bottom'
						},
						{
							xtype: 'toolbar',
							dock: 'top',
							items: [
								{
									xtype: 'button',
									id: 'button_add_config',
									iconCls: 'bt_add',
									action: 'adicionar',
									text: 'Adicionar'
								},
								{
									xtype: 'button',
									id: 'button_edit_config',
									iconCls: 'bt_edit',
									action: 'editar',
									text: 'Editar'
								},
								{
									xtype: 'button',
									id: 'button_del_config',
									iconCls: 'bt_del',
									action: 'deletar',
									text: 'Deletar'
								}
							]
						}
					]
    		    }
    		]
    	});

    	me.callParent(arguments);
    }
});


