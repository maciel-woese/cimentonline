
<div id="clear"> </div>
<!-- RODAPÉ -->
<div id="footer">
<hr />

<div id="footer_menu">
	<ul>
    	<a href="index.php"><li>Início</li></a>
        <a href="pesquisa.php"><li>Pesquisa</li></a>
        <?php

        if(!empty($_SESSION["login"]))
        {
        }
        else
        {
        
          echo '<a href="cadastro.php"><li>Cadastre-se</li></a>';
        }

        ?>
        <a href="loja.php"><li>Anuncie</li></a>

        <?php
        if(!empty($_SESSION['tipo']))
        {
          if($_SESSION["tipo"] == 2){
            $meuPainel = '';
            $minhasCotacoes = 'none';
            echo '<a href="meu-painel.php?idmenu=cotacoes"><li>Meu Painel</li></a>';
          }
          else
          {
            $meuPainel = 'none';
            $minhasCotacoes = '';
            echo '<a href=""><li>Minhas Cotações</li></a>';
          }
        }
        else
        {
          $meuPainel = 'none';
          $minhasCotacoes = '';
          echo '<a href=""><li>Minhas Cotações</li></a>';
        }

        ?> 

        <a href="quem-somos.php"><li>Institucional</li></a>
        <a href="contato.php"><li>Contato</li></a>
        <a href="trabalhe-conosco.php"><li>Trabalhe Conosco</li></a>
    </ul>
</div>

<div id="footer_logo"><a href="index.php"><img src="img/logo_rodape.png" /></a></div>

</div>
<!-- FIM RODAPÉ -->



<!-- FIM CONTEÚDO -->
</div></div>
</body>
</html>
