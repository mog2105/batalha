<?php

namespace App\Model;

class Resultado {
    public string $vencedor;
    public array $log = [];

    public function adicionarLog(string $mensagem): void {
        $this->log[] = $mensagem;
    }
}