/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.view.tb_anunciante.Edit', {
    extend: 'ShSolutions.view.WindowMedium',
	alias: 'widget.addtb_anunciantewin',

    id: 'AddTb_AnuncianteWin',
    layout: {
        type: 'fit'
    },
	maximizable: false,
    minimizable: true,
    title: 'Cadastro de Anunciante',

    initComponent: function() {
        var me = this;


        Ext.applyIf(me, {
            items: [
                {
                    xtype: 'form',
                    id: 'FormTb_Anunciante',
                    bodyPadding: 10,
                    autoScroll: true,
                    method: 'POST',
                    url : 'server/modulos/tb_anunciante/save.php',
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
									name: 'anun_dsc',									
								    margin: '0 5 0 0',								    
								    flex: 1,
									id: 'anun_dsc_tb_anunciante',
									anchor: '100%',									
									fieldLabel: 'Descrição'									
								},								
								{
									xtype: 'textfield',
									name: 'anun_comentario',								    								    
								    flex: 1,
									id: 'anun_comentario_tb_anunciante',
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
									name: 'anun_endereco',									
								    margin: '0 5 0 0',								    
								    flex: 1,
									id: 'anun_endereco_tb_anunciante',
									anchor: '100%',									
									fieldLabel: 'Endereço'									
								},								
								{
									xtype: 'textfield',
									name: 'anun_tel',								    								    
								    flex: 1,
									id: 'anun_tel_tb_anunciante',
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
									name: 'anun_cel',									
								    margin: '0 5 0 0',								    
								    flex: 1,
									id: 'anun_cel_tb_anunciante',
									anchor: '100%',							
									mask: '(99) 9999-9999',
									plugins: 'textmask',									
									fieldLabel: 'Celular'									
								},								
								{
									xtype: 'textfield',
									name: 'anun_email',								    								    
								    flex: 1,
									id: 'anun_email_tb_anunciante',
									anchor: '100%',									
									fieldLabel: 'Email'									
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
									name: 'anun_site',									
								    margin: '0 5 0 0',								    
								    flex: 1,
									id: 'anun_site_tb_anunciante',
									anchor: '100%',									
									fieldLabel: 'Site'									
								},								
								{
									xtype: 'fieldcontainer',
									anchor: '100%',
									layout: {
										align: 'stretch',
										type: 'hbox'
									},																		
									flex: 1,
									labelAlign: 'top',
									labelStyle: 'font-weight: bold;font-size: 11px;',			    
									fieldLabel: 'Dt. Cadastro',
									items: [
										{
											xtype: 'datefield',
											format: 'd/m/Y',
											flex: 1,
											id: 'anun_dt_cadastro_date_tb_anunciante',
											name: 'anun_dt_cadastro_date',
											margins: '0 5 0 0',											hideLabel: true
										},
										{
											xtype: 'textfield',
											mask: '99:99:99',
											plugins: 'textmask',
											returnWithMask: true,
											flex: 1,
											id: 'anun_dt_cadastro_time_tb_anunciante',
											name: 'anun_dt_cadastro_time',											hideLabel: true
										}
									]
								}								

							]
						},
						{
							xtype: 'hidden',
							name: 'cid_codigo',
							hidden: true,
							id: 'cid_codigo_tb_anunciante',
							value: 0,
							anchor: '100%'
						},
						{
							xtype: 'hidden',
							name: 'action',
							hidden: true,
							id: 'action_tb_anunciante',
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
                            id: 'button_resetar_tb_anunciante',
                            iconCls: 'bt_cancel',
                            action: 'resetar',
                            text: 'Resetar'
                        },
                        {
                            xtype: 'button',
                            id: 'button_salvar_tb_anunciante',
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
