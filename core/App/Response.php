<?php

namespace App;

class Response
{

  


    /**
     * 
     *  redirige vers l'url passée en parametre
     * 
     * @param string $url
     * 
     * @return void
     * 
     */


    public static function redirect(?array $parametres=null): void
    {
                             

        $url = "index.php";
            if($parametres){
                        $url = "?";
                       
              
                        foreach($parametres as $cle => $valeur){

                            $nouveauParamGet = $cle."=".$valeur."&";
                            
                            $url.=$nouveauParamGet;

   }       
 
        header("Location: ".$url);
        exit();
    }


}


}