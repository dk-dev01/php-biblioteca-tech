<?php
session_start();
$erro_nome = "";
$erro_email = "";
$erro_idade = "";
$erro_sexo = "";
$erro_cpf = "";
$erro_telefone = "";
$erro_cidade = "";
$erro_estado = "";
$erro_endereco = "";
$erro_cep = "";
$erro_validacao = 0;
if (isset($_POST["botao"])) {
	$_SESSION["nome"]  = $_POST["nome"];
	$_SESSION["email"] = $_POST["email"];
	$_SESSION["idade"]  = $_POST["idade"];
    $_SESSION["sexo"]  = $_POST["sexo"];
    $_SESSION["cpf"]  = $_POST["cpf"];
    $_SESSION["telefone"]  = $_POST["telefone"];
    $_SESSION["cidade"]  = $_POST["cidade"];
    $_SESSION["estado"]  = $_POST["estado"];
    $_SESSION["endereco"]  = $_POST["endereco"];
    $_SESSION["cep"]  = $_POST["cep"];


    if ($_SESSION["nome"] == "") {
		$erro_nome = "<span style='color:blue'>Preencha o nome</span>";
		$erro_validacao ++;
    }
    if ($_SESSION["email"] == "") {
        $erro_email = "<span style='color:blue'>Preencha o email</span>";
        $erro_validacao ++;
    }
    if ($_SESSION["idade"] == "") {
        $erro_idade = "<span style='color:blue'>Preencha a idade</span>";
        $erro_validacao ++;
    }
    if (($_SESSION["sexo"] != "M") && ($_SESSION["sexo"] != "F")) {
    $erro_sexo = "<span style='color:blue'>Preencha o sexo com M ou F</span>";
    $erro_validacao++;
    }

    if (($_SESSION["cpf"] == "") ){
        $erro_cpf = "<span style='color:blue'>Preenchimento inválido ! Digite Apenas números</span>";
        $erro_validacao ++;
    }
    if (($_SESSION["telefone"] == "") ){
        $erro_telefone = "<span style='color:blue'>Preenchimento inválido ! Digite Apenas 11 números</span>";
        $erro_validacao ++;
    }
    if (($_SESSION["cidade"] == "") ){
        $erro_cidade = "<span style='color:blue'>Preencha a cidade</span>";
        $erro_validacao ++;
    }
    if (($_SESSION["estado"] == "") ){
        $erro_estado = "<span style='color:blue'>Preencha o estado</span>";
        $erro_validacao ++;
    }
    if (($_SESSION["endereco"] == "") ){
        $erro_endereco = "<span style='color:blue'>Preencha o endereco</span>";
        $erro_validacao ++;
    }
    if (($_SESSION["cep"] == "") ){
        $erro_cep = "<span style='color:blue'>Preencha o cep</span>";
        $erro_validacao ++;
    }
    if ($erro_validacao == 0) {
        header("Location: etapa3.php");
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-etapa2.css">
    <title>Biblioteca tech</title>
</head>
<body>
	
	<form method="POST" action="etapa-2.php"> <br/><br/>
        <h2 align="center">DADOS DO CLIENTE</h2>
		Nome:  <input type="text" name="nome" size="60" maxlength="50" minlength="5"
		value="<?php if (isset($_SESSION["nome"])) echo $_SESSION["nome"] ?>">
		<?php echo $erro_nome ?> 
		<br/>

        Email:  <input type="email" name="email" size="30" maxlength="30" minlength="10"
		value="<?php if (isset($_SESSION["email"])) echo $_SESSION["email"] ?>">
		<?php echo $erro_email ?> 
		<br/>

        Idade:  <input type="number" name="idade" size="20" maxlength="2" minlength="2"
        value="<?php if (isset($_SESSION["idade"])) echo $_SESSION["idade"] ?>">
        <?php echo $erro_idade ?> 
        <br/>

        Sexo (M/F): <input type="text" name="sexo" size="2" maxlength="2" 
		value="<?php if (isset($_SESSION["sexo"])) echo $_SESSION["sexo"] ?>">
		<?php echo $erro_sexo ?>
        <br/>


        CPF:  <input type="number" name="cpf" size="20" maxlength="11" minlength="11"
        value="<?php if (isset($_SESSION["cpf"])) echo $_SESSION["cpf"] ?>">
        <?php echo $erro_cpf ?> 
        <br/>

        Telefone:  <input type="number" name="telefone" size="20" maxlength="11" minlength="11" placeholder="Apenas números"
        value="<?php if (isset($_SESSION["telefone"])) echo $_SESSION["telefone"] ?>">
        <?php echo $erro_telefone ?> 
        <br/>

        Cidade:  <input type="text" name="cidade" size="40" maxlength="35"
        value="<?php if (isset($_SESSION["cidade"])) echo $_SESSION["cidade"] ?>">
        <?php echo $erro_cidade ?> 
        <br/>

        Estado:  <input type="text" name="estado" size="2" maxlength="2" minlength="2" style="text-transform: uppercase"
        value="<?php if (isset($_SESSION["estado"])) echo $_SESSION["estado"] ?>">
        <?php echo $erro_estado ?> 
        <br/>

        Endereço: <input type="text" name="endereco" size="60" maxlength="50" 
        value="<?php if (isset($_SESSION["endereco"])) echo $_SESSION["endereco"] ?>"> 
        <?php echo $erro_endereco?>
        <br/>

        CEP:  <input type="number" name="cep" size="20" maxlength="8" minlength="8" placeholder="Apenas números"
        value="<?php if (isset($_SESSION["cep"])) echo $_SESSION["cep"] ?>">
        <?php echo $erro_cep ?> 
        <br/>


        <br/><br/>
        <input type="submit" value="Next" name="botao">
    </form>
</body>
</html>