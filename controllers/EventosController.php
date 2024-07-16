<?php

namespace Controllers;

use Model\Dia;
use Model\Hora;
use MVC\Router;
use Model\Evento;
use Model\Ponente;
use Model\Categoria;
use Classes\Paginacion;

class EventosController
{

    public static function index(Router $router){
        if (!is_admin()) {
            header('Location: /login');
        }
        $paginaActual = $_GET['page'];
        $paginaActual = filter_var($paginaActual, FILTER_VALIDATE_INT);

        if(!$paginaActual || $paginaActual < 1) {
            header('Location: /admin/eventos?page=1');
        }

        $porPagina = 10;
        $total = Evento::total();
        $paginacion = new Paginacion($paginaActual, $porPagina, $total);

        $eventos = Evento::paginar($porPagina, $paginacion->offset());

        foreach($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);
        }

        $router->render('admin/eventos/index', [
            'titulo' => 'Conferencias y Workshops',
            'eventos' => $eventos,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router){
        if (!is_admin()) {
            header('Location: /login');
        }
        $alertas = [];

        $categorias = Categoria::all();
        $dias = Dia::all('ASC');
        $horas = Hora::all('ASC');

        $evento = new Evento;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!is_admin()) {
                header('Location: /login');
            }

            $evento->sincronizar($_POST);

            $alertas = $evento->validar();

            if (empty($alertas)) {

                $resultado = $evento->guardar();

                if ($resultado) {
                    header('Location: /admin/eventos');
                }
            }
        }

        $router->render('admin/eventos/crear', [
            'titulo' => 'Registrar Evento',
            'alertas' => $alertas,
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $horas,
            'evento' => $evento
        ]);
    }
    public static function editar(Router $router){
        if (!is_admin()) {
            header('Location: /login');
        }
        $alertas = [];

        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /admin/eventos');
        }

        $categorias = Categoria::all();
        $dias = Dia::all('ASC');
        $horas = Hora::all('ASC');

        $evento = Evento::find($id);
        if(!$evento) {
            header('Location: /admin/eventos');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!is_admin()) {
                header('Location: /login');
            }

            $evento->sincronizar($_POST);

            $alertas = $evento->validar();

            if (empty($alertas)) {

                $resultado = $evento->guardar();

                if ($resultado) {
                    header('Location: /admin/eventos');
                }
            }
        }

        $router->render('admin/eventos/editar', [
            'titulo' => 'Editar Evento',
            'alertas' => $alertas,
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $horas,
            'evento' => $evento
        ]);
    }

    public static function eliminar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!is_admin()) {
                header('Location: /login');
            }

            $id = $_POST['id'];
            $evento = Evento::find($id);
            if (!isset($evento)) {
                header('Location: /admin/eventos');
            }
            $resultado = $evento->eliminar();
            if ($resultado) {
                header('Location: /admin/eventos');
            }

        }
    }
}

