<?php
session_start();
 
$ef = "";
$erro = 0;
 
if (isset($_POST["next"])) {
    $_SESSION["f"] = $_POST["f"];
    $_SESSION["p"] = $_POST["p"];
 
    # validando
    if ($_SESSION["f"] == "") {
        $ef = "<span style='color:red'> Selecione uma Opção</span>";
        $erro++;
    }
 
    if ($erro == 0) {
        header("location:confirma.php");
        exit;
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo-etapa4.css">
    <title>FINALIZAÇÃO</title>
</head>
<body>
    <form method="POST" action="etapa4.php">
        <legend><h2>FINALIZAÇÃO DE PEDIDO</h2></legend>
        <fieldset style="width: 80%">
            <h3>FORMA DE PAGAMENTO</h3>
            <select name="p">  
                <option value="1" selected> Pix - 10% desconto </option>
                <option value="2"> Boleto - 5% desconto </option>
                <option value="3"> Cartão de Crédito - À vista </option>
                <option value="4"> Cartão de Crédito - 3x com 5% juros</option>
                <option value="5"> Cartão de Crédito - 6x com 10% juros</option>
            </select>
<br><br>
            <h3>ENTREGA</h3>
            <input type="radio" name="f" value="1"> Frete Básico - R$5,00 <br>
            <input type="radio" name="f" value="2"> Frete Rápido - R$10,00 <br>
            <input type="radio" name="f" value="3"> Frete Premium - R$25,00 <br>
            <input type="radio" name="f" value="4"> Sem Frete - Escolhi E-book <br>
            <?php echo $ef ?>
<br><br>
            <button type="submit" name="next"> Next </button>
        </fieldset>
    </form>
</body>
</html>
 