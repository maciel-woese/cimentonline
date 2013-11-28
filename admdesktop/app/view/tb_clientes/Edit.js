/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.view.tb_clientes.Edit', {
    extend: 'ShSolutions.view.WindowMedium',
	alias: 'widget.addtb_clienteswin',

    id: 'AddTb_ClientesWin',
    layout: {
        type: 'fit'
    },
	maximizable: false,
    minimizable: true,
    title: 'Cadastro de Clientes',

    initComponent: function() {
        var me = this;


        Ext.applyIf(me, {
            items: [
                {
                    xtype: 'form',
                    id: 'FormTb_Clientes',
                    bodyPadding: 10,
                    autoScroll: true,
                    method: 'POST',
                    url : 'server/modulos/tb_clientes/save.php',
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
									id: 'cli_nome_tb_clientes',
									anchor: '100%',									
									fieldLabel: 'Nome'									
								},								
								{
									xtype: 'textfield',
									name: 'cli_nome_fan',								    								    
								    flex: 1,
									id: 'cli_nome_fan_tb_clientes',
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
									id: 'cli_email_tb_clientes',
									anchor: '100%',		
									validator: function(value){
										if(value!="" && !isEmail(value)){
											return 'E-mail Inválido...';
										}
										else{
											return true;
										}
									},									
									fieldLabel: 'Email'									
								},								
								{
									xtype: 'textfield',
									name: 'cli_tel',								    								    
								    flex: 1,
									id: 'cli_tel_tb_clientes',
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
									name: 'cli_cel',									
								    margin: '0 5 0 0',								    
								    flex: 1,
									id: 'cli_cel_tb_clientes',
									anchor: '100%',							
									mask: '(99) 9999-9999',
									plugins: 'textmask',									
									fieldLabel: 'Celular'									
								},								
								{
									xtype: 'textfield',
									name: 'cli_cargo',								    								    
								    flex: 1,
									id: 'cli_cargo_tb_clientes',
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
									xtype: 'fieldcontainer',
									autoHeight: true,
									margin: '0 5 0 0',
									flex: 1,
									layout: {
										type: 'hbox'
									},
									items: [
										{
											xtype: 'combobox',
											store: 'StoreComboTb_Estado',
											name: 'est_codigo',
											allowBlank: true,
											id: 'est_codigo_tb_clientes',
											button_id: 'button_est_codigo_tb_clientes',
											flex: 1,
											anchor: '100%',
											fieldLabel: 'Estado'
										},
										{
											xtype: 'buttonadd',
											iconCls: 'bt_cancel',
											hidden: true,
											id: 'button_est_codigo_tb_clientes',
											combo_id: 'est_codigo_tb_clientes',
											action: 'reset_combo'
										},
										{
											xtype: 'buttonadd',
											tabela: 'Tb_Estado',
											action: 'add_win'
										}
									]
								},
								{
									xtype: 'fieldcontainer',
									autoHeight: true,
									margin: '0 5 0 0',
									flex: 1,
									layout: {
										type: 'hbox'
									},
									items: [
										{
											xtype: 'combobox',
											store: 'StoreComboTb_Cidade',
											name: 'cid_codigo',
											allowBlank: true,
											disabled: true,
											id: 'cid_codigo_tb_clientes',
											button_id: 'button_cid_codigo_tb_clientes',
											flex: 1,
											anchor: '100%',
											fieldLabel: 'Cidade'
										},
										{
											xtype: 'buttonadd',
											iconCls: 'bt_cancel',
											hidden: true,
											id: 'button_cid_codigo_tb_clientes',
											combo_id: 'cid_codigo_tb_clientes',
											action: 'reset_combo'
										},
										{
											xtype: 'buttonadd',
											tabela: 'Tb_Cidade',
											action: 'add_win'
										}
									]
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
											id: 'cli_dt_cadastro_date_tb_clientes',
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
											id: 'cli_dt_cadastro_time_tb_clientes',
											name: 'cli_dt_cadastro_time',											
											hideLabel: true
										}
									]
								}								

							]
						},
						{
							xtype: 'hidden',
							name: 'cli_codigo',
							hidden: true,
							id: 'cli_codigo_tb_clientes',
							value: 0,
							anchor: '100%'
						},
						{
							xtype: 'hidden',
							name: 'action',
							hidden: true,
							id: 'action_tb_clientes',
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
                            id: 'button_resetar_tb_clientes',
                            iconCls: 'bt_cancel',
                            action: 'resetar',
                            text: 'Resetar'
                        },
                        {
                            xtype: 'button',
                            id: 'button_salvar_tb_clientes',
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
