<!-- TOPO -->
<?php 
include_once 'header.php'; 
?> 
<!-- FIM TOPO -->
</script>


<hr style="height:3px; border:none; background:#4674B8; margin:10px 0 20px 0;" />

<!-- CORPO -->
<div id="corpo-compra">

	<div id="corpo_login">
        
        <br /><br />
        
        <?php 
            if(isset($_POST['action']))   $action    =  $_POST['action'];
            if(isset($_GET['action']))    $action    =  $_GET['action'];

            switch($action){
                
                case 'JACADASTRADO':
                    echo '<div id="barra_titulo"><h1 style="font-size:16px; text-align:center">Este email já estar cadastrado. Efetue o login. </div>';
                break;

                case 'USUCADASTRADOCOMSUCESSO':
                    echo '<div id="barra_titulo"><h1 style="font-size:16px; text-align:center">Usuário Cadastrado com Sucesso. Efetue o login. </div>';
                break;

                case 'FORCADASTRADOCOMSUCESSO':
                    echo '<div id="barra_titulo"><h1 style="font-size:16px; text-align:center">Usuário Cadastrado com Sucesso. Efetue o login. </div>';
                break;
            }
        ?> 

        <div class="ident-login">
        	<h3>Digite sua Nova Senha</h3>
            <div class="form-ident-login">
            <img class="icon-ident-login" src="css/img/icons/Senha-icon.png" />
            <form method="POST" action="logar.php">
            <label>Nova Senha:</label><br />
            <input name="senha" type="password" size="30" placeholder="Digite aqui sua nova senha" required="required" /><br />
            <img class="icon-ident-senha" src="css/img/icons/Senha-icon.png" />
            <label>Confirme sua Senha:</label><br />
            <input name="c-senha" type="password" size="20" placeholder="Confirme sua senha" required="required" /><br />
            <input class="btn-ident-login" type="submit" value="Redefinir" />
            </div>             
        </div>
      
	</div>
    
</div>
<!-- FIM CORPO -->



<!-- RODAPÉ -->
<?php include_once 'footer.php'; ?> 
<!-- FIM RODAPÉ -->