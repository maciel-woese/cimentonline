<!-- TOPO -->
<?php 
require_once 'includes/configure.inc.php';

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

                case 'REDEFINIR_SENHA':
                     if(isset($_POST['senha']) && isset($_POST['c-senha']) ){
                        $action    =  $_POST['action'];
                        if($_POST['senha'] == $_POST['c-senha']){
                            if(isset($_POST['redId'])){
                                $msg = $usuarios->alterarSenha($_POST['redId'], $_POST['senha']);
                                if($msg == 'OK'){
                                    echo '<div id="barra_titulo"><h1 style="font-size:16px; text-align:center">Senha Alterada com Sucesso. </div>';
                                    header('Localização: index.php');   
                                }else{
                                    echo '<div id="barra_titulo"><h1 style="font-size:16px; text-align:center">Erro ao redefinir senha. </div>';
                                }
                            }else{
                                echo '<div id="barra_titulo"><h1 style="font-size:16px; text-align:center">Chave de alteração de Senha Invalida. </div>';
                            }
                        }else{
                            echo '<div id="barra_titulo"><h1 style="font-size:16px; text-align:center">Senhas não conferem. </div>';
                        }
                     }else{ 
                        echo '<div id="barra_titulo"><h1 style="font-size:16px; text-align:center">Todos os campos são obrigatorio. </div>';
                    }
                break;
            }
        ?>
