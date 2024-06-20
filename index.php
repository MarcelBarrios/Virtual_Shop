<?php

	require_once("Config/config.php");
	//if it is not empty, print 'home/home'
	$url = !empty( $_GET['url'] ) ? $_GET['url'] : 'home/home';
    $arrUrl = explode("/", $url);
    $controller = $arrUrl[0];
    $method = $arrUrl[0];
    $params = "";

    if(!empty($arrUrl[1]) && $arrUrl[1] != ""){

        $method = $arrUrl[1];

    }

    if(!empty($arrUrl[2]) && $arrUrl[2] != ""){
            
        for($i =2; $i < count($arrUrl); $i++){
            $params .= $arrUrl[$i].',';
        }

        $params = trim($params,',');    //Eliminate the last character (coma)
        
    }

    spl_autoload_register(function($class){

    	if (file_exists(LIBS.'Core/'.$class.".php")) {
    		require_once(LIBS.'Core/'.$class.".php");
    	}
    });

    $controllerFile = "Controllers/".$controller.".php";
    if(file_exists($controllerFile)) {

    	require_once($controllerFile);
    	$controller = new $controller();
    	if (method_exists($controller, $method)) {

    		$controller->{$method}($params);
    	}
    	else {

    		echo "Method does not exists";
    	}
    } 
    else {
    	echo "It doesn't exist";
    }

	// echo "<br>";
	// echo "controller: ".$controller;
	// echo "<br>";
	// echo ' - method: '.$method;
	// echo "<br>";
	// echo "parametors".$params;

?>