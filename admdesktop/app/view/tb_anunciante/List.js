/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.view.tb_anunciante.List', {
    extend: 'ShSolutions.view.WindowBig',
	alias: 'widget.tb_anunciantelist',
    requires: [
    	'ShSolutions.store.StoreTb_Anunciante'
    ],
	
    maximizable: true,
    minimizable: true,
    iconCls: 'tb_anunciante',

    id: 'List-Tb_Anunciante',
    layout: {
        type: 'fit'
    },
    height: 350,
    title: 'Listagem de Anunciante',

    initComponent: function() {
    	var me = this;
    	Ext.applyIf(me, {
    		items: [
    		    {
    		    	xtype: 'gridpanel',
    		    	id: 'GridTb_Anunciante',
    		        store: 'StoreTb_Anunciante',
					viewConfig: {
						autoScroll: true,
						loadMask: false
					},
								
					columns: [
						{
							xtype: 'numbercolumn',
							dataIndex: 'anun_codigo',
							hidden: true,
							format: '0',
							text: 'Código',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'anun_dsc',
							text: 'Descrição',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'anun_comentario',
							text: 'Comentario',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'anun_endereco',
							text: 'Endereço',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'anun_tel',
							renderer : Ext.util.Format.maskRenderer('(99) 9999-9999'),
							text: 'Telefone',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'anun_cel',
							renderer : Ext.util.Format.maskRenderer('(99) 9999-9999'),
							text: 'Celular',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'anun_email',
							text: 'Email',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'anun_site',
							text: 'Site',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'est_dsc',
							text: 'Estado',					
							width: 140
						},
						{
							xtype: 'numbercolumn',
							dataIndex: 'est_codigo',
							hidden: true,
							format: '0',
							text: 'Estado',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'cid_dsc',
							text: 'Cidade',					
							width: 140
						},
						{
							xtype: 'numbercolumn',
							dataIndex: 'cid_codigo',
							hidden: true,
							format: '0',
							text: 'Cidade',					
							width: 140
						},
						{
							xtype: 'datecolumn',
							dataIndex: 'anun_dt_cadastro',
							format: 'd/m/Y H:i:s',
							renderer : Ext.util.Format.dateRenderer('d/m/Y H:i:s'),
							text: 'Dt. Cadastro',					
							width: 140
						}
                
					],
    	            dockedItems: [
						{
							xtype: 'pagingtoolbar',
							displayInfo: true,
							store: 'StoreTb_Anunciante',
							dock: 'bottom'
						},
						{
							xtype: 'toolbar',
							dock: 'top',
							items: [
								{
									xtype: 'button',
									id: 'button_add_tb_anunciante',
									iconCls: 'bt_add',									
									hidden: true,									
									action: 'adicionar',
									text: 'Adicionar'
								},
								{
									xtype: 'button',
									id: 'button_edit_tb_anunciante',
									iconCls: 'bt_edit',									
									hidden: true,									
									action: 'editar',
									text: 'Editar'
								},
								{
									xtype: 'button',
									id: 'button_del_tb_anunciante',
									iconCls: 'bt_del',									
									hidden: true,									
									action: 'deletar',
									text: 'Deletar'
								},
								{
									xtype: 'button',
									id: 'button_filter_tb_anunciante',
									iconCls: 'bt_lupa',
									action: 'filtrar',
									text: 'Filtrar'
								},
								{
									xtype: 'button',
									id: 'button_pdf_tb_anunciante',
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


