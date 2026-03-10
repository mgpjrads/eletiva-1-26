<?php

    date_default_timezone_set('America/Sao_Paulo');
    $data = date("d/m/Y H:i:s"); // Y 4 digitos e y 2 digitos  H- 24horas
    echo "<p>$data</p>";
    
    $valor = 15555.88888; // não usar virgula direto no php - usar ponto
    $valor_arredondado = round($valor);
    echo "$valor";
    echo "<p>$valor_arredondado";
    $valor_formatado = number_format($valor, 2, ",", ".");
    echo "<p> $valor_formatado";

    $exp = pow(4, 1); // Exponenciação 

    $raiz = sqrt(16); // Raiz quadrada

    $aleatorio = rand(1, 100); // números aleatórios

    if(isset($nome)){

        echo "<p> nome informado";
        }
    else{
        echo "<p> Nome não informado";
        die();
        }

    if(is_float($valor))
    {
        echo "<p> É um número flutuante! </p>";
    }

?>