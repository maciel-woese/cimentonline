/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.view.tb_opcoes_anuncio.List', {
    extend: 'ShSolutions.view.WindowBig',
	alias: 'widget.tb_opcoes_anunciolist',
    requires: [
    	'ShSolutions.store.StoreTb_Opcoes_Anuncio'
    ],
	
    maximizable: true,
    minimizable: true,
    iconCls: 'tb_opcoes_anuncio',

    id: 'List-Tb_Opcoes_Anuncio',
    layout: {
        type: 'fit'
    },
    height: 350,
    title: 'Listagem de Opções do Anuncio',

    initComponent: function() {
    	var me = this;
    	Ext.applyIf(me, {
    		items: [
    		    {
    		    	xtype: 'gridpanel',
    		    	id: 'GridTb_Opcoes_Anuncio',
    		        store: 'StoreTb_Opcoes_Anuncio',
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
							dataIndex: 'anu_nome',
							text: 'Tipo Anucio',					
							width: 140
						},
						{
							xtype: 'numbercolumn',
							dataIndex: 'tipo_anucio_id',
							hidden: true,
							format: '0',
							text: 'Tipo Anucio',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'valor',
							renderer: Ext.util.Format.maskRenderer('R$ #9.999.990,00', true),
							text: 'Valor',					
							width: 140
						},
						{
							xtype: 'numbercolumn',
							dataIndex: 'periodo',
							format: '0',
							text: 'Periodo (Meses)',					
							width: 140
						}
                
					],
    	            dockedItems: [
						{
							xtype: 'pagingtoolbar',
							displayInfo: true,
							store: 'StoreTb_Opcoes_Anuncio',
							dock: 'bottom'
						},
						{
							xtype: 'toolbar',
							dock: 'top',
							items: [
								{
									xtype: 'button',
									id: 'button_add_tb_opcoes_anuncio',
									iconCls: 'bt_add',									
									hidden: true,									
									action: 'adicionar',
									text: 'Adicionar'
								},
								{
									xtype: 'button',
									id: 'button_edit_tb_opcoes_anuncio',
									iconCls: 'bt_edit',									
									hidden: true,									
									action: 'editar',
									text: 'Editar'
								},
								{
									xtype: 'button',
									id: 'button_del_tb_opcoes_anuncio',
									iconCls: 'bt_del',									
									hidden: true,									
									action: 'deletar',
									text: 'Deletar'
								},
								{
									xtype: 'button',
									id: 'button_filter_tb_opcoes_anuncio',
									iconCls: 'bt_lupa',
									action: 'filtrar',
									text: 'Filtrar'
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


