/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.controller.Tb_Estado', {
	extend: 'Ext.app.Controller',
	mixins: {
		controls: 'ShSolutions.controller.Util'
	},

	storePai: true,
	tabela: 'Tb_Estado',
	
	refs: [
		{
			ref: 'list',
			selector: 'tb_estadolist gridpanel'
		},
		{
			ref: 'form',
			selector: 'addtb_estadowin form'
		},
		{
			ref: 'filterBtn',
			selector: 'tb_estadolist button[action=filtrar]'
		},
		{
			ref: 'filterWin',
			selector: 'filtertb_estadowin'
		},
		{
			ref: 'filterForm',
			selector: 'filtertb_estadowin form'
		},
		{
			ref: 'addWin',
			selector: 'addtb_estadowin'
		}
	],
	
	models: [
		'ModelCombo',
		'ModelTb_Estado'
	],
	stores: [
		'StoreComboTb_Estado',
		'StoreTb_Estado'
	],
	
	views: [
		'tb_estado.List',
		'tb_estado.Edit'
	],

	init: function(application) {
		this.control({
			'tb_estadolist gridpanel': {
				afterrender: this.getPermissoes,
				render: this.gridLoad
			},
			'tb_estadolist button[action=adicionar]': {
				click: this.add
			},
			'tb_estadolist button[action=list_cidades]': {
				click: this.listCidades
			},
			'tb_estadolist button[action=editar]': {
				click: this.btedit
			},
			'tb_estadolist button[action=deletar]': {
				click: this.btdel
			},
			'addtb_estadowin button[action=salvar]': {
				click: this.update
			},
			'addtb_estadowin button[action=resetar]': {
				click: this.reset
			},
			'addtb_estadowin form fieldcontainer combobox': {
				change: this.enableButton,
				render: this.comboLoad
			},
			'addtb_estadowin form fieldcontainer button[action=reset_combo]': {
				click: this.resetCombo
			},
			'addtb_estadowin form fieldcontainer button[action=add_win]': {
				click: this.getAddWindow
			}
		});
	},

	listCidades: function(button){
		if (this.getList().selModel.hasSelection()) {
			var record = this.getList().getSelectionModel().getLastSelected();
			this.getDesktopWindow('List-Tb_Cidade', 'Tb_Cidade', 'tb_cidade.List', function(controller){
				console.info(controller);
				controller.getList().store.proxy.extraParams.uf_sigla = record.get('uf');
			});
		}
		else{
			info(this.titleErro, this.detalharErroGrid);
			return true;
		}
	},

	edit: function(grid, record) {
		var me = this;
		me.getDesktopWindow('AddTb_EstadoWin', 'Tb_Estado', 'tb_estado.Edit', function(){
			me.getAddWin().setTitle('Alteração de Estado');
			me.getValuesForm(me.getForm(), me.getAddWin(), record.get('est_codigo'), 'server/modulos/tb_estado/list.php');
			Ext.getCmp('action_tb_estado').setValue('EDITAR');
			Ext.getCmp('uf_tb_estado').focus(false, 1000);
		});
	},

	del: function(grid, record, button) {
	 	var me = this;
	 	me.deleteAjax(grid, 'tb_estado', {
			action: 'DELETAR',
			id: record.get('est_codigo')
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

			Ext.Msg.confirm('Confirmar', 'Deseja Desativar o Estado: '+record.get('est_dsc')+'?', function(btn){
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
		me.getDesktopWindow('Tb_Estado', 'Tb_Estado', 'tb_estado.Edit', false);
		Ext.getCmp('uf_tb_estado').focus(false, 1000);
	},

	update: function(button) {
		var me = this;
		me.saveForm(me.getList(), me.getForm(), me.getAddWin(), button, false, false);
	},

	btStoreLoadFielter: function(button){
		console.inf(button);
	}
});