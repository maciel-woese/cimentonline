/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.view.tb_tipo_anuncio.Filtro', {
    extend: 'Ext.window.Window',
    alias: 'widget.filtertb_tipo_anunciowin',

    id: 'FilterTb_Tipo_AnuncioWin',
    layout: {
        type: 'fit'
    },
	modal: true,
    minimizable: false,
    
    title: 'Filtro de Tb_Tipo_Anuncio',

    initComponent: function() {
        var me = this;

        Ext.applyIf(me, {
        	items: [
                {
                    xtype: 'form',
                    id: 'FormFilterTb_Tipo_Anuncio',
                    bodyPadding: 10,
                    autoScroll: true,
                    items: [
						{
							xtype: 'textfield',
							name: 'anu_nome',
							id: 'anu_nome_filter_tb_tipo_anuncio',							
							anchor: '100%',
							fieldLabel: 'Nome'
						},
						{
							xtype: 'textfield',
							name: 'anu_tamanho',
							id: 'anu_tamanho_filter_tb_tipo_anuncio',							
							anchor: '100%',
							fieldLabel: 'Tamanho'
						},
						{
							xtype: 'hidden',
							name: 'action',
							hidden: true,
							id: 'action_filter_tb_tipo_anuncio',
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
