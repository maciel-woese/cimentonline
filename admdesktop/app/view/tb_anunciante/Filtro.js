/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.view.tb_anunciante.Filtro', {
    extend: 'ShSolutions.view.WindowMedium',
    alias: 'widget.filtertb_anunciantewin',

    id: 'FilterTb_AnuncianteWin',
    layout: {
        type: 'fit'
    },
    modal: true,
    minimizable: false,
	
    title: 'Filtro de Tb_Anunciante',

    initComponent: function() {
        var me = this;

        Ext.applyIf(me, {
        	items: [
                {
                    xtype: 'form',
                    id: 'FormFilterTb_Anunciante',
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
									name: 'anun_dsc',									
								    margin: '0 5 0 0',								    
								    flex: 1,
									id: 'anun_dsc_filter_tb_anunciante',																											
									allowBlank: false,
									anchor: '100%',
									fieldLabel: 'Descrição'
								},								
								{
									xtype: 'textfield',
									name: 'anun_comentario',								    								    
								    flex: 1,
									id: 'anun_comentario_filter_tb_anunciante',																											
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
									name: 'anun_endereco',									
								    margin: '0 5 0 0',								    
								    flex: 1,
									id: 'anun_endereco_filter_tb_anunciante',																											
									allowBlank: false,
									anchor: '100%',
									fieldLabel: 'Endereço'
								},								
								{
									xtype: 'textfield',
									name: 'anun_tel',								    								    
								    flex: 1,
									id: 'anun_tel_filter_tb_anunciante',							
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
									name: 'anun_cel',									
								    margin: '0 5 0 0',								    
								    flex: 1,
									id: 'anun_cel_filter_tb_anunciante',							
									mask: '(99) 9999-9999',
									plugins: 'textmask',																											
									allowBlank: false,
									anchor: '100%',
									fieldLabel: 'Celular'
								},								
								{
									xtype: 'textfield',
									name: 'anun_email',								    								    
								    flex: 1,
									id: 'anun_email_filter_tb_anunciante',																											
									allowBlank: false,
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
									id: 'anun_site_filter_tb_anunciante',																											
									allowBlank: false,
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
											id: 'anun_dt_cadastro_date_filter_tb_anunciante',
											name: 'anun_dt_cadastro_date',
											margins: '0 5 0 0',
											hideLabel: true
										},
										{
											xtype: 'textfield',
											mask: '99:99:99',
											plugins: 'textmask',
											returnWithMask: true,
											flex: 1,
											id: 'anun_dt_cadastro_time_filter_tb_anunciante',
											name: 'anun_dt_cadastro_time',
											hideLabel: true
										}
									]
								}								

							]
						},
						{
							xtype: 'hidden',
							name: 'action',
							hidden: true,
							id: 'action_filter_tb_anunciante',
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
