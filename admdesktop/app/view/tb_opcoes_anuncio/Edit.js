/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.view.tb_opcoes_anuncio.Edit', {
    extend: 'Ext.window.Window',
	alias: 'widget.addtb_opcoes_anunciowin',

    id: 'AddTb_Opcoes_AnuncioWin',
    layout: {
        type: 'fit'
    },
	maximizable: false,
    minimizable: true,
	
    title: 'Cadastro de Opções do Anuncio',

    initComponent: function() {
        var me = this;


        Ext.applyIf(me, {
            items: [
                {
                    xtype: 'form',
                    id: 'FormTb_Opcoes_Anuncio',
                    bodyPadding: 10,
                    autoScroll: true,
                    method: 'POST',
                    url : 'server/modulos/tb_opcoes_anuncio/save.php',
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
									xtype: 'combobox',
                                    store: 'StoreComboTb_Tipo_Anuncio',
                                    name: 'tipo_anucio_id',
									id: 'tipo_anucio_id_tb_opcoes_anuncio',
									button_id: 'button_tipo_anucio_id_tb_opcoes_anuncio',
									flex: 1,									
									anchor: '100%',
									fieldLabel: 'Tipo Anucio'
								},
                                {
                                    xtype: 'buttonadd',
                                    iconCls: 'bt_cancel',
                                    hidden: true,
                                    id: 'button_tipo_anucio_id_tb_opcoes_anuncio',
                                    combo_id: 'tipo_anucio_id_tb_opcoes_anuncio',
                                    action: 'reset_combo'
                                },
                                {
                                    xtype: 'buttonadd',
									tabela: 'Tb_Tipo_Anuncio',
                                    action: 'add_win'
                                }
                            ]
                        },
						{
							xtype: 'textfield',
							name: 'valor',
							id: 'valor_tb_opcoes_anuncio',
							anchor: '100%',							
							mask: '#9.999.990,00',
							plugins: 'textmask',
							money: true,							
							fieldLabel: 'Valor'
						},
						{
							xtype: 'numberfield',
							name: 'periodo',
							id: 'periodo_tb_opcoes_anuncio',
							anchor: '100%',						
							fieldLabel: 'Periodo (Meses)'
						},
						{
							xtype: 'hidden',
							name: 'id',
							hidden: true,
							id: 'id_tb_opcoes_anuncio',
							value: 0,
							anchor: '100%'
						},
						{
							xtype: 'hidden',
							name: 'action',
							hidden: true,
							id: 'action_tb_opcoes_anuncio',
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
                            id: 'button_resetar_tb_opcoes_anuncio',
                            iconCls: 'bt_cancel',
                            action: 'resetar',
                            text: 'Resetar'
                        },
                        {
                            xtype: 'button',
                            id: 'button_salvar_tb_opcoes_anuncio',
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
