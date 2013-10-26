/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.view.tb_tipo_anuncio.List', {
    extend: 'ShSolutions.view.WindowBig',
	alias: 'widget.tb_tipo_anunciolist',
    requires: [
    	'ShSolutions.store.StoreTb_Tipo_Anuncio'
    ],
	
    maximizable: true,
    minimizable: true,
    iconCls: 'tb_tipo_anuncio',

    id: 'List-Tb_Tipo_Anuncio',
    layout: {
        type: 'fit'
    },
    height: 350,
    title: 'Listagem de Tipo Anuncio',

    initComponent: function() {
    	var me = this;
    	Ext.applyIf(me, {
    		items: [
    		    {
    		    	xtype: 'gridpanel',
    		    	id: 'GridTb_Tipo_Anuncio',
    		        store: 'StoreTb_Tipo_Anuncio',
					viewConfig: {
						autoScroll: true,
						loadMask: false
					},
					forceFit: true,			
					columns: [
						{
							xtype: 'numbercolumn',
							dataIndex: 'anu_codigo',
							hidden: true,
							format: '0',
							text: 'Código',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'anu_nome',
							text: 'Nome',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'anu_tamanho',
							text: 'Tamanho',					
							width: 140
						}
                
					],
    	            dockedItems: [
						{
							xtype: 'pagingtoolbar',
							displayInfo: true,
							store: 'StoreTb_Tipo_Anuncio',
							dock: 'bottom'
						},
						{
							xtype: 'toolbar',
							dock: 'top',
							items: [
								{
									xtype: 'button',
									id: 'button_add_tb_tipo_anuncio',
									iconCls: 'bt_add',									
									hidden: true,									
									action: 'adicionar',
									text: 'Adicionar'
								},
								{
									xtype: 'button',
									id: 'button_edit_tb_tipo_anuncio',
									iconCls: 'bt_edit',									
									hidden: true,									
									action: 'editar',
									text: 'Editar'
								},
								{
									xtype: 'button',
									id: 'button_del_tb_tipo_anuncio',
									iconCls: 'bt_del',									
									hidden: true,									
									action: 'deletar',
									text: 'Deletar'
								},
								{
									xtype: 'button',
									id: 'button_add_opcoes_tb_tipo_anuncio',
									iconCls: 'bt_add',									
									hidden: true,									
									action: 'adicionar_opcoes',
									text: 'Opções do Anuncio'
								},
								{
									xtype: 'button',
									id: 'button_filter_tb_tipo_anuncio',
									iconCls: 'bt_lupa',
									action: 'filtrar',
									text: 'Filtrar'
								},
								{
									xtype: 'button',
									id: 'button_pdf_tb_tipo_anuncio',
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


