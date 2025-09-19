<?php
    spl_autoload_register(function($nomeClass){
        $pastaClasses = 'class/';
        $possivelCaminhoPasta = [
            $pastaClasses,
            $pastaClasses . 'Models/',
            $pastaClasses . 'Views/',
            $pastaClasses . 'Controller/'
        ];

        foreach($possivelCaminhoPasta as $pastaAtual){
            $nomeArquivo = $pastaAtual . $nomeClass . '.php';
            
            if (file_exists($nomeArquivo)) {
                require_once $nomeArquivo;
        }
        }
       
    })
?>