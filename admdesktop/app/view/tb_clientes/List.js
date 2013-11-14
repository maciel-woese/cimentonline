/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.view.tb_clientes.List', {
    extend: 'ShSolutions.view.WindowBig',
	alias: 'widget.tb_clienteslist',
    requires: [
    	'ShSolutions.store.StoreTb_Clientes'
    ],
	
    maximizable: true,
    minimizable: true,
    iconCls: 'tb_clientes',

    id: 'List-Tb_Clientes',
    layout: {
        type: 'fit'
    },
    height: 350,
    title: 'Listagem de Clientes',

    initComponent: function() {
    	var me = this;
    	Ext.applyIf(me, {
    		items: [
    		    {
    		    	xtype: 'gridpanel',
    		    	id: 'GridTb_Clientes',
    		        store: 'StoreTb_Clientes',
					viewConfig: {
						autoScroll: true,
						loadMask: false,
						getRowClass: function(record, rowIndex, rowParams, store){
				            console.info(record.get('ativo'));
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
							dataIndex: 'cli_codigo',
							hidden: true,
							format: '0',
							text: 'Código',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'cli_nome',
							text: 'Nome',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'cli_nome_fan',
							text: 'Nome Fantasia',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'cli_email',
							text: 'Email',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'cli_tel',
							renderer : Ext.util.Format.maskRenderer('(99) 9999-9999'),
							text: 'Telefone',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'cli_cel',
							renderer : Ext.util.Format.maskRenderer('(99) 9999-9999'),
							text: 'Celular',					
							width: 140
						},
						{
							xtype: 'gridcolumn',
							dataIndex: 'cli_cargo',
							text: 'Cargo',					
							width: 140
						},
						{
							xtype: 'numbercolumn',
							dataIndex: 'est_codigo',
							format: '0',
							text: 'Estado',					
							width: 140
						},
						{
							xtype: 'numbercolumn',
							dataIndex: 'cid_codigo',
							format: '0',
							text: 'Cidade',					
							width: 140
						},
						{
							xtype: 'datecolumn',
							dataIndex: 'cli_dt_cadastro',
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
							store: 'StoreTb_Clientes',
							dock: 'bottom'
						},
						{
							xtype: 'toolbar',
							dock: 'top',
							items: [
								{
									xtype: 'button',
									id: 'button_add_tb_clientes',
									iconCls: 'bt_add',									
									hidden: true,									
									action: 'adicionar',
									text: 'Adicionar'
								},
								{
									xtype: 'button',
									id: 'button_edit_tb_clientes',
									iconCls: 'bt_edit',									
									hidden: true,									
									action: 'editar',
									text: 'Editar'
								},
								{
									xtype: 'button',
									id: 'button_del_tb_clientes',
									iconCls: 'bt_del',									
									hidden: true,									
									action: 'deletar',
									text: 'Deletar'
								},
								{
									xtype: 'button',
									id: 'button_ativar_desativar_tb_clientes',
									iconCls: 'bt_acao',									
									hidden: true,									
									action: 'ativar_desativar',
									text: 'Ativar/Desativar'
								},
								{
									xtype: 'button',
									id: 'button_filter_tb_clientes',
									iconCls: 'bt_lupa',
									action: 'filtrar',
									text: 'Filtrar'
								},
								{
									xtype: 'button',
									id: 'button_pdf_tb_clientes',
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


