<?php

class BaseController {
    protected function view($template, $data = []) {
        // Obtén la ruta completa de la plantilla
        $templatePath = __DIR__ . '/../views/' . $template;

        // Verifica si la plantilla existe
        if (file_exists($templatePath)) {
            // Extrae los datos para que estén disponibles dentro de la plantilla
            extract($data);

            // Inicia el almacenamiento en búfer
            ob_start();

            // Incluye la plantilla
            include $templatePath;

            // Obtiene el contenido del búfer
            $content = ob_get_clean();

            // Imprime el contenido
            echo $content;
        } else {
            // Si la plantilla no existe, muestra un mensaje de error
            echo 'Error: La plantilla no existe.';
        }
    }
}
