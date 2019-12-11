<?php

/**
 * Fonction pour aller chercher les parametre en get lorsqu'ils utilise des charactere réservé
 *
 * @return array $arr_parsed_params
 */
function ParseGetParameters(){
    $arr_parsed_params = [];
    $query =  parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY );
    foreach (explode('&', $query) as $chunk) {
        $param = explode("=", $chunk);

        if ($param) {
            $parameter_name =  urldecode($param[0]);
            $parameter_value =  urldecode($param[1]);
            $arr_parsed_params[$parameter_name] = $parameter_value;
        }
    }
    return $arr_parsed_params;
}

function ValidateAPIParams(array $get_params){
    $result = true;
    $arr_params = ['states[0]','states[1]','states[2]','states[3]','states[4]'];
    $arr_states = ['.','x','o'];

    foreach($get_params as $key => $value){
        if(in_array($key,$arr_params)){
            if(!in_array($value,$arr_states)){
                echo "Valeur invalide passé au paramètre $key ". $value;
                $result = false;
            }
        }else{
            echo "Paramètre invalide passé a L'api ".$key;
            $result = false;
        }
    }

    $count_param = count($get_params);
    if($count_param>=1 && $count_param<=5){
        for($x=0;$x<$count_param;$x++){
            if(!isset($get_params["states[$x]"])){
                echo "Il nous manque des etat pour complété la suite avec les données spécifié <br/>";
                $result = false;
            }
        }
    }else{
        echo "Nombre d'état invalide";
        $result = false;
    }
    if(!$result){
        die;
    }
}
