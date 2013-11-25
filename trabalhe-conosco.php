<!-- TOPO -->
<?php 
include_once 'header.php'; 

//print $_FILES["arquivo_pdf"]["size"] ;
if(isset($_FILES['arquivo_pdf'])){
    @move_uploaded_file($_FILES["arquivo_pdf"]["tmp_name"], "curriculum/" . $_FILES["arquivo_pdf"]["name"]);     
}
/*$allowedExts = array("pdf", "doc", "docx"); 
$extension = end(explode(".", $_FILES["arquivo_pdf"]["name"]));

if ( ( ($_FILES["arquivo_pdf"]["type"] == "application/msword") || ($_FILES["arquivo_pdf"]["type"] == "text/pdf") ) 
&& ($_FILES["arquivo_pdf"]["size"] < 20000) && in_array($extension, $allowedExts))
{      
    move_uploaded_file($_FILES["arquivo_pdf"]["tmp_name"], "curriculum/" . $_FILES["arquivo_pdf"]["name"]); 
}
else
{
    echo "Invalid file."
}

*/
?> 
<!-- FIM TOPO -->



<!-- CORPO -->
<div id="corpo">

<div id="barra_titulo"><h1>Trabalhe Conosco</h1></div>

<div id="trabalhe-conosco_conteudo">

<h4 style="color:#4674b8;">Liderança, Inovação, Dinamismo e grandes talentos.</h4>
<br />

<p>Estas palavras definem o perfil da Cart e o nosso compromisso com você.</p>
<br />
<p>Quer fazer parte desta equipe?</p>
<br />
<p>As oportunidades de crescer profissionalmente são inúmeras.<br />
Estamos sempre em busca de novos talentos para tornar o nosso time ainda mais forte.<br />
Investimos fortemente em programas de treinamento, por meio do nosso centro de formação e desenvolvimento, com o foco nos principais aspectos técnicos e comportamentais.</p>
<br />

<h4 style="color:#4674b8;">Queremos você em nossa equipe!</h4>
<br />

<form enctype="multipart/form-data" action="trabalhe-conosco.php?action=ENVIA_CURRICULUM" method="POST">
<table border="5" width="450" height="180">

	<tr>
    	<td>
	<label>Nome*:</label>
    	</td>
        <td>
    <input name="nome" type="text" size="35" style="height:25px;" placeholder="Digite aqui seu nome" />
    	</td>
    </tr>
    
    <tr>
    	<td>
    <label>Email*:</label>
    	</td>
        <td>
    <input name="email" type="text" size="35" style="height:25px;" placeholder="seunome@exemplo.com.br" />
    	</td>
    </tr>
    
    <tr>
    	<td>
    <label>Arquivo*:</label>
    	</td>
        <td>
    <input name="arquivo_pdf" type="file" size="40" />
    	</td>
    </tr>
    
    <tr>
    	<td colspan="2">
        <span style="font-size:12px; color:#666;">
        Limite de Upload: 16mb <br />
        Seu Curriculum deve estar no formato ".pdf" <br />
        * Campos Obrigatórios
        </span>
        </td>
    </tr>
    
    <tr>
    	<td colspan="2"><input style="float:right; margin-right:50px; width:90px; background:#4674b8; color:#fff; border:none; margin-bottom:5px; padding-left:5px;		color:#FFF; border-top-right-radius:5px; height:25px;" type="submit" value="Enviar" /></td>
    </tr>
    
</table>
</form>

</div>








</div>
<!-- FIM CORPO -->




<!-- SIDEBAR -->
<?php include_once 'sidebar.php'; ?> 
<!-- FIM SIDEBAR -->


<!-- RODAPÉ -->
<?php include_once 'footer.php'; ?> 
<!-- FIM RODAPÉ -->