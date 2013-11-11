/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.view.tb_clientes.Filtro', {
    extend: 'ShSolutions.view.WindowMedium',
    alias: 'widget.filtertb_clienteswin',

    id: 'FilterTb_ClientesWin',
    layout: {
        type: 'fit'
    },
    modal: true,
    minimizable: false,
	
    title: 'Filtro de Tb_Clientes',

    initComponent: function() {
        var me = this;

        Ext.applyIf(me, {
        	items: [
                {
                    xtype: 'form',
                    id: 'FormFilterTb_Clientes',
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
									name: 'cli_nome',									
								    margin: '0 5 0 0',								    
								    flex: 1,
									id: 'cli_nome_filter_tb_clientes',																											
									allowBlank: false,
									anchor: '100%',
									fieldLabel: 'Nome'
								},								
								{
									xtype: 'textfield',
									name: 'cli_nome_fan',								    								    
								    flex: 1,
									id: 'cli_nome_fan_filter_tb_clientes',																											
									allowBlank: false,
									anchor: '100%',
									fieldLabel: 'Nome Fantasia'
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
									name: 'cli_email',									
								    margin: '0 5 0 0',								    
								    flex: 1,
									id: 'cli_email_filter_tb_clientes',		
									validator: function(value){
										if(!isEmail(value)){
											return 'E-mail Inválido...';
										}
										else{
											return true;
										}
									},																											
									allowBlank: false,
									anchor: '100%',
									fieldLabel: 'Email'
								},								
								{
									xtype: 'textfield',
									name: 'cli_tel',								    								    
								    flex: 1,
									id: 'cli_tel_filter_tb_clientes',							
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
									name: 'cli_cel',									
								    margin: '0 5 0 0',								    
								    flex: 1,
									id: 'cli_cel_filter_tb_clientes',							
									mask: '(99) 9999-9999',
									plugins: 'textmask',																											
									allowBlank: false,
									anchor: '100%',
									fieldLabel: 'Celular'
								},								
								{
									xtype: 'textfield',
									name: 'cli_cargo',								    								    
								    flex: 1,
									id: 'cli_cargo_filter_tb_clientes',																											
									allowBlank: false,
									anchor: '100%',
									fieldLabel: 'Cargo'
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
									xtype: 'numberfield',
									name: 'est_codigo',								    
								    margin: '0 5 0 0',								    
								    flex: 1,
									id: 'est_codigo_filter_tb_clientes',
									anchor: '100%',
									fieldLabel: 'Estado'
								},								
								{
									xtype: 'numberfield',
									name: 'cid_codigo',								    								    
								    flex: 1,
									id: 'cid_codigo_filter_tb_clientes',
									anchor: '100%',
									fieldLabel: 'Cidade'
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
											id: 'cli_dt_cadastro_date_filter_tb_clientes',
											name: 'cli_dt_cadastro_date',
											margins: '0 5 0 0',
											hideLabel: true
										},
										{
											xtype: 'textfield',
											mask: '99:99:99',
											plugins: 'textmask',
											returnWithMask: true,
											flex: 1,
											id: 'cli_dt_cadastro_time_filter_tb_clientes',
											name: 'cli_dt_cadastro_time',
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
							id: 'action_filter_tb_clientes',
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
