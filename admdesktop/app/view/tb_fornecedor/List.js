/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.view.tb_fornecedor.List', {
    extend: 'ShSolutions.view.WindowBig',
	alias: 'widget.tb_fornecedorlist',
    requires: [
    	'ShSolutions.store.StoreTb_Fornecedor'
    ],
	
    maximizable: true,
    minimizable: true,
    iconCls: 'tb_fornecedor',

    id: 'List-Tb_Fornecedor',
    layout: {
        type: 'fit'
    },
    height: 350,
    title: 'Listagem de Fornecedor',

    initComponent: function() {
    	var me = this;
    	Ext.applyIf(me, {
    		items: [
    		    {
    		    	xtype: 'gridpanel',
    		    	id: 'GridTb_Fornecedor',
    		        store: 'StoreTb_Fornecedor',
					viewConfig: {
						autoScroll: true,
						loadMask: false,
						getRowClass: function(record, rowIndex, rowParams, store){
				            switch(record.get('ativo')) {
				                case 0:
				                    return 'desativado';
				                break
				                case 1:
				                    return '';
				                break                   
				            }
				        }
					},
								
					columns: [
						{
							xtype: 'numbercolumn',
							dataIndex: 'for_codigo',
							hidden: true,
							format: '0',
							text: 'Código',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'for_dsc',
							text: 'Descrição',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'for_comentario',
							text: 'Comentario',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'for_endereco',
							text: 'Endereço',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'for_tel',
							renderer : Ext.util.Format.maskRenderer('(99) 9999-9999'),
							text: 'Telefone',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'for_cel',
							renderer : Ext.util.Format.maskRenderer('(99) 9999-9999'),
							text: 'Celular',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'for_email',
							text: 'Email',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'for_site',
							text: 'Site',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'est_dsc',
							text: 'Est Codigo',					
							width: 140
						},
						{
							xtype: 'numbercolumn',
							dataIndex: 'est_codigo',
							hidden: true,
							format: '0',
							text: 'Est Codigo',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'cid_dsc',
							text: 'Cid Codigo',					
							width: 140
						},
						{
							xtype: 'numbercolumn',
							dataIndex: 'cid_codigo',
							hidden: true,
							format: '0',
							text: 'Cid Codigo',					
							width: 140
						}
                
					],
    	            dockedItems: [
						{
							xtype: 'pagingtoolbar',
							displayInfo: true,
							store: 'StoreTb_Fornecedor',
							dock: 'bottom'
						},
						{
							xtype: 'toolbar',
							dock: 'top',
							items: [
								/*{
									xtype: 'button',
									id: 'button_add_tb_fornecedor',
									iconCls: 'bt_add',									
									hidden: true,									
									action: 'adicionar',
									text: 'Adicionar'
								},*/
								{
									xtype: 'button',
									id: 'button_edit_tb_fornecedor',
									iconCls: 'bt_edit',									
									hidden: true,									
									action: 'editar',
									text: 'Editar'
								},
								{
									xtype: 'button',
									id: 'button_del_tb_fornecedor',
									iconCls: 'bt_del',									
									hidden: true,									
									action: 'deletar',
									text: 'Deletar'
								},
								{
									xtype: 'button',
									id: 'button_ativar_desativar_tb_fornecedor',
									iconCls: 'bt_acao',									
									hidden: true,									
									action: 'ativar_desativar',
									text: 'Ativar/Desativar'
								},
								{
									xtype: 'button',
									id: 'button_filter_tb_fornecedor',
									iconCls: 'bt_lupa',
									action: 'filtrar',
									text: 'Filtrar'
								},
								{
									xtype: 'button',
									id: 'button_pdf_tb_fornecedor',
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


