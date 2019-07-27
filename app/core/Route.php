<?php

namespace core;

class Route {

    static public function start() {
// контроллер и действие по умолчанию
        $controller_name = 'main';
        $action_name = 'index';

        $routes = explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        $i = count($routes) - 1;
        while ($i > 0) {
            if (!empty($routes[$i])) {
                if (is_file("app" . DIRECTORY_SEPARATOR . 'controllers\Controller' . ucfirst($routes[$i]) . '.php') || !empty($_GET)) {
                    $controller_name = 'controllers\Controller' . ucfirst($routes[$i]);
                    $model_name = 'models\Model' . ucfirst($routes[$i]);
                    break;
                } else {
                    $action_name = $routes[$i];
                }
            }
            $i--;
        }
        if (count($routes) > 3) {
            self::errorPage404();
        }
// получаем имя контроллера
        if (!empty($routes[1])) {
            $controller_name = strtolower($routes[1]);
        }

// получаем имя экшена
        if (!empty($routes[2])) {
            $action_name = strtolower($routes[2]);
            if (is_numeric($action_name)) {
                $action_name = 'index';
                $id = $routes[2];
            }
        }
// добавляем префиксы
        $controller_name = ucfirst($controller_name);
        $model_name = 'models\Model' . $controller_name;
        $controller_name = 'controllers\Controller' . $controller_name;
        $action_name = 'action_' . $action_name;


// подцепляем файл с классом модели (файла модели может и не быть)

        $model_path = "app" . DIRECTORY_SEPARATOR . $model_name . '.php';
        if (file_exists($model_path)) {
            include_once $model_path;
        }

// подцепляем файл с классом контроллера
        $controller_path = "app" . DIRECTORY_SEPARATOR . $controller_name . '.php';
        if (file_exists($controller_path)) {
            include_once $controller_path;
        } else {
            self::errorPage404();
        }

// создаем контроллер
        $controller = new $controller_name;
        if (method_exists($controller, $action_name)) {
            $controller->$action_name();
        } else {
            self::errorPage404();
        }
    }

    static public function errorPage404() {
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        include_once 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'page404.php';
    }

}
