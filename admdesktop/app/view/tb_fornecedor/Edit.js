/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.view.tb_fornecedor.Edit', {
    extend: 'ShSolutions.view.WindowMedium',
	alias: 'widget.addtb_fornecedorwin',

    id: 'AddTb_FornecedorWin',
    layout: {
        type: 'fit'
    },
	maximizable: false,
    minimizable: true,
    title: 'Cadastro de Fornecedor',

    initComponent: function() {
        var me = this;


        Ext.applyIf(me, {
            items: [
                {
                    xtype: 'form',
                    id: 'FormTb_Fornecedor',
                    bodyPadding: 10,
                    autoScroll: true,
                    method: 'POST',
                    url : 'server/modulos/tb_fornecedor/save.php',
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
									id: 'for_dsc_tb_fornecedor',
									anchor: '100%',									
									fieldLabel: 'Descrição'									
								},								
								{
									xtype: 'textfield',
									name: 'for_comentario',								    								    
								    flex: 1,
									id: 'for_comentario_tb_fornecedor',
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
									id: 'for_endereco_tb_fornecedor',
									anchor: '100%',									
									fieldLabel: 'Endereço'									
								},								
								{
									xtype: 'textfield',
									name: 'for_tel',								    								    
								    flex: 1,
									id: 'for_tel_tb_fornecedor',
									anchor: '100%',							
									mask: '(99) 9999-9999',
									plugins: 'textmask',									
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
									id: 'for_cel_tb_fornecedor',
									anchor: '100%',							
									mask: '(99) 9999-9999',
									plugins: 'textmask',									
									fieldLabel: 'Celular'									
								},								
								{
									xtype: 'textfield',
									name: 'for_email',								    								    
								    flex: 1,
									id: 'for_email_tb_fornecedor',
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
									id: 'for_site_tb_fornecedor',
									anchor: '100%',									
									fieldLabel: 'Site'									
								}								

							]
						},
						{
							xtype: 'hidden',
							name: 'for_codigo',
							hidden: true,
							id: 'for_codigo_tb_fornecedor',
							value: 0,
							anchor: '100%'
						},
						{
							xtype: 'hidden',
							name: 'action',
							hidden: true,
							id: 'action_tb_fornecedor',
							value: 'INSERIR',
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
                            xtype: 'tbseparator'
                        },
                        {
                            xtype: 'button',
                            id: 'button_resetar_tb_fornecedor',
                            iconCls: 'bt_cancel',
                            action: 'resetar',
                            text: 'Resetar'
                        },
                        {
                            xtype: 'button',
                            id: 'button_salvar_tb_fornecedor',
                            iconCls: 'bt_save',
                            action: 'salvar',
                            text: 'Salvar'
                        }
                    ]
                }
            ]
        });

        me.callParent(arguments);

    }

});
