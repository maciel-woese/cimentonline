<?php 

$arquivo = 'arquivo.pdf';
$extensao = pathinfo($arquivo, PATHINFO_EXTENSION);
 
echo $extensao;

// Verifica se o campo PDF está vazio
if ($_FILES['pdf']['name'] != "") {

// Caso queira mudar o nome do arquivo basta descomentar a linha abaixo e fazer a modificação
//$_FILES['pdf']['name'] = "nome_do_arquivo.pdf";

// Move o arquivo para uma pasta
move_uploaded_file($_FILES['pdf']['tmp_name'],"PASTA/".$_FILES['pdf']['name']);

// $pdf_path é a variável que guarda o endereço em que o PDF foi salvo (para adicionar na base de dados)
$pdf_path = "PASTA/".$_FILES['pdf']['name'];

} else {
// Caso seja falso, retornará o erro
 echo "Não foi possível enviar o arquivo";
}

?>