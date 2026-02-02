<?php 
session_start();

$etipo1 = "";
$etipo2 = "";
$ecom = "";
$erro = 0;

if(isset($_POST["next"])) {
    $_SESSION["l1"] = $_POST["l1"] ?? "";
    $_SESSION["tipo1"] = $_POST["tipo1"] ?? "";
    $_SESSION["l2"] = $_POST["l2"] ?? "";
    $_SESSION["tipo2"] = $_POST["tipo2"] ?? "";
    $_SESSION["com"] = $_POST["com"] ?? [];

    # validações
    if($_SESSION["tipo1"] == ""){
        $etipo1 = "<span class='erro'> Selecione uma Opção para Livro Principal</span>";
        $erro++;
    }
    if($_SESSION["l2"] != "0" && $_SESSION["tipo2"] == ""){
        $etipo2 = "<span class='erro'> Selecione uma Opção para Livro Secundário</span>";
        $erro++;
    }
    if(empty($_SESSION["com"])){
        $ecom = "<span class='erro'> Selecione pelo menos uma opção</span>";
        $erro++;
    }

    if($erro == 0){
        header("location:etapa4.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIVROS-TEC</title>
    <link rel="stylesheet" href="css/style-etapa3.css">
</head>
<body>
    <form method="POST" action="etapa3.php" class="form-container">
        <h1>Escolha seu Livro</h1>

        <div class="box">
            <h3>Livro Principal</h3>
            <select name="l1">
                <option value="">Selecione um Livro</option>
                <option value="1">Sistema de Banco de Dados - 7ª Edição</option>
                <option value="2">Java Para Leigos - 5ª Edição</option>
                <option value="3">Cibersegurança: O Guia Definitivo</option>
            </select>

            <br><br>
            <label><input type="radio" name="tipo1" value="1"> Versão Física Básica - R$329,99</label><br>
            <label><input type="radio" name="tipo1" value="2"> Versão Física Capa Dura - R$379,99</label><br>
            <label><input type="radio" name="tipo1" value="3"> Versão Física Premium - R$429,99</label><br>
            <label><input type="radio" name="tipo1" value="4"> Versão E-book - R$149,99</label><br>
            <?php echo $etipo1 ?>
        </div>

        <div class="box">
            <h3>Livro Secundário</h3>
            <select name="l2">
                <option value="0">Nenhum</option>
                <option value="1">Fundamentos Matemáticos - Ciência da Computação</option>
                <option value="2">Fundamentos de Sistemas Operacionais</option>
                <option value="3">Entendendo Algoritmos</option>
            </select>

            <br><br>
            <label><input type="radio" name="tipo2" value="1"> Versão Física Básica - R$269,99</label><br>
            <label><input type="radio" name="tipo2" value="2"> Versão Física Capa Dura - R$299,99</label><br>
            <label><input type="radio" name="tipo2" value="3"> Versão Física Premium - R$319,99</label><br>
            <label><input type="radio" name="tipo2" value="4"> Versão E-book - R$99,99</label><br>
            <label><input type="radio" name="tipo2" value="5" checked> Nenhum</label><br>
            <?php echo $etipo2 ?>
        </div>

        <div class="box">
            <h3>Complementos</h3>
            <label><input type="checkbox" name="com[]" value="1"> Capa de Livro - R$20,00</label><br>
            <label><input type="checkbox" name="com[]" value="2"> Marca Página - R$10,00</label><br>
            <label><input type="checkbox" name="com[]" value="3"> Adesivos - R$5,00</label><br>
            <label><input type="checkbox" name="com[]" value="4" checked> Nenhum</label><br>
            <?php echo $ecom ?>
        </div>

        <div class="botao">
            <a href="etapa2.php" class="voltar">Retroceder</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" name="next">Prosseguir</button>
        </div>
    </form>
</body>
</html>
