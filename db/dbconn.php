<?php
    /**
     * @version 092023
     * @author Ing. Rodrigo Ortiz, MIR
     * Archivo que define los parametros que serán utilizados en la conexion a la BD
     */

    /*
        Para que el programa funcione requerimos obligatoriamente y de forma restricta que se incluya el archivo config.php
        https://www.w3schools.com/php/php_includes.asp
    */
    require_once 'config.php';

    /**
     * Clase Database.
     * Esta clase se encarga de gestionar la conexión con la base de datos.
     */
    class Database{
        // Declaración de una propiedad o atributo estático
        private static $conn = null; // Atributo que almacena la conexión a la base de datos

        /**
         * Constructor de la clase Database.
         * Se utiliza para evitar que se instancie esta clase directamente.
         * No permite la inicialización directa de la clase.
         */
        public function __construct(){
            die('La funcion de inicialización no esta permitida');
        }

        /**
         * Método estático para establecer una conexión a la base de datos.
         * @return PDO|null Retorna una instancia de PDO para la conexión o null si falla.
         */
        public static function connect(){
            // Utilizamos 'self' para poder acceder al atributo de clase estático
            if(self::$conn == null){
                try{
                    // Estableciendo la cadena de conexión a la base 'tareas'
                    // Utilizamos la clase PDO https://www.php.net/manual/es/book.pdo.php
                    // $mbd = new PDO('mysql:host=localhost;dbname=tareas', usuario, contraseña); <---- Sintaxis
                    self::$conn = new PDO("mysql:host=". HOST . "; dbname=". DBNAME, USER, PASS);
                }
                catch(Exception $e) // En caso de haber algún problema retornamos una excepción
                {
                    die($e->getMessage());
                }
            }

            return self::$conn; // Si todo ha ido bien, retornamos la conexión
        }

        /**
         * Método estático para desconectar la conexión a la base de datos.
         * Establece la conexión a null.
         */
        public static function disconnect(){
            self::$conn = null;
        }
    }

?>