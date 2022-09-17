<?php

if (!function_exists('fallback_image')) {
    function fallback_image($model, $type = "default")
    {
        //Ya se que siempre devolvera el tipo 'default' pero es para tener en mente lo de escalarlo.
        //TODO: Escalar esta funcion
        switch ($type) {
            case 'default':
                return asset("storage/$model/fallback/no_image_available.png");
                break;
            
            default:
                return asset("storage/$model/fallback/no_image_available.png");
                break;
        }
    }
}