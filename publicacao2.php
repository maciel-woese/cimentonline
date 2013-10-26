<!-- TOPO -->
<?php include_once 'header.php'; ?> 
<!-- FIM TOPO -->

<?php 
$nome = $_POST['nome-empresa'];
$endereco = $_POST['endereco-empresa'];
$discricao = $_POST['discricao-empresa'];
$logo = $_POST['logo-empresa'];
?>



<!-- FIM SCRIPT DE UF/CIDADES -->


<hr style="height:3px; border:none; background:#4674B8; margin:10px 0 20px 0;" />

<!-- CORPO -->
<div id="corpo-compra">

<div class="carrinho_etapa-5"></div>

<br /><br />

	<div id="bloco_cliente">
        
        <img src="clientes/cliente1/logo.png" title="Cliente 001" />
                     
    	<div class="text_dados">
    		<h2 style="width:500px;"><?php echo $nome; ?></h2>
    		<h4 style="width:500px;"><?php echo $endereco; ?> </h4>
    	<hr />
    		<p style="width:500px;"><?php echo $discricao; ?></p>             
    	</div>
        
    </div>
                
    <div id="corpo-form-publicacao">
    
    <fieldset>
    <legend><h3>Dados a serem publicados</h3></legend>
    
    	<form name="" method="post" action="publicacao2.php" style="margin:0 auto; width:500px;">
        	
            <div class="label-title">Nome da Empresa:</div>
            <input name="nome-empresa" type="text" size="40" placeholder="<?php echo $nome; ?>" required="required" /><br />
            
            <div class="label-title">Endereço Completo:</div>
            <textarea name="endereco-empresa" type="text" cols="32" rows="3" placeholder="<?php echo $endereco; ?>" 
            required="required" ></textarea><br />
            
            <div class="label-title">Apresentação da Empresa:</div>
            <textarea name="discricao-empresa" type="text" cols="32" rows="5" placeholder="<?php echo $discricao; ?>" style="resize:none;" required="required" ></textarea><br />
            
            <div class="label-title">Logotipo da Empresa:</div>
            <input name="logo-empresa" type="file" style="padding:2px 3px; width:273px; height:21px;" accept="image/jpeg" required="required" /><br />
        	
            <input class="btn-publicar" type="submit" value="Atualizar" />
        
        </form>
        
    </fieldset>
    </div>    
                
                

    
</div>
<!-- FIM CORPO -->







<!-- RODAPÉ -->
<?php include_once 'footer.php'; ?> 
<!-- FIM RODAPÉ -->