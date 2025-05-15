<?php

namespace App\Model;

class Batalha {
    private Heroi $heroi;
    private Monstro $monstro;
    private Resultado $resultado;
    private int $turno = 0;

    public function __construct(Heroi $heroi, Monstro $monstro) {
        $this->heroi = $heroi;
        $this->monstro = $monstro;
        $this->resultado = new Resultado();
    }

    public function iniciar(): Resultado {
        $this->resultado->adicionarLog("A batalha começou entre {$this->heroi->nome} e {$this->monstro->nome}!");

        while ($this->monstro->estaVivo()) {
            $this->turno++;
            $this->resultado->adicionarLog("Turno {$this->turno}");

            // Sorteio quem ataca
            $atacante = rand(0, 1) === 0 ? 'heroi' : 'monstro';

            if ($atacante === 'heroi') {
                $arma = $this->heroi->getArmaAleatoria();
                $this->monstro->receberDano($arma->dano);
                $this->resultado->adicionarLog("{$this->heroi->nome} ataca com {$arma->nome} causando {$arma->dano} de dano. Vida do monstro: {$this->monstro->pontosDeVida}");

                if (!$this->monstro->estaVivo()) {
                    $this->resultado->vencedor = $this->heroi->nome;
                    $this->resultado->adicionarLog("{$this->monstro->nome} foi derrotado!");
                    break;
                }
            } else {
                $danoMonstro = rand(5, 20);
                $this->resultado->adicionarLog("{$this->monstro->nome} ataca causando {$danoMonstro} de dano. ({$this->heroi->nome} resiste!)");
            }
        }

        return $this->resultado;
    }
}