/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.controller.Tb_Tipo_Anuncio', {
    extend: 'Ext.app.Controller',
	mixins: {
        controls: 'ShSolutions.controller.Util'
    },

	tabela: 'Tb_Tipo_Anuncio',
	
	refs: [
        {
        	ref: 'list',
        	selector: 'tb_tipo_anunciolist gridpanel'
        },
        {
        	ref: 'form',
        	selector: 'addtb_tipo_anunciowin form'
        },
        {
        	ref: 'filterBtn',
        	selector: 'tb_tipo_anunciolist button[action=filtrar]'
        },
        {
        	ref: 'filterWin',
        	selector: 'filtertb_tipo_anunciowin'
        },
        {
        	ref: 'filterForm',
        	selector: 'filtertb_tipo_anunciowin form'
        },
        {
        	ref: 'addWin',
        	selector: 'addtb_tipo_anunciowin'
        }
    ],
	
    models: [
		'ModelTb_Tipo_Anuncio'
	],
	stores: [
		'StoreTb_Tipo_Anuncio'
	],
	
    views: [
        'tb_tipo_anuncio.List',
        'tb_tipo_anuncio.Filtro',
        'tb_tipo_anuncio.Edit'
    ],

    init: function(application) {
    	this.control({
    		'tb_tipo_anunciolist gridpanel': {                 
				afterrender: this.getPermissoes,
                render: this.gridLoad
            },
            'tb_tipo_anunciolist button[action=filtrar]': {
            	click: this.btStoreLoadFielter
            },
            'tb_tipo_anunciolist button[action=adicionar]': {
                click: this.add
            },
            'tb_tipo_anunciolist button[action=editar]': {
                click: this.btedit
            },
            'tb_tipo_anunciolist button[action=deletar]': {
                click: this.btdel
            },
            'tb_tipo_anunciolist button[action=adicionar_opcoes]': {
                click: this.btAddOpcoes
            },
            'tb_tipo_anunciolist button[action=gerar_pdf]': {
                click: this.gerarPdf
            },
            'addtb_tipo_anunciowin button[action=salvar]': {
                click: this.update
            },
            'addtb_tipo_anunciowin button[action=resetar]': {
                click: this.reset
            },
            'addtb_tipo_anunciowin form fieldcontainer combobox': {
                change: this.enableButton,
				render: this.comboLoad
            },
            'addtb_tipo_anunciowin form fieldcontainer button[action=reset_combo]': {
                click: this.resetCombo
            },
			'addtb_tipo_anunciowin form fieldcontainer button[action=add_win]': {
                click: this.getAddWindow
            },
            'filtertb_tipo_anunciowin form fieldcontainer combobox': {
                change: this.enableButton,
				render: this.comboLoad
            },
            'filtertb_tipo_anunciowin button[action=resetar_filtro]': {
                click: this.resetFielter
            },
            'filtertb_tipo_anunciowin button[action=filtrar_busca]': {
                click: this.setFielter
            },
            'filtertb_tipo_anunciowin': {
                show: this.filterSetFields
            }
        });
    },
   
    gerarPdf: function(button){
		var me = this;
		window.open('server/modulos/tb_tipo_anuncio/pdf.php?'+
			Ext.Object.toQueryString(me.getList().store.proxy.extraParams)
		);
	},
	
    edit: function(grid, record) {
    	var me = this;
		me.getDesktopWindow('AddTb_Tipo_AnuncioWin', 'Tb_Tipo_Anuncio', 'tb_tipo_anuncio.Edit', function(){
    		me.getAddWin().setTitle('Edi&ccedil;&atilde;o de Tipo de Anuncio');
	        me.getValuesForm(me.getForm(), me.getAddWin(), record.get('anu_codigo'), 'server/modulos/tb_tipo_anuncio/list.php');
	        Ext.getCmp('action_tb_tipo_anuncio').setValue('EDITAR');
    	});
    },

    del: function(grid, record, button) {
     	var me = this;
     	me.deleteAjax(grid, 'tb_tipo_anuncio', {
			action: 'DELETAR',
			id: record.get('anu_codigo')
		}, button, false);

    },

    btAddOpcoes: function(button){
        var me = this;
        if (me.getList().selModel.hasSelection()) {
            var record = this.getList().getSelectionModel().getLastSelected();
            me.getDesktopWindow('Tb_Opcoes_Anuncio', 'Tb_Opcoes_Anuncio', 'tb_opcoes_anuncio.Edit', function(){
                var id = new String(record.get('anu_codigo'));
                Ext.getCmp('tipo_anucio_id_tb_opcoes_anuncio').setValue(id);
            });
        }
        else{
            info(this.titleErro, this.editErroGrid);
            return true;
        }
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

			Ext.Msg.confirm('Confirmar', 'Deseja deletar: '+record.get('anu_codigo')+'?', function(btn){
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
        me.getDesktopWindow('Tb_Tipo_Anuncio', 'Tb_Tipo_Anuncio', 'tb_tipo_anuncio.Edit', false);
    },

    update: function(button) {
    	var me = this;
		me.saveForm(me.getList(), me.getForm(), me.getAddWin(), button, false, false);
    },

    btStoreLoadFielter: function(button){
		var win = this.getFilterWin();
    	if(!win) var win = Ext.create('ShSolutions.view.tb_tipo_anuncio.Filtro', {
    		animateTarget: button.getEl()
    	});
    	win.show();
    }

});
