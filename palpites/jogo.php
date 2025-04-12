<?php

    require_once("model/Moto.php");
    require_once("model/Carro.php");

    $moto1 = new Moto();
    $moto2 = new Moto();
    $moto3 = new Moto();

    $carro1 = new Carro();
    $carro2 = new Carro();
    $carro3 = new Carro();

    $motos = [
        $moto1->setNome("Yamaha MT-09")->setLink("https://www.webmotors.com.br/rbx/_next/image?url=https%3A%2F%2Fimage.webmotors.com.br%2F_fotos%2Fanunciousados%2Fgigante%2F2025%5C202503%5C20250329%5Cyamaha-mt09-WMIMAGEM12021123548.jpg&w=256&q=75"),
        $moto2->setNome("Bajaj 400")->setLink("https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202504/20250410/bajaj-dominar-400-wmimagem13442739532.webp?s=fill&w=552&h=414&q=60"),
        $moto3->setNome("Kawasaki Ninja 400")->setLink("https://www.webmotors.com.br/rbx/_next/image?url=https%3A%2F%2Fimage.webmotors.com.br%2F_fotos%2Fanunciousados%2Fgigante%2F2023%5C202303%5C20230319%5Ckawasaki-ninja-650-abs-WMIMAGEM11232158884.jpg&w=256&q=75")
    ];

    $carros = [
        $carro1->setNome("Toyota Corolla")->setLink("https://www.webmotors.com.br/rbx/_next/image?url=https%3A%2F%2Fimage.webmotors.com.br%2F_fotos%2Fanunciousados%2Fgigante%2F2025%5C202503%5C20250305%5CTOYOTA-COROLLA-2.0-VVTIE-FLEX-ALTIS-PREMIUM-DIRECT-SHIFT-wmimagem11085371392.jpg&w=256&q=75"),
        $carro2->setNome("Mazda MX-5")->setLink("https://www.webmotors.com.br/rbx/_next/image?url=https%3A%2F%2Fimage.webmotors.com.br%2F_fotos%2Fanunciousados%2Fgigante%2F2025%5C202502%5C20250213%5Cmazda-mx5-1.8-miata-conversivel-16v-gasolina-2p-manual-WMIMAGEM22071842754.jpg&w=256&q=75"),
        $carro3->setNome("Honda Civic")->setLink("https://www.webmotors.com.br/rbx/_next/image?url=https%3A%2F%2Fimage.webmotors.com.br%2F_fotos%2Fanunciousados%2Fgigante%2F2025%5C202504%5C20250402%5CHONDA-CIVIC-2.0-16V-FLEXONE-LX-4P-CVT-wmimagem21511410140.jpg&w=256&q=75")
    ];

    $sorteio = rand(0, 2);

    if(isset($_GET['palpite'])){
        if($_GET['palpite'] == 0 || $_GET['palpite'] == 1 || $_GET['palpite'] == 2) {
            if(isset($_GET['config'])) {
                if ($_GET['config'] == 'M' || $_GET['config'] == 'C') {
                    if ($_GET['config'] == 'M'){
                        $objetos = $motos;
                        $tipo = "a moto";
                    } else {
                        $objetos = $carros;
                        $tipo = "o carro";
                    }

                    $palpite = $_GET['palpite'];
                    $resposta = $objetos[$sorteio];

                    if($palpite == $sorteio){
                        echo "<h1>Você acertou!</h1>";
                        echo "<p>Você adivinhou $tipo: " . $resposta->getNome() . "</p>";
                        echo "<img src='" . $resposta->getLink() . "' width='300'>";
                    } else {
                    echo "<h1>Você errou!</h1>";
                    echo "<p>Seu palpite: " . $objetos[$palpite]->getNome() . "</p>";
                    echo "<p>Dica do correto: A primeira letra d$tipo era " . $resposta->getNome()[0] . "</p>";
                    echo "<p>Imagem do correto:</p>";
                    echo "<img src='" . $resposta->getLink() . "' width='300'>";
                    }

                echo "<br><a href='jogo.php?palpite=0&config=" . $_GET['config'] . "'>Tentar palpite 1</a> | ";
                echo "<a href='jogo.php?palpite=1&config=" . $_GET['config'] . "'>Tentar palpite 2</a> | ";
                echo "<a href='jogo.php?palpite=2&config=" . $_GET['config'] . "'>Tentar palpite 3</a>";
                echo "<br><br><a href='jogo.php'>Voltar</a>";

                } else {
                    echo "O parâmetro 'config' deve ser igual a 'M' ou 'C'";
                }
            } else {
                echo "O parâmetro 'config' deve estar preenchido!";
            }
        } else {
            echo "O parâmetro 'palpite' deve ser um número de 0 a 2!";
        }
    } else {
        echo "<h2>Escolha um tipo e faça seu palpite:</h2>";
        echo "<p>Motos:</p>";
        echo "<a href='jogo.php?palpite=0&config=M'>Palpite 1</a> | ";
        echo "<a href='jogo.php?palpite=1&config=M'>Palpite 2</a> | ";
        echo "<a href='jogo.php?palpite=2&config=M'>Palpite 3</a>";
        echo "<p>Carros:</p>";
        echo "<a href='jogo.php?palpite=0&config=C'>Palpite 1</a> | ";
        echo "<a href='jogo.php?palpite=1&config=C'>Palpite 2</a> | ";
        echo "<a href='jogo.php?palpite=2&config=C'>Palpite 3</a>";
    }