<!-- TOPO -->
<?php 
include_once 'header.php'; 
require_once 'includes/class/redimensiona.inc.php';

if (isset($_POST['action']) && $_POST['action']=="Publicar"){
    
    $logo = $_FILES['logoEmp'];    
    $redim = new Redimensiona();
    $imgRedimencionada = $redim->Redimensionar($logo, 160, "images");

    $nome = $_POST['nome-empresa'];
    $endereco = $_POST['endereco-empresa'];
    $discricao = $_POST['discricao-empresa'];
        
    $query = $list->db->query("
        insert into tb_anuncios 
        (carrinho_id, nome_empresa, endereco, dsc_apresentacao, logo, su_codigo, dt_cadastro, dt_ativacao) 
        VALUES ({$_SESSION['last_carrinho']}, {$nome}, {$endereco}, {$discricao}, {$imgRedimencionada}, {$_SESSION['codigo']}, NOW(), NOW())
    ");   
}




?> 
<!-- FIM TOPO -->


<!-- FIM SCRIPT DE UF/CIDADES -->


<hr style="height:3px; border:none; background:#4674B8; margin:10px 0 20px 0;" />

<!-- CORPO -->
<div id="corpo-compra">

<div class="carrinho_etapa-5"></div>

<br /><br />


    <?php
    if (isset($_POST['action']) && $_POST['action']=="Publicar"){
    ?>   
	<div id="bloco_cliente">
       <?php 
       echo "<img src=\"$imgRedimencionada\">";
       ?>              
    	<div class="text_dados">
            <h2 style="width:500px;"><?php echo $nome; ?></h2>
            <h4 style="width:500px;"><?php echo $endereco; ?> </h4>
        <hr />
            <p style="width:500px;"><?php echo $discricao; ?></p>             
        </div> 
        
    </div>
    <?php
    }else{
    ?>
    <div id="bloco_cliente">
        
       <img src="clientes/cliente1/logo.png" title="Cliente 001" />
                     
        <div class="text_dados">
            <h2 style="width:500px;">Nome da Empresa LTDA</h2>
            <h4 style="width:500px;">Endereço Completo da Empresa, Cidade - Estado | CEP 00.000-000 </h4>
        <hr />
            <p style="width:500px;">Pequena discrição do institucional da empresa.</p>             
        </div> 
        
    </div>

    <div id="corpo-form-publicacao">
        <fieldset>
        <legend><h3>Dados a serem publicados</h3></legend>
        
            <form method="POST" action="" enctype="multipart/form-data" style="margin:0 auto; width:500px;">
                
                <div class="label-title">Nome da Empresa:</div>
                <input name="nome-empresa" type="text" size="40" placeholder="Nome de sua Empresa" required="required" /><br />
                
                <div class="label-title">Endereço Completo:</div>
                <textarea name="endereco-empresa" type="text" cols="32" rows="3" placeholder="Endereço Completo da Empresa, Cidade - Estado | CEP 00.000-000" 
                required="required" ></textarea><br />
                
                <div class="label-title">Apresentação da Empresa:</div>
                <textarea name="discricao-empresa" type="text" cols="32" rows="5" placeholder="Pequena discrição do institucional da empresa. (Máx.: 170 carácteres)" style="resize:none;" required="required" ></textarea><br />
                
                <div class="label-title">Logotipo da Empresa:</div>
                <input name="logoEmp" type="file" style="padding:2px 3px; width:273px; height:21px;" accept="image/jpeg" required="required" /><br />
                
                <input class="btn-publicar" type="submit" name="action" value="Publicar" />
            
            </form>
            
        </fieldset>
    </div>    
    <?php
    }
    ?>
    
</div>
<!-- FIM CORPO -->







<!-- RODAPÉ -->
<?php include_once 'footer.php'; ?> 
<!-- FIM RODAPÉ -->