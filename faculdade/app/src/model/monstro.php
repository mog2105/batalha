<?php

namespace App\Model;

class Monstro {
    public string $nome;
    public int $pontosDeVida;
    public string $tipo;

    public function __construct(string $nome, int $pontosDeVida, string $tipo) {
        $this->nome = $nome;
        $this->pontosDeVida = $pontosDeVida;
        $this->tipo = $tipo;
    }

    public function receberDano(int $dano): void {
        $this->pontosDeVida -= $dano;
    }

    public function estaVivo(): bool {
        return $this->pontosDeVida > 0;
    }
}