<?php

    require_once 'models/Contact.php';

    /**
     * Controlador para la gestión de contactos.
     */
    class ContactController{
        private $model_c; // Instancia del modelo de contactos.

        /**
         * Constructor de la clase ContactController.
         * Crea una instancia del modelo de contactos al instanciar la clase.
         */
        function __construct()
        {
            $this->model_c = new Contact();
        }

        /**
         * Método para mostrar la lista de contactos.
         * Obtiene la página actual, el número de registros por página y la lista de contactos,
         * y luego incluye las vistas correspondientes.
         */
        function index(){
            // Evaluamos con un operador ternario si la petición HTTP trae un parametro 'p'
            $p = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
            // Definicmos cuantos registros por pagina queremos mostrar
            $recordsPerPage = 5;
            // Obtiene el número de registros de la tabla contact
            $numContacts = $this->model_c->getContactNumber();
            // Realizamos la consulta por medio del método getContact
            $query = $this->model_c->getContact($p, $recordsPerPage);

            // Include de la vista y sus layouts
            include_once 'views/layouts/header.php';
            include_once 'views/contact/index.php';
            include_once 'views/layouts/footer.php';

        }
    }

?>