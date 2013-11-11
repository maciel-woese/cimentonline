/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.controller.Tb_Opcoes_Anuncio', {
    extend: 'Ext.app.Controller',
	mixins: {
        controls: 'ShSolutions.controller.Util'
    },

	tabela: 'Tb_Opcoes_Anuncio',
	
	refs: [
        {
        	ref: 'list',
        	selector: 'tb_opcoes_anunciolist gridpanel'
        },
        {
        	ref: 'form',
        	selector: 'addtb_opcoes_anunciowin form'
        },
        {
        	ref: 'filterBtn',
        	selector: 'tb_opcoes_anunciolist button[action=filtrar]'
        },
        {
        	ref: 'filterWin',
        	selector: 'filtertb_opcoes_anunciowin'
        },
        {
        	ref: 'filterForm',
        	selector: 'filtertb_opcoes_anunciowin form'
        },
        {
        	ref: 'addWin',
        	selector: 'addtb_opcoes_anunciowin'
        }
    ],
	
    models: [
		'ModelComboLocal',
		'ModelTb_Opcoes_Anuncio'
	],
	stores: [
		'StoreComboTb_Tipo_Anuncio',
		'StoreTb_Opcoes_Anuncio'		
	],
	
    views: [
        'tb_opcoes_anuncio.List',
        'tb_opcoes_anuncio.Filtro',
        'tb_opcoes_anuncio.Edit'
    ],

    init: function(application) {
    	this.control({
    		'tb_opcoes_anunciolist gridpanel': {                 
				afterrender: this.getPermissoes,
                render: this.gridLoad
            },
            'tb_opcoes_anunciolist button[action=filtrar]': {
            	click: this.btStoreLoadFielter
            },
            'tb_opcoes_anunciolist button[action=adicionar]': {
                click: this.add
            },
            'tb_opcoes_anunciolist button[action=editar]': {
                click: this.btedit
            },
            'tb_opcoes_anunciolist button[action=deletar]': {
                click: this.btdel
            },            'addtb_opcoes_anunciowin button[action=salvar]': {
                click: this.update
            },
            'addtb_opcoes_anunciowin button[action=resetar]': {
                click: this.reset
            },
            'addtb_opcoes_anunciowin form fieldcontainer combobox': {
                change: this.enableButton,
				render: this.comboLoad
            },
            'addtb_opcoes_anunciowin form fieldcontainer button[action=reset_combo]': {
                click: this.resetCombo
            },
			'addtb_opcoes_anunciowin form fieldcontainer button[action=add_win]': {
                click: this.getAddWindow
            },
            'filtertb_opcoes_anunciowin form fieldcontainer combobox': {
                change: this.enableButton,
				render: this.comboLoad
            },
            'filtertb_opcoes_anunciowin button[action=resetar_filtro]': {
                click: this.resetFielter
            },
            'filtertb_opcoes_anunciowin button[action=filtrar_busca]': {
                click: this.setFielter
            },
            'filtertb_opcoes_anunciowin': {
                show: this.filterSetFields
            }
        });
    },
	
    edit: function(grid, record) {
    	var me = this;
		me.getDesktopWindow('AddTb_Opcoes_AnuncioWin', 'Tb_Opcoes_Anuncio', 'tb_opcoes_anuncio.Edit', function(){
    		me.getAddWin().setTitle('Edi&ccedil;&atilde;o de Tb_Opcoes_Anuncio');
	        me.getValuesForm(me.getForm(), me.getAddWin(), record.get('id'), 'server/modulos/tb_opcoes_anuncio/list.php');
	        Ext.getCmp('action_tb_opcoes_anuncio').setValue('EDITAR');
    	});
    },

    del: function(grid, record, button) {
     	var me = this;
     	me.deleteAjax(grid, 'tb_opcoes_anuncio', {
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

			Ext.Msg.confirm('Confirmar', 'Deseja deletar: '+record.get('id')+'?', function(btn){
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
        me.getDesktopWindow('Tb_Opcoes_Anuncio', 'Tb_Opcoes_Anuncio', 'tb_opcoes_anuncio.Edit', false);
    },

    update: function(button) {
    	var me = this;
		me.saveForm(me.getList(), me.getForm(), me.getAddWin(), button, false, false);
    },

    btStoreLoadFielter: function(button){
		var win = this.getFilterWin();
    	if(!win) var win = Ext.create('ShSolutions.view.tb_opcoes_anuncio.Filtro', {
    		animateTarget: button.getEl()
    	});
    	win.show();
    }

});
