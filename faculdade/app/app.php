<?php

require_once __DIR__ . '/src/model/arma.php';
require_once __DIR__ . '/src/model/heroi.php';
require_once __DIR__ . '/src/model/monstro.php';
require_once __DIR__ . '/src/model/resultado.php';
require_once __DIR__ . '/src/model/batalha.php';

use App\Model\Arma;
use App\Model\Heroi;
use App\Model\Monstro;
use App\Model\Batalha;

// Criando Armas disponíveis
$armas = [
    new Arma("Espada Longa", 30, "Corte"),
    new Arma("Arco", 20, "Distância"),
    new Arma("Machado", 40, "Impacto")
];

// Recebendo nome do herói
$nomeHeroi = readline("Digite o nome do seu herói: ");

// Mostrando lista de armas
echo "Escolha uma arma:\n";
foreach ($armas as $i => $arma) {
    echo ($i + 1) . ". {$arma->nome} ({$arma->dano} de dano, tipo: {$arma->tipo})\n";
}

// Escolha da arma
$escolha = (int)readline("Digite o número da arma escolhida: ");
$armaEscolhida = $armas[$escolha - 1] ?? $armas[0]; // Se inválido, escolhe a primeira

// Criando o herói com a arma escolhida
$heroi = new Heroi($nomeHeroi, 5, [$armaEscolhida]);

// Criando o monstro
$monstro = new Monstro("Orc Brutamontes", 100, "Orc");

// Iniciando a batalha
$batalha = new Batalha($heroi, $monstro);
$resultado = $batalha->iniciar();

// Exibindo o resultado
echo "Vencedor: {$resultado->vencedor}" . PHP_EOL;
echo "=== Log da Batalha ===" . PHP_EOL;
foreach ($resultado->log as $linha) {
    echo $linha . PHP_EOL;
}