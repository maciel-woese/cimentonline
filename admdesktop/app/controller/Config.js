/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.controller.Config', {
    extend: 'Ext.app.Controller',
	mixins: {
        controls: 'ShSolutions.controller.Util'
    },

	tabela: 'Config',

	refs: [
        {
        	ref: 'list',
        	selector: 'configlist gridpanel'
        },
        {
        	ref: 'form',
        	selector: 'addconfigwin form'
        },
        {
        	ref: 'addWin',
        	selector: 'addconfigwin'
        }
    ],
	
    models: [
		'ModelConfig'
	],
	stores: [
		'StoreConfig'
	],
	
    views: [
        'config.List',
        'config.Edit'
    ],

    init: function(application) {
    	this.control({
    		'configlist gridpanel': {
				afterrender: this.getPermissoes,
                render: this.gridLoad
            },
            'configlist button[action=adicionar]': {
                click: this.add
            },
            'configlist button[action=editar]': {
                click: this.btedit
            },
            'configlist button[action=deletar]': {
            	click: this.btdel
            },
            'addconfigwin button[action=salvar]': {
                click: this.update
            },
            'addconfigwin button[action=resetar]': {
                click: this.reset
            },
            'addconfigwin form fieldcontainer combobox': {
                change: this.enableButton,
				render: this.comboLoad
            },
            'addconfigwin form fieldcontainer button[action=reset_combo]': {
                click: this.resetCombo
            },
			'addconfigwin form fieldcontainer button[action=add_win]': {
                click: this.getAddWindow
            }
        });
    },
    	
    edit: function(grid, record) {
    	var me = this;
    	me.getDesktopWindow('AddConfigWin', 'Config', 'config.Edit', function(){
    		me.getAddWin().setTitle('Edi&ccedil;&atilde;o de Config');
	        me.getValuesForm(me.getForm(), me.getAddWin(), record.get('id'), 'server/modulos/config/list.php');
	        Ext.getCmp('action_config').setValue('EDITAR');
    	});
    },

    del: function(grid, record, button) {
     	var me = this;
     	me.deleteAjax(grid, 'config', {
			action: 'DELETAR',
			id: record.get('id')
		}, button, false);

    },

    btedit: function(button) {
        if (this.getList().selModel.hasSelection()) {
			var record = this.getList().getSelectionModel().getLastSelected();
			this.edit(this.getList(), record);
		}
		else{
			info(this.titleErro, this.editErroGrid);
			return true;
		}
    },

    btdel: function(button) {
    	var me = this;
        if (me.getList().selModel.hasSelection()) {
			var record = me.getList().getSelectionModel().getLastSelected();

			Ext.Msg.confirm('Confirmar', 'Deseja deletar: '+record.get('config')+'?', function(btn){
				if(btn=='yes'){
					me.del(me.getList(), record, button);
				}
			});
		}
		else{
			info(this.titleErro, this.delErroGrid);
			return true;
		}
    },

    add: function(button) {
    	var me = this;
		me.getDesktopWindow('Config', 'Config', 'config.Edit', false);
    },

    update: function(button) {
    	var me = this;
		me.saveForm(me.getList(), me.getForm(), me.getAddWin(), button, false, false);
    }

});
