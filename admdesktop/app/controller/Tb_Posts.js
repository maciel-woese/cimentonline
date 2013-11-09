/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.controller.Tb_Posts', {
    extend: 'Ext.app.Controller',
	mixins: {
        controls: 'ShSolutions.controller.Util'
    },

	tabela: 'Tb_Posts',
	
	refs: [
        {
        	ref: 'list',
        	selector: 'tb_postslist gridpanel'
        },
        {
        	ref: 'form',
        	selector: 'addtb_postswin form'
        },
        {
        	ref: 'filterBtn',
        	selector: 'tb_postslist button[action=filtrar]'
        },
        {
        	ref: 'filterWin',
        	selector: 'filtertb_postswin'
        },
        {
        	ref: 'filterForm',
        	selector: 'filtertb_postswin form'
        },
        {
        	ref: 'addWin',
        	selector: 'addtb_postswin'
        }
    ],
	
    models: [
		'ModelTb_Posts'
	],
	stores: [
		'StoreTb_Posts'		
	],
	
    views: [
        'tb_posts.List',
        'tb_posts.Filtro',
        'tb_posts.Edit'
    ],

    init: function(application) {
    	this.control({
    		'tb_postslist gridpanel': {                 
				afterrender: this.getPermissoes,
                render: this.gridLoad
            },
            'tb_postslist button[action=filtrar]': {
            	click: this.btStoreLoadFielter
            },
            'tb_postslist button[action=adicionar]': {
                click: this.add
            },
            'tb_postslist button[action=editar]': {
                click: this.btedit
            },
            'tb_postslist button[action=deletar]': {
                click: this.btdel
            },            
            'tb_postslist button[action=gerar_pdf]': {
                click: this.gerarPdf
            },
            'addtb_postswin button[action=salvar]': {
                click: this.update
            },
            'addtb_postswin button[action=resetar]': {
                click: this.reset
            },
            'addtb_postswin form fieldcontainer combobox': {
                change: this.enableButton,
				render: this.comboLoad
            },
            'addtb_postswin form fieldcontainer button[action=reset_combo]': {
                click: this.resetCombo
            },
			'addtb_postswin form fieldcontainer button[action=add_win]': {
                click: this.getAddWindow
            },
            'filtertb_postswin form fieldcontainer combobox': {
                change: this.enableButton,
				render: this.comboLoad
            },
            'filtertb_postswin button[action=resetar_filtro]': {
                click: this.resetFielter
            },
            'filtertb_postswin button[action=filtrar_busca]': {
                click: this.setFielter
            },
            'filtertb_postswin': {
                show: this.filterSetFields
            }
        });
    },
   
    gerarPdf: function(button){
		var me = this;
		window.open('server/modulos/tb_posts/pdf.php?'+
			Ext.Object.toQueryString(me.getList().store.proxy.extraParams)
		);
	},
	
    edit: function(grid, record) {
    	var me = this;
		me.getDesktopWindow('AddTb_PostsWin', 'Tb_Posts', 'tb_posts.Edit', function(){
    		me.getAddWin().setTitle('Edi&ccedil;&atilde;o de Tb_Posts');
	        me.getValuesForm(me.getForm(), me.getAddWin(), record.get('cod_pagina'), 'server/modulos/tb_posts/list.php');
	        Ext.getCmp('action_tb_posts').setValue('EDITAR');
    	});
    },

    del: function(grid, record, button) {
     	var me = this;
     	me.deleteAjax(grid, 'tb_posts', {
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
        me.getDesktopWindow('Tb_Posts', 'Tb_Posts', 'tb_posts.Edit', false);
    },

    update: function(button) {
    	var me = this;
		me.saveForm(me.getList(), me.getForm(), me.getAddWin(), button, false, false);
    },

    btStoreLoadFielter: function(button){
		var win = this.getFilterWin();
    	if(!win) var win = Ext.create('ShSolutions.view.tb_posts.Filtro', {
    		animateTarget: button.getEl()
    	});
    	win.show();
    }

});
