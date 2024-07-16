<?php

namespace Classes;

class Paginacion
{
    public $pagina_actual;
    public $registros_por_pagina;
    public $total_registros;

    public function __construct($pagina_actual = 1, $registros_por_pagina = 10, $total_registros = 0)
    {
        $this->pagina_actual = $pagina_actual;
        $this->registros_por_pagina = $registros_por_pagina;
        $this->total_registros = $total_registros;
    }

    public function offset()
    {
        return $this->registros_por_pagina * ($this->pagina_actual - 1);
    }
    public function totalPaginas()
    {
        $total = ceil($this->total_registros / $this->registros_por_pagina);
        $total == 0 ? $total = 1 : $total = $total;
        return $total;
    }

    public function paginaAnterior()
    {
        $anterior = $this->pagina_actual - 1;
        return ($anterior > 0) ? $anterior : false;
    }

    public function paginaSiguiente()
    {
        $siguiente = $this->pagina_actual + 1;
        return ($siguiente <= $this->totalPaginas()) ? $siguiente : false;
    }

    public function enlaceAnterior()
    {
        $html = '';
        if ($this->paginaAnterior()) {
            $html .= "<a class=\"paginacion__enlace paginacion__enlace--texto\" href=\"?page={$this->paginaAnterior()}\">&laquo; Anterior </a>";
        }
        return $html;
    }

    public function enlaceSiguiente()
    {
        $html = '';
        if ($this->paginaSiguiente()) {
            $html .= "<a class=\"paginacion__enlace paginacion__enlace--texto\" href=\"?page={$this->paginaSiguiente()}\">Siguiente &raquo;</a>";
        }
        return $html;
    }

    public function numerosPaginas()
    {
        $html = '';
        for ($i = 1; $i <= $this->totalPAginas(); $i++) {
            if ($i === $this->pagina_actual) {
                $html .= "<span class=\"paginacion__enlace paginacion__enlace--actual\">{$i}</span>";
            } else {
                $html .= "<a class=\"paginacion__enlace paginacion__enlace--numero\" href=\"?page={$i} \">{$i}</a>";
            }
        }
        return $html;
    }
    public function paginacion()
    {
        $html = '';
        if ($this->total_registros > 1) {
            $html .= '<div class="paginacion">';
            $html .= $this->enlaceAnterior();
            $html .= $this->numerosPaginas();
            $html .= $this->enlaceSiguiente();
            $html .= '</div>';
        }
        return $html;
    }
}