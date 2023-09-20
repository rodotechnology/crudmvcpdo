<?php

    /**
     * Clase Contact.
     * Esta clase se encarga de gestionar los contactos en la base de datos.
     */
    class Contact{
        private $db; // Objeto de conexión a la base de datos.
        private $contacs; // Almacena los contactos recuperados.

        /**
         * Constructor de la clase Contact.
         * Establece una conexión a la base de datos al instanciar la clase.
         */
        function __construct()
        {
            $this->db = Database::connect();
        }

        /**
         * Obtiene una lista de contactos paginados desde la base de datos.
         *
         * @param int $page               Página actual.
         * @param int $record_per_page    Número de registros por página (predeterminado: 3).
         *
         * @return array                  Un arreglo de contactos.
         */
        function getContact($page, $record_per_page = 3){
            $sql = $this->db->prepare('SELECT * FROM contacts ORDER BY id  LIMIT :currentPage, :recordsPerPage');
            $sql->bindValue(':currentPage', ($page - 1) * $record_per_page, PDO::PARAM_INT);
            $sql->bindValue(':recordsPerPage', $record_per_page, PDO::PARAM_INT);
            $sql->execute();
            $this->contacs = $sql->fetchAll(PDO::FETCH_ASSOC);

            return $this->contacs;
        }

        /**
         * Obtiene el número total de contactos en la base de datos.
         *
         * @return int                    Número total de contactos.
         */
        function getContactNumber(){
            return $this->db->query('SELECT COUNT(*) FROM contacts')->fetchColumn();
        }
    }

?>