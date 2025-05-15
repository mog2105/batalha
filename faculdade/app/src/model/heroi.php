<?php

namespace App\Model;

class Heroi {
    public string $nome;
    public int $nivel;
    /** @var Arma[] */
    public array $armas;

    public function __construct(string $nome, int $nivel, array $armas = []) {
        $this->nome = $nome;
        $this->nivel = $nivel;
        $this->armas = $armas;
    }

    public function getArmaAleatoria(): Arma {
        return $this->armas[array_rand($this->armas)];
    }
}