/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.view.tb_opcoes_anuncio.Filtro', {
    extend: 'Ext.window.Window',
    alias: 'widget.filtertb_opcoes_anunciowin',

    id: 'FilterTb_Opcoes_AnuncioWin',
    layout: {
        type: 'fit'
    },
	modal: true,
    minimizable: false,
    
    title: 'Filtro de Opções do Anuncio',

    initComponent: function() {
        var me = this;

        Ext.applyIf(me, {
        	items: [
                {
                    xtype: 'form',
                    id: 'FormFilterTb_Opcoes_Anuncio',
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
									xtype: 'combobox',
                                    store: 'StoreComboTb_Tipo_Anuncio',
                                    name: 'tipo_anucio_id',
									id: 'tipo_anucio_id_filter_tb_opcoes_anuncio',
									button_id: 'button_tipo_anucio_id_filter_tb_opcoes_anuncio',
									flex: 1,
									anchor: '100%',
									fieldLabel: 'Tipo Anucio'
								},
                                {
                                    xtype: 'buttonadd',
                                    iconCls: 'bt_cancel',
                                    hidden: true,
                                    id: 'button_tipo_anucio_id_filter_tb_opcoes_anuncio',
                                    combo_id: 'tipo_anucio_id_filter_tb_opcoes_anuncio',
                                    action: 'reset_combo'
                                }
                            ]
                        },
						{
							xtype: 'textfield',
							name: 'valor',
							id: 'valor_filter_tb_opcoes_anuncio',							
							mask: '#9.999.990,00',
							plugins: 'textmask',
							money: true,							
							anchor: '100%',
							fieldLabel: 'Valor'
						},
						{
							xtype: 'numberfield',
							allowDecimals: false,
							name: 'periodo',
							id: 'periodo_filter_tb_opcoes_anuncio',
							anchor: '100%',
							fieldLabel: 'Periodo'
						},
						{
							xtype: 'hidden',
							name: 'action',
							hidden: true,
							id: 'action_filter_tb_opcoes_anuncio',
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
