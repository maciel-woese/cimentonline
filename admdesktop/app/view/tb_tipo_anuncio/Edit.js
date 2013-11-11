/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.view.tb_tipo_anuncio.Edit', {
    extend: 'Ext.window.Window',
	alias: 'widget.addtb_tipo_anunciowin',

    id: 'AddTb_Tipo_AnuncioWin',
    layout: {
        type: 'fit'
    },
	maximizable: false,
    minimizable: true,
	
    title: 'Cadastro de Tipo Anuncio',

    initComponent: function() {
        var me = this;


        Ext.applyIf(me, {
            items: [
                {
                    xtype: 'form',
                    id: 'FormTb_Tipo_Anuncio',
                    bodyPadding: 10,
                    autoScroll: true,
                    method: 'POST',
                    url : 'server/modulos/tb_tipo_anuncio/save.php',
                    items: [
						{
							xtype: 'textfield',
							name: 'anu_nome',
							id: 'anu_nome_tb_tipo_anuncio',
							anchor: '100%',							
							fieldLabel: 'Nome'
						},
						{
							xtype: 'textfield',
							name: 'anu_tamanho',
							id: 'anu_tamanho_tb_tipo_anuncio',
							anchor: '100%',							
							fieldLabel: 'Tamanho'
						},
						{
							xtype: 'hidden',
							name: 'anu_codigo',
							hidden: true,
							id: 'anu_codigo_tb_tipo_anuncio',
							value: 0,
							anchor: '100%'
						},
						{
							xtype: 'hidden',
							name: 'action',
							hidden: true,
							id: 'action_tb_tipo_anuncio',
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
                            id: 'button_resetar_tb_tipo_anuncio',
                            iconCls: 'bt_cancel',
                            action: 'resetar',
                            text: 'Resetar'
                        },
                        {
                            xtype: 'button',
                            id: 'button_salvar_tb_tipo_anuncio',
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
