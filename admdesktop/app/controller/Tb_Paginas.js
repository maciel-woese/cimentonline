/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.controller.Tb_Paginas', {
    extend: 'Ext.app.Controller',
	mixins: {
        controls: 'ShSolutions.controller.Util'
    },

	tabela: 'Tb_Paginas',
	
	refs: [
        {
        	ref: 'list',
        	selector: 'tb_paginaslist gridpanel'
        },
        {
        	ref: 'form',
        	selector: 'addtb_paginaswin form'
        },
        {
        	ref: 'filterBtn',
        	selector: 'tb_paginaslist button[action=filtrar]'
        },
        {
        	ref: 'filterWin',
        	selector: 'filtertb_paginaswin'
        },
        {
        	ref: 'filterForm',
        	selector: 'filtertb_paginaswin form'
        },
        {
        	ref: 'addWin',
        	selector: 'addtb_paginaswin'
        }
    ],
	
    models: [
		'ModelTb_Paginas'
	],
	stores: [
		'StoreTb_Paginas'		
	],
	
    views: [
        'tb_paginas.List',
        'tb_paginas.Filtro',
        'tb_paginas.Edit'
    ],

    init: function(application) {
    	this.control({
    		'tb_paginaslist gridpanel': {                 
				afterrender: this.getPermissoes,
                render: this.gridLoad
            },
            'tb_paginaslist button[action=filtrar]': {
            	click: this.btStoreLoadFielter
            },
            'tb_paginaslist button[action=adicionar]': {
                click: this.add
            },
            'tb_paginaslist button[action=editar]': {
                click: this.btedit
            },
            'tb_paginaslist button[action=deletar]': {
                click: this.btdel
            },            
            'tb_paginaslist button[action=gerar_pdf]': {
                click: this.gerarPdf
            },
            'addtb_paginaswin button[action=salvar]': {
                click: this.update
            },
            'addtb_paginaswin button[action=resetar]': {
                click: this.reset
            },
            'addtb_paginaswin form fieldcontainer combobox': {
                change: this.enableButton,
				render: this.comboLoad
            },
            'addtb_paginaswin form fieldcontainer button[action=reset_combo]': {
                click: this.resetCombo
            },
			'addtb_paginaswin form fieldcontainer button[action=add_win]': {
                click: this.getAddWindow
            },
            'filtertb_paginaswin form fieldcontainer combobox': {
                change: this.enableButton,
				render: this.comboLoad
            },
            'filtertb_paginaswin button[action=resetar_filtro]': {
                click: this.resetFielter
            },
            'filtertb_paginaswin button[action=filtrar_busca]': {
                click: this.setFielter
            },
            'filtertb_paginaswin': {
                show: this.filterSetFields
            }
        });
    },
   
    gerarPdf: function(button){
		var me = this;
		window.open('server/modulos/tb_paginas/pdf.php?'+
			Ext.Object.toQueryString(me.getList().store.proxy.extraParams)
		);
	},
	
    edit: function(grid, record) {
    	var me = this;
		me.getDesktopWindow('AddTb_PaginasWin', 'Tb_Paginas', 'tb_paginas.Edit', function(){
    		me.getAddWin().setTitle('Edi&ccedil;&atilde;o de Tb_Paginas');
	        me.getValuesForm(me.getForm(), me.getAddWin(), record.get('cod_pagina'), 'server/modulos/tb_paginas/list.php');
	        Ext.getCmp('action_tb_paginas').setValue('EDITAR');
    	});
    },

    del: function(grid, record, button) {
     	var me = this;
     	me.deleteAjax(grid, 'tb_paginas', {
			action: 'DELETAR',
			id: record.get('cod_pagina')
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

			Ext.Msg.confirm('Confirmar', 'Deseja deletar: '+record.get('cod_pagina')+'?', function(btn){
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
        me.getDesktopWindow('Tb_Paginas', 'Tb_Paginas', 'tb_paginas.Edit', false);
    },

    update: function(button) {
    	var me = this;
		me.saveForm(me.getList(), me.getForm(), me.getAddWin(), button, false, false);
    },

    btStoreLoadFielter: function(button){
		var win = this.getFilterWin();
    	if(!win) var win = Ext.create('ShSolutions.view.tb_paginas.Filtro', {
    		animateTarget: button.getEl()
    	});
    	win.show();
    }

});
