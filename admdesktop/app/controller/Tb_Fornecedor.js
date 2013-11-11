/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.controller.Tb_Fornecedor', {
    extend: 'Ext.app.Controller',
	mixins: {
        controls: 'ShSolutions.controller.Util'
    },

	tabela: 'Tb_Fornecedor',
	
	refs: [
        {
        	ref: 'list',
        	selector: 'tb_fornecedorlist gridpanel'
        },
        {
        	ref: 'form',
        	selector: 'addtb_fornecedorwin form'
        },
        {
        	ref: 'filterBtn',
        	selector: 'tb_fornecedorlist button[action=filtrar]'
        },
        {
        	ref: 'filterWin',
        	selector: 'filtertb_fornecedorwin'
        },
        {
        	ref: 'filterForm',
        	selector: 'filtertb_fornecedorwin form'
        },
        {
        	ref: 'addWin',
        	selector: 'addtb_fornecedorwin'
        }
    ],
	
    models: [
		'ModelTb_Fornecedor'
	],
	stores: [
		'StoreTb_Fornecedor'		
	],
	
    views: [
        'tb_fornecedor.List',
        'tb_fornecedor.Filtro',
        'tb_fornecedor.Edit'
    ],

    init: function(application) {
    	this.control({
    		'tb_fornecedorlist gridpanel': {                 
				afterrender: this.getPermissoes,
                render: this.gridLoad
            },
            'tb_fornecedorlist button[action=filtrar]': {
            	click: this.btStoreLoadFielter
            },
            'tb_fornecedorlist button[action=adicionar]': {
                click: this.add
            },
            'tb_fornecedorlist button[action=editar]': {
                click: this.btedit
            },
            'tb_fornecedorlist button[action=ativar_desativar]': {
                click: this.btAtivarDesativar
            },            
            'tb_fornecedorlist button[action=gerar_pdf]': {
                click: this.gerarPdf
            },
            'addtb_fornecedorwin button[action=salvar]': {
                click: this.update
            },
            'addtb_fornecedorwin button[action=resetar]': {
                click: this.reset
            },
            'addtb_fornecedorwin form fieldcontainer combobox': {
                change: this.enableButton,
				render: this.comboLoad
            },
            'addtb_fornecedorwin form fieldcontainer button[action=reset_combo]': {
                click: this.resetCombo
            },
			'addtb_fornecedorwin form fieldcontainer button[action=add_win]': {
                click: this.getAddWindow
            },
            'filtertb_fornecedorwin form fieldcontainer combobox': {
                change: this.enableButton,
				render: this.comboLoad
            },
            'filtertb_fornecedorwin button[action=resetar_filtro]': {
                click: this.resetFielter
            },
            'filtertb_fornecedorwin button[action=filtrar_busca]': {
                click: this.setFielter
            },
            'filtertb_fornecedorwin': {
                show: this.filterSetFields
            }
        });
    },

    btAtivarDesativar: function(button){
        var me = this;
        if (me.getList().selModel.hasSelection()) {
            var record = me.getList().getSelectionModel().getLastSelected();
            if(record.get('ativo')==1){
                var ativo = 0;
            }
            else{
                var ativo = 1;
            }

            button.setDisabled(true);
            me.getList().getEl().mask(me.saveFormText);
            Ext.Ajax.request({
                url: 'server/modulos/tb_fornecedor/save.php',
                params: {
                    action: 'ATIVAR_DESATIVAR',
                    for_codigo: record.get('for_codigo'),
                    ativo: ativo
                },
                success: function(o){
                    var o = Ext.decode(o.responseText);
                    button.setDisabled(false);
                    if(o.success===true){
                        info(me.avisoText, o.msg);
                        me.getList().store.load();
                    }
                    else{
                        info(me.titleErro, o.msg);
                        me.getList().getEl().unmask();
                    }
                },
                failure: function(o){
                    button.setDisabled(false);
                    info(me.titleErro, me.server_failure + o.status);
                    me.getList().getEl().unmask();
                }
            });
        }
        else{
            info(this.titleErro, this.editErroGrid);
            return true;
        }
    },
   
    gerarPdf: function(button){
		var me = this;
		window.open('server/modulos/tb_fornecedor/pdf.php?'+
			Ext.Object.toQueryString(me.getList().store.proxy.extraParams)
		);
	},
	
    edit: function(grid, record) {
    	var me = this;
		me.getDesktopWindow('AddTb_FornecedorWin', 'Tb_Fornecedor', 'tb_fornecedor.Edit', function(){
    		me.getAddWin().setTitle('Edi&ccedil;&atilde;o de Tb_Fornecedor');
	        me.getValuesForm(me.getForm(), me.getAddWin(), record.get('for_codigo'), 'server/modulos/tb_fornecedor/list.php');
	        Ext.getCmp('action_tb_fornecedor').setValue('EDITAR');
    	});
    },

    del: function(grid, record, button) {
     	var me = this;
     	me.deleteAjax(grid, 'tb_fornecedor', {
			action: 'DELETAR',
			id: record.get('for_codigo')
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

			Ext.Msg.confirm('Confirmar', 'Deseja deletar: '+record.get('for_codigo')+'?', function(btn){
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
        me.getDesktopWindow('Tb_Fornecedor', 'Tb_Fornecedor', 'tb_fornecedor.Edit', false);
    },

    update: function(button) {
    	var me = this;
		me.saveForm(me.getList(), me.getForm(), me.getAddWin(), button, false, false);
    },

    btStoreLoadFielter: function(button){
		var win = this.getFilterWin();
    	if(!win) var win = Ext.create('ShSolutions.view.tb_fornecedor.Filtro', {
    		animateTarget: button.getEl()
    	});
    	win.show();
    }

});
