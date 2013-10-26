/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.view.tb_fornecedor.Filtro', {
    extend: 'ShSolutions.view.WindowMedium',
    alias: 'widget.filtertb_fornecedorwin',

    id: 'FilterTb_FornecedorWin',
    layout: {
        type: 'fit'
    },
    modal: true,
    minimizable: false,
	
    title: 'Filtro de Tb_Fornecedor',

    initComponent: function() {
        var me = this;

        Ext.applyIf(me, {
        	items: [
                {
                    xtype: 'form',
                    id: 'FormFilterTb_Fornecedor',
                    bodyPadding: 10,
                    autoScroll: true,
                    items: [
						{
							xtype: 'fieldcontainer',
							autoHeight: true,
							layout: {
								align: 'stretch',
								type: 'hbox'
							},
							items: [
								{
									xtype: 'textfield',
									name: 'for_dsc',									
								    margin: '0 5 0 0',								    
								    flex: 1,
									id: 'for_dsc_filter_tb_fornecedor',																											
									allowBlank: false,
									anchor: '100%',
									fieldLabel: 'Descrição'
								},								
								{
									xtype: 'textfield',
									name: 'for_comentario',								    								    
								    flex: 1,
									id: 'for_comentario_filter_tb_fornecedor',																											
									allowBlank: false,
									anchor: '100%',
									fieldLabel: 'Comentario'
								}								

							]
						},
						{
							xtype: 'fieldcontainer',
							autoHeight: true,
							layout: {
								align: 'stretch',
								type: 'hbox'
							},
							items: [
								{
									xtype: 'textfield',
									name: 'for_endereco',									
								    margin: '0 5 0 0',								    
								    flex: 1,
									id: 'for_endereco_filter_tb_fornecedor',																											
									allowBlank: false,
									anchor: '100%',
									fieldLabel: 'Endereço'
								},								
								{
									xtype: 'textfield',
									name: 'for_tel',								    								    
								    flex: 1,
									id: 'for_tel_filter_tb_fornecedor',							
									mask: '(99) 9999-9999',
									plugins: 'textmask',																											
									allowBlank: false,
									anchor: '100%',
									fieldLabel: 'Telefone'
								}								

							]
						},
						{
							xtype: 'fieldcontainer',
							autoHeight: true,
							layout: {
								align: 'stretch',
								type: 'hbox'
							},
							items: [
								{
									xtype: 'textfield',
									name: 'for_cel',									
								    margin: '0 5 0 0',								    
								    flex: 1,
									id: 'for_cel_filter_tb_fornecedor',							
									mask: '(99) 9999-9999',
									plugins: 'textmask',																											
									allowBlank: false,
									anchor: '100%',
									fieldLabel: 'Celular'
								},								
								{
									xtype: 'textfield',
									name: 'for_email',								    								    
								    flex: 1,
									id: 'for_email_filter_tb_fornecedor',																											
									allowBlank: false,
									anchor: '100%',
									fieldLabel: 'Email'
								}								

							]
						},
						{
							xtype: 'fieldcontainer',
							autoHeight: true,
							anchor: '50%',
							margins: '0 5 0 0',
							layout: {
								align: 'stretch',
								type: 'hbox'
							},
							items: [
								{
									xtype: 'textfield',
									name: 'for_site',								    								    
								    flex: 1,
									id: 'for_site_filter_tb_fornecedor',																											
									allowBlank: false,
									anchor: '100%',
									fieldLabel: 'Site'
								}								

							]
						},
						{
							xtype: 'hidden',
							name: 'action',
							hidden: true,
							id: 'action_filter_tb_fornecedor',
							allowBlank: false,
							value: 'FILTER',
							anchor: '100%'
						}
                    ]
                }
            ],
            dockedItems: [
                {
                    xtype: 'toolbar',
                    dock: 'bottom',
                    items: [
                        {
                            xtype: 'tbfill'
                        },
                        {
                            xtype: 'button',
                            iconCls: 'bt_cancel',
                            action: 'resetar_filtro',
                            text: 'Resetar Filtro'
                        },
                        {
                            xtype: 'button',
                            iconCls: 'bt_lupa',
                            action: 'filtrar_busca',
                            text: 'Filtrar'
                        }
                    ]
                }
            ]
        });

        me.callParent(arguments);
    }

});
