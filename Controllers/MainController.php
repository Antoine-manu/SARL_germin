<?php

class MainController{

    public function pannel(){
        // Simple fonction de route
        ob_start();
        require_once __DIR__ .'/../Vues/pannel.php';
        $content = ob_get_clean();
        require_once __DIR__ .'/../Templates/template.php';
    }
    public function about(){
        // Simple fonction de route
        ob_start();
        require_once __DIR__ .'/../Vues/About.php';
        $content = ob_get_clean();
        require_once __DIR__ .'/../Templates/template.php';
    }

}

