<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-confirma.css">
    <title>Biblioteca tech</title>
</head>
<body>
    <?php
    	// recebendo dados - etapa 1
		$nome=$_SESSION["nome"]; 
		$cpf=$_SESSION["cpf"]; 
		$sexo=$_SESSION["sexo"]; 
		$telefone=$_SESSION["telefone"];
        $email=$_SESSION["email"];
        $estado=$_SESSION["estado"];
        $cidade=$_SESSION["cidade"];
        $endereco=$_SESSION["endereco"];
        $cep=$_SESSION["cep"];
        $f = $_SESSION["f"];
        $p = $_SESSION["p"];
        

    	#etapa3
        $l1 = $_SESSION["l1"];
        $tipo1 = $_SESSION["tipo1"];
        $l2 = $_SESSION["l2"];
        $tipo2 = $_SESSION["tipo2"];
        $com = $_SESSION["com"] ?? [];;

        # livro 1
        if ($l1 == 1) {
        $l1 = "SISTEMA DE BANCO DE DADOS - 7° EDIÇÃO";
        } elseif ($l1 == 2) {
        $l1 = "JAVA PARA LEIGOS - 5 EDIÇÃO";
        } else {
        $l1 = "CIBERSEGURANÇA: O GUIA DEFINITIVO";
        }

        # tipo 1
        $sub1=0;
        if ($tipo1 == 1) {
        $sub1=329.99;
        $tipo1 = "Versão Física Básica";
        } elseif ($tipo1 == 2) {
        $sub1=379.99;
        $tipo1 = "Versão Física Capa Dura";
        } elseif ($tipo1 == 3) {
        $sub1=429.99;
        $tipo1 = "Versão Física Premium";
        } else {
        $sub1=149.99;
        $tipo1 = "Versão E-book";
        }

        # livro 2
        if ($l2 == 0) {
            $l2 = "NENHUM";
        }
        elseif ($l2 == 1) {
            $l2 = "FUNDAMENTOS MATMÁTICOS - CIÊNCIA DA COMPUTAÇÃO";
        } elseif ($l2 == 2) {
            $l2 = "FUNDAMENTOS DE SISTEMAS OPERACIONAIS";
        } else {
            $l2 = "ENTENDENDO ALGORITMOS";
        }

        # tipo 2
        $sub2=0;
        if ($tipo2 == 1) {
        $sub2=269.99;
        $tipo2 = "Versão Física Básica";
        } elseif ($tipo2 == 2) {
        $sub2=299.99;
        $tipo2 = "Versão Física Capa Dura";
        } elseif ($tipo2 == 3) {
        $sub2=319.99;
        $tipo2 = "Versão Física Premium";
        } elseif ($tipo2 == 4){
        $sub2=99.99;
        $tipo2 = "Versão E-book";
        }
        else{
            $sub2=0;
            $tipo2="Nenhum";
        }

        #complemento
        $sub3 = 0;
        

        if (in_array(1, $com)) {
        $sub3 += 20.00;
        $com[] = "Capa do Livro";
        }
        if (in_array(2, $com)) {
        $sub3 += 10.00;
        $com[] = "Marca Página";
        }
        if (in_array(3, $com)) {
        $sub3 += 5.00;
        $com[] = "Adesivos";
        }
        if (empty($com) || in_array(4, $com)) {
        $com[] = "Nenhum";
        }

        # Calcular

        $subtotal = $sub1 + $sub2 + $sub3;

        

        # Frete
        if ($f == 1) {
        $frete = 5.00;
        $tipo_frete = "Normal";
        } elseif ($f == 2) {
        $frete = 10.00;
        $tipo_frete = "Rápido";
        } elseif ($f == 3) {
        $frete = 25.00;
        $tipo_frete = "Express";
        } else {
        $frete =0.0;
        $tipo_frete = "SEm Frete - Escolhi E-book";
        }


        $total = $subtotal + $frete;

        # Pagamento
        if ($p == 1) {
        $vt = $total * 0.9;
        $pagamento = "PIX (10% de desconto)";
        } elseif ($p == 2) {
        $vt = $total * 0.95;
        $pagamento = "Débito (5% de desconto)";
        } elseif ($p == 3) {
        $vt = $total;
        $pagamento = "Crédito à vista";
        } elseif ($p == 4) {
        $vt = $total * 1.05;
        $pagamento = "Crédito 2x (5% de juros)";
        } else {
        $vt = $total * 1.1;
        $pagamento = "Crédito 3x ou mais (10% de juros)";
        }

        
# Exibir tudo
 
    echo "<h2> Dados do Cliente</h2>";
    echo "Nome: $nome <br>";
    echo "CPF: $cpf <br>";
    echo "Email: $email <br>";
    echo "Telefone: $telefone <br>";
    echo "Cidade: $cidade <br>";
    echo "Estado: $estado <br>";
    echo "Endereço: $endereco <br>";
    echo "CEP: $cep <br>";
 
    echo "<h2> Produtos Selecionados</h2>";
    echo "<strong>Livro 1:</strong> $l1 - $tipo1 - R$ " . number_format($sub1, 2, ',', '.') . "<br>";
    echo "<strong>Livro 2:</strong> $l2 - $tipo2 - R$ " . number_format($sub2, 2, ',', '.') . "<br>";
 
    // Exibir complementos
    if (empty($com)) {
        echo "<strong>Complementos:</strong> Nenhum<br>";
    } else {
        echo "<strong>Complementos:</strong> " . implode(", ", $com) . " - R$ " . number_format($sub3, 2, ',', '.') . "<br>";
    }
 
    echo "<h2> Frete</h2>";
    echo "Tipo de entrega: $tipo_frete - R$ " . number_format($frete, 2, ',', '.') . "<br>";
 
    echo "<h2> Forma de Pagamento</h2>";
    echo "Método: $pagamento<br>";
 
    echo "<h1> TOTAL A PAGAR: R$ " . number_format($vt, 2, ',', '.') . "</h1><br>";

    echo "<a href='index.php' class='voltar'>VOLTAR AO INÍCIO</a>";
    ?>
 
 