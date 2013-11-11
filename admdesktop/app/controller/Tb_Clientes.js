/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

Ext.define('ShSolutions.controller.Tb_Clientes', {
    extend: 'Ext.app.Controller',
	mixins: {
        controls: 'ShSolutions.controller.Util'
    },

	tabela: 'Tb_Clientes',
	
	refs: [
        {
        	ref: 'list',
        	selector: 'tb_clienteslist gridpanel'
        },
        {
        	ref: 'form',
        	selector: 'addtb_clienteswin form'
        },
        {
        	ref: 'filterBtn',
        	selector: 'tb_clienteslist button[action=filtrar]'
        },
        {
        	ref: 'filterWin',
        	selector: 'filtertb_clienteswin'
        },
        {
        	ref: 'filterForm',
        	selector: 'filtertb_clienteswin form'
        },
        {
        	ref: 'addWin',
        	selector: 'addtb_clienteswin'
        }
    ],
	
    models: [
		'ModelTb_Clientes'
	],
	stores: [
		'StoreTb_Clientes'		
	],
	
    views: [
        'tb_clientes.List',
        'tb_clientes.Filtro',
        'tb_clientes.Edit'
    ],

    init: function(application) {
    	this.control({
    		'tb_clienteslist gridpanel': {                 
				afterrender: this.getPermissoes,
                render: this.gridLoad
            },
            'tb_clienteslist button[action=filtrar]': {
            	click: this.btStoreLoadFielter
            },
            'tb_clienteslist button[action=adicionar]': {
                click: this.add
            },
            'tb_clienteslist button[action=editar]': {
                click: this.btedit
            },
            'tb_clienteslist button[action=ativar_desativar]': {
                click: this.btAtivarDesativar
            },            
            'tb_clienteslist button[action=gerar_pdf]': {
                click: this.gerarPdf
            },
            'addtb_clienteswin button[action=salvar]': {
                click: this.update
            },
            'addtb_clienteswin button[action=resetar]': {
                click: this.reset
            },
            'addtb_clienteswin form fieldcontainer combobox': {
                change: this.enableButton,
				render: this.comboLoad
            },
            'addtb_clienteswin form fieldcontainer button[action=reset_combo]': {
                click: this.resetCombo
            },
			'addtb_clienteswin form fieldcontainer button[action=add_win]': {
                click: this.getAddWindow
            },
            'filtertb_clienteswin form fieldcontainer combobox': {
                change: this.enableButton,
				render: this.comboLoad
            },
            'filtertb_clienteswin button[action=resetar_filtro]': {
                click: this.resetFielter
            },
            'filtertb_clienteswin button[action=filtrar_busca]': {
                click: this.setFielter
            },
            'filtertb_clienteswin': {
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
                url: 'server/modulos/tb_clientes/save.php',
                params: {
                    action: 'ATIVAR_DESATIVAR',
                    cli_codigo: record.get('cli_codigo'),
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
		window.open('server/modulos/tb_clientes/pdf.php?'+
			Ext.Object.toQueryString(me.getList().store.proxy.extraParams)
		);
	},
	
    edit: function(grid, record) {
    	var me = this;
		me.getDesktopWindow('AddTb_ClientesWin', 'Tb_Clientes', 'tb_clientes.Edit', function(){
    		me.getAddWin().setTitle('Edi&ccedil;&atilde;o de Tb_Clientes');
	        me.getValuesForm(me.getForm(), me.getAddWin(), record.get('cli_codigo'), 'server/modulos/tb_clientes/list.php');
	        Ext.getCmp('action_tb_clientes').setValue('EDITAR');
    	});
    },

    del: function(grid, record, button) {
     	var me = this;
     	me.deleteAjax(grid, 'tb_clientes', {
			action: 'DELETAR',
			id: record.get('cli_codigo')
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

			Ext.Msg.confirm('Confirmar', 'Deseja deletar: '+record.get('cli_codigo')+'?', function(btn){
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
        me.getDesktopWindow('Tb_Clientes', 'Tb_Clientes', 'tb_clientes.Edit', false);
    },

    update: function(button) {
    	var me = this;
		me.saveForm(me.getList(), me.getForm(), me.getAddWin(), button, false, false);
    },

    btStoreLoadFielter: function(button){
		var win = this.getFilterWin();
    	if(!win) var win = Ext.create('ShSolutions.view.tb_clientes.Filtro', {
    		animateTarget: button.getEl()
    	});
    	win.show();
    }

});
