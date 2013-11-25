/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.view.config.Edit', {
    extend: 'Ext.window.Window',
	alias: 'widget.addconfigwin',

    id: 'AddConfigWin',
    layout: {
        type: 'fit'
    },
    maximizable: false,
    minimizable: true,
    title: 'Cadastro de Config',

    initComponent: function() {
        var me = this;


        Ext.applyIf(me, {
            items: [
                {
                    xtype: 'form',
                    id: 'FormConfig',
                    bodyPadding: 10,
                    autoScroll: true,
                    method: 'POST',
                    url : 'server/modulos/config/save.php',
                    items: [
						{
							xtype: 'textfield',
							name: 'tipo',
							id: 'tipo_config',
							anchor: '100%',
							fieldLabel: 'Tipo'
						},
                        {
                            xtype: 'textfield',
                            name: 'valor',
                            id: 'valor_config',
                            anchor: '100%',
                            fieldLabel: 'Valor'
                        },
						{
							xtype: 'hidden',
							name: 'id',
							hidden: true,
							id: 'id_config',
							value: 0,
							anchor: '100%'
						},
						{
							xtype: 'hidden',
							name: 'action',
							hidden: true,
							id: 'action_config',
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
                            id: 'button_resetar_config',
                            iconCls: 'bt_cancel',
                            action: 'resetar',
                            text: 'Resetar'
                        },
                        {
                            xtype: 'button',
                            id: 'button_salvar_config',
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
