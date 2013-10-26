/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.controller.Tb_Anunciante', {
    extend: 'Ext.app.Controller',
	mixins: {
        controls: 'ShSolutions.controller.Util'
    },

	tabela: 'Tb_Anunciante',
	
	refs: [
        {
        	ref: 'list',
        	selector: 'tb_anunciantelist gridpanel'
        },
        {
        	ref: 'form',
        	selector: 'addtb_anunciantewin form'
        },
        {
        	ref: 'filterBtn',
        	selector: 'tb_anunciantelist button[action=filtrar]'
        },
        {
        	ref: 'filterWin',
        	selector: 'filtertb_anunciantewin'
        },
        {
        	ref: 'filterForm',
        	selector: 'filtertb_anunciantewin form'
        },
        {
        	ref: 'addWin',
        	selector: 'addtb_anunciantewin'
        }
    ],
	
    models: [
		'ModelTb_Anunciante'
	],
	stores: [
		'StoreTb_Anunciante'		
	],
	
    views: [
        'tb_anunciante.List',
        'tb_anunciante.Filtro',
        'tb_anunciante.Edit'
    ],

    init: function(application) {
    	this.control({
    		'tb_anunciantelist gridpanel': {                 
				afterrender: this.getPermissoes,
                render: this.gridLoad
            },
            'tb_anunciantelist button[action=filtrar]': {
            	click: this.btStoreLoadFielter
            },
            'tb_anunciantelist button[action=adicionar]': {
                click: this.add
            },
            'tb_anunciantelist button[action=editar]': {
                click: this.btedit
            },
            'tb_anunciantelist button[action=deletar]': {
                click: this.btdel
            },            
            'tb_anunciantelist button[action=gerar_pdf]': {
                click: this.gerarPdf
            },
            'addtb_anunciantewin button[action=salvar]': {
                click: this.update
            },
            'addtb_anunciantewin button[action=resetar]': {
                click: this.reset
            },
            'addtb_anunciantewin form fieldcontainer combobox': {
                change: this.enableButton,
				render: this.comboLoad
            },
            'addtb_anunciantewin form fieldcontainer button[action=reset_combo]': {
                click: this.resetCombo
            },
			'addtb_anunciantewin form fieldcontainer button[action=add_win]': {
                click: this.getAddWindow
            },
            'filtertb_anunciantewin form fieldcontainer combobox': {
                change: this.enableButton,
				render: this.comboLoad
            },
            'filtertb_anunciantewin button[action=resetar_filtro]': {
                click: this.resetFielter
            },
            'filtertb_anunciantewin button[action=filtrar_busca]': {
                click: this.setFielter
            },
            'filtertb_anunciantewin': {
                show: this.filterSetFields
            }
        });
    },
   
    gerarPdf: function(button){
		var me = this;
		window.open('server/modulos/tb_anunciante/pdf.php?'+
			Ext.Object.toQueryString(me.getList().store.proxy.extraParams)
		);
	},
	
    edit: function(grid, record) {
    	var me = this;
		me.getDesktopWindow('AddTb_AnuncianteWin', 'Tb_Anunciante', 'tb_anunciante.Edit', function(){
    		me.getAddWin().setTitle('Edi&ccedil;&atilde;o de Tb_Anunciante');
	        me.getValuesForm(me.getForm(), me.getAddWin(), record.get('cid_codigo'), 'server/modulos/tb_anunciante/list.php');
	        Ext.getCmp('action_tb_anunciante').setValue('EDITAR');
    	});
    },

    del: function(grid, record, button) {
     	var me = this;
     	me.deleteAjax(grid, 'tb_anunciante', {
			action: 'DELETAR',
			id: record.get('cid_codigo')
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

			Ext.Msg.confirm('Confirmar', 'Deseja deletar: '+record.get('cid_codigo')+'?', function(btn){
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
        me.getDesktopWindow('Tb_Anunciante', 'Tb_Anunciante', 'tb_anunciante.Edit', false);
    },

    update: function(button) {
    	var me = this;
		me.saveForm(me.getList(), me.getForm(), me.getAddWin(), button, false, false);
    },

    btStoreLoadFielter: function(button){
		var win = this.getFilterWin();
    	if(!win) var win = Ext.create('ShSolutions.view.tb_anunciante.Filtro', {
    		animateTarget: button.getEl()
    	});
    	win.show();
    }

});
