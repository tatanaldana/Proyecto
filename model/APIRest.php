<?php
trait Rutasapi{

    private  $endPont = "http://localhost/proyecto/controller/apicontroller/usuario.php?arc=Get_buscar";
    
    function api($url){
    $ch = curl_init($url );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    $response = curl_exec($ch);
    curl_close($ch);
    
        if(!$response) {
            return false;
        }else{
           return $response;
        
    }
}



public function ver_usuario3($id) {
    
    $user = $this->api($this->endPont."&=".$id);

    if (!empty($user)) {
        return $user;
    }else {
        return ("error");
    }
}





}



?>