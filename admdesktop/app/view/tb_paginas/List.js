/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.view.tb_paginas.List', {
    extend: 'ShSolutions.view.WindowBig',
	alias: 'widget.tb_paginaslist',
    requires: [
    	'ShSolutions.store.StoreTb_Paginas'
    ],
	
    maximizable: true,
    minimizable: true,
    iconCls: 'tb_paginas',

    id: 'List-Tb_Paginas',
    layout: {
        type: 'fit'
    },
    height: 458,
    width: 829,
    border: false,
	modal: true,
    title: 'Listagem de Paginas',

    initComponent: function() {
    	var me = this;
    	Ext.applyIf(me, {
    		items: [
    		    {
    		    	xtype: 'gridpanel',
    		    	id: 'GridTb_Paginas',
    		        store: 'StoreTb_Paginas',
					viewConfig: {
						autoScroll: true,
						loadMask: false
					},
					forceFit: true,			
					columns: [
						{
							xtype: 'numbercolumn',
							dataIndex: 'cod_pagina',
							hidden: true,
							format: '0',
							text: 'Cód. Página',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'dsc_pagina',
							text: 'Desc. Página',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'texto_pagina',
							text: 'Texto Página',					
							width: 140
						}
                
					],
    	            dockedItems: [
						{
							xtype: 'pagingtoolbar',
							displayInfo: true,
							store: 'StoreTb_Paginas',
							dock: 'bottom'
						},
						{
							xtype: 'toolbar',
							dock: 'top',
							items: [
								{
									xtype: 'button',
									id: 'button_add_tb_paginas',
									iconCls: 'bt_add',									
									hidden: true,									
									action: 'adicionar',
									text: 'Adicionar'
								},
								{
									xtype: 'button',
									id: 'button_edit_tb_paginas',
									iconCls: 'bt_edit',									
									hidden: true,									
									action: 'editar',
									text: 'Editar'
								},
								{
									xtype: 'button',
									id: 'button_del_tb_paginas',
									iconCls: 'bt_del',									
									hidden: true,									
									action: 'deletar',
									text: 'Deletar'
								},
								{
									xtype: 'button',
									id: 'button_filter_tb_paginas',
									iconCls: 'bt_lupa',
									action: 'filtrar',
									text: 'Filtrar'
								},
								{
									xtype: 'button',
									id: 'button_pdf_tb_paginas',
									iconCls: 'bt_pdf',
									action: 'gerar_pdf',
									text: 'Gerar PDF'
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


