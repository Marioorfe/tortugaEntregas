<?php

class Grafico {
    protected $visible;

    public function mostrar() {
        $this ->visible = true;
    }

    public function ocultar() {
        $this ->visible = false;
    }

    public function getvisible() {
        return $this -> visible;
    }

    public function dibujar(): string{
        return (" ");
    }
/*     public function animar($x,$y) {

    } */

    public function mover($x, $y) {}

    public function desplazar($x, $y) {}
}

?>