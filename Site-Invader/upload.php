<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Formulário</title>
<link href="estilo/estilo_form.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="Imagens/logo.png" type="image/x-icon\" />
</head>
<body>

<?php
$target_dir = "Uploads/";
$target_file = $target_dir . basename($_FILES["arquivoParaUpload"]["name"]);
$uploadOk = 1;
$imagemFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Verifica se o arquivo de imagem é mesmo uma imagem ou não
if(isset($_POST["uploadImagem"])) {
	$check = getimagesize($_FILES["arquivoParaUpload"]["tmp_name"]);
	if($check !== false) {
		echo "<br><br><br><br><br><br><br><br> <center><p class='stphp'> O arquivo é uma imagem - ".$check["mime"] . ".</p></center>";
		$uploadOk = 1;
	} else {
		echo "<br><center> <p class='stphp'> O arquivo não é uma imagem.</p></center>";
		$uploadOk = 0;
	}
}

// Verifica se o arquivo é preexistente
if (file_exists($target_file)) {
	echo "<br><center><p class='stphp'> O arquivo já existe.</p></center>";
	$uploadOk = 0;
}

// Verifica o tamanho do arquivo
if ($_FILES["arquivoParaUpload"]["size"] > 500000) {
	echo "<br><center> <p class='stphp'> Seu arquivo é muito grande.</p></center>";
	$uploadOk = 0;
}

// Permite apenas determinados tipos de arquivos de imagem
if($imagemFileType != "jpg" && $imagemFileType != "png" && $imagemFileType != "jpeg" && $imagemFileType != "gif" ) {
	echo "<br><center> <p class='stphp'> Apenas arquivos JPG, JPEG, PNG e GIF são permitidos.</p></center>";
	$uploadOk = 0;
}


// Verifica se a variavel $uploadOk está ajustada para 0 por algum erro

if($uploadOk == 0) {
	echo " <br><center> <p class='stphp'> Desculpe, seu arquivo não foi enviado.</p></center>";
	//se tudo estiver ok, tenta subir o arquivo para o servidor 
} else {
	if (move_uploaded_file($_FILES["arquivoParaUpload"]["tmp_name"], $target_file)) {
		
		
	echo "<br><center> <p class='stphp'> O  arquivo " . basename ( $_FILES["arquivoParaUpload"]["name"]) . " foi enviado.</p></center>";
	
	} else {
		 echo " <br><center> <p class='stphp'> Desculpe, houve um erro ao obter seu arquivo.</p></center>";
	}
	
}

echo " <br><br><br><center> <p class='obg'> Agradecemos seu envio.</p></center>";

?>

<br><br><br><br><br><center><a href="Formulário.html"class="btn" >Voltar</a></center>
<img class="vertical1" src="Imagens/vertical.fw.png" />
<img class="vertical2" src="Imagens/vertical2.fw.png" />

	</body>
</html>
	
	
	
	
	
	


