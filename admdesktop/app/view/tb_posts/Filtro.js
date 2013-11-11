/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.view.tb_posts.Filtro', {
    extend: 'Ext.window.Window',
    alias: 'widget.filtertb_postswin',

    id: 'FilterTb_PostsWin',
    layout: {
        type: 'fit'
    },
	modal: true,
    minimizable: false,
    
    title: 'Filtro de Posts',

    initComponent: function() {
        var me = this;

        Ext.applyIf(me, {
        	items: [
                {
                    xtype: 'form',
                    id: 'FormFilterTb_Posts',
                    bodyPadding: 10,
                    autoScroll: true,
                    items: [
						{
							xtype: 'textfield',
							name: 'dsc_pagina',
							id: 'dsc_pagina_filter_tb_posts',							
							anchor: '100%',
							fieldLabel: 'Desc. Página'
						},
						{
							xtype: 'textfield',
							name: 'texto_pagina',
							id: 'texto_pagina_filter_tb_posts',							
							anchor: '100%',
							fieldLabel: 'Texto Página'
						},
						{
							xtype: 'hidden',
							name: 'action',
							hidden: true,
							id: 'action_filter_tb_posts',
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
