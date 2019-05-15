<?php
    /**
    * Creado por Francis Dona 08/04/2018
    * Ultima modificacion por Francis Dona 08/04/2018
    * Clase core, mapea la url para incluir el controlador, metodo y parametros enivados por url
    */

     class Core{

        protected $currentController = "loginController";
        protected $currentMethod = "index";
        protected $parameters = [];

        /**
         * [__construct description]
         * Instancia el controlador seteado en la url
         */
        public function __construct(){
            $url = $this->getUrl();
            
            //busca si el controlador ingresado por la url exite
            if ( file_exists("../app/controllers/".strtolower($url[0])."Controller.php") ) {
                $this->currentController = strtolower($url[0])."Controller";
                unset($url[0]);
            }

            //incluye al controlador
            require_once "../app/controllers/".$this->currentController.".php";
            $this->currentController = new $this->currentController;

            //verificar si el metodo enviado existe dentro del controlador
            if( isset($url[1]) ){
                if ( method_exists( $this->currentController, $url[1]) ) {
                    $this->currentMethod = $url[1];
                    unset($url[1]);
                }
            }

            //obtener paramentros
            $this->parameters = $url ? array_values($url) : [];

            //llamando al controlador con el metodo y parametros obtenidos de la url
            call_user_func_array([$this->currentController, $this->currentMethod], $this->parameters);

        }

        /**
         * [getUrl: Obtiner los la url seteada y la transforma en un array
         * para despues instanciar los controladores]
         * @return [array] [URL]
         */
        public function getUrl(){
            if ( isset($_GET["url"]) ) {

                $url = rtrim($_GET["url"],"/");
                $url = filter_var($url,FILTER_SANITIZE_URL);
                $url = explode("/", $url);
                return $url;

            }
        }

     }

    