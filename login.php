<!-- TOPO -->
<?php 
include_once 'header.php'; 

if(isset($_POST['REDEFINIR_SENHA']))   $REDEFINIR    =  $_POST['REDEFINIR_SENHA'];
            if(isset($_GET['REDEFINIR_SENHA']))    $REDEFINIR    =  $_GET['REDEFINIR_SENHA'];
?> 
<!-- FIM TOPO -->
</script>

<!-- STYLE LIGHTBOX -->
    <style>
        .black_overlay{display:none; position:fixed; top:0%; left:0%; width:100%; height:100%; background-color:#4674b8; z-index:1001;
                        -moz-opacity:0.3; opacity:.30; filter:alpha(opacity=30);}
        .white_content{display:none; position:absolute; top:70%; left:38%; width:320px; height:auto; padding:16px; border:5px solid #4674b8;
                        border-radius:0 50px 0 50px; box-shadow:0 0 10px #000; background-color:white; z-index:1002; overflow:none;}
        .white_content label{font:14px "Trebuchet MS", Arial, Helvetica, sans-serif; color:#4674b8; margin-right:10px;}
        .white_content input{height:21px; padding:2px;}
    </style>
<!-- FIM STYLE LIGHTBOX -->

<hr style="height:3px; border:none; background:#4674B8; margin:10px 0 20px 0;" />

<!-- CORPO -->
<div id="corpo-compra">

    <div id="corpo_login">
        
        <br /><br />
        
        <?php 
            if(isset($_POST['REDEFINIR_SENHA']))   $REDEFINIR    =  $_POST['REDEFINIR_SENHA'];
            if(isset($_GET['REDEFINIR_SENHA']))    $REDEFINIR    =  $_GET['REDEFINIR_SENHA'];

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
            <h3>Efetuar Login</h3>
            <div class="form-ident-login">
            <img class="icon-ident-login" src="css/img/icons/Login-icon.png" />
            <form name="" method="POST" action="logar.php">
                <label>Email/Login:</label><br />
                <input name="login" type="email" size="30" placeholder="seunome@exemplo.com.br" required="required" /><br />
                <img class="icon-ident-senha" src="css/img/icons/Senha-icon.png" />
                <label>Senha/Chave:</label><br />
                <input name="senha" type="password" size="20" placeholder="Digite aqui sua senha" required="required" /><br />
                <a href="javascript:void(0)" onclick="document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">Esqueceu a senha?</a>
                <input class="btn-ident-login" type="submit" value="Acessar" />
            </form>
            </div>             
        </div>
      
    </div>
    
</div>
<!-- FIM CORPO -->


<!-- // LIGHTBOX -->
    <div id="light" class="white_content">
        
        
        <div class="r-senha">
            <h3>Redefinir Senha</h3>
            <div class="form-r-senha">
            <img class="icon-r-senha-email" src="css/img/icons/email-icon.png" />
            <form name=""  method="POST" action="">
                <label>Seu Email:</label><br />
                <input name="REDEFINIR_SENHA" type="email" size="30" placeholder="seunome@exemplo.com.br" required="required" /><br />
                <input class="btn-ident-login" type="submit" value="Enviar" />
            </form>
            </div>             
        </div>
        
    </div>

    <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">
    <div id="fade" class="black_overlay"></div></a>
<!-- FIM LIGHTBOX // -->




<!-- RODAPÉ -->
<?php include_once 'footer.php'; ?> 
<!-- FIM RODAPÉ -->