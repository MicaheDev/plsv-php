<?php
class Database
{
    // Contenedor de la única instancia de la clase
    private static ?Database $instance = null;

    // Contenedor de la conexión PDO real
    private ?PDO $connection = null;

    // 1. El constructor DEBE ser privado para evitar que se use "new Database()" desde fuera
    private function __construct()
    {
        // Configuración de la base de datos (puedes cambiar estos valores)
        $host     = 'localhost';
        $db       = 'plsv_en';
        $user     = 'root';
        $password = 'root';
        $charset  = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        // Opciones recomendadas para PDO
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Lanza excepciones en caso de errores
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Devuelve los datos como arrays asociativos
            PDO::ATTR_EMULATE_PREPARES   => false,                  // Desactiva la emulación para mayor seguridad contra SQL Injection
        ];

        try {
            // Se crea la conexión real
            $this->connection = new PDO($dsn, $user, $password, $options);
        } catch (PDOException $e) {
            // En producción, es mejor registrar el error en un log y mostrar un mensaje genérico
            die("Error crítico en la conexión: " . $e->getMessage());
        }
    }

    // 2. Método estático para obtener la instancia (El Singleton corregido para PHP)
    public static function getInstance(): Database
    {
        // Un solo IF basta. Si no existe, la crea; si ya existe, se salta el bloque.
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // 3. Método para obtener la conexión PDO y poder hacer consultas
    public function getConnection(): PDO
    {
        return $this->connection;
    }

    // 4. Clonar y deserializar también se privatizan para evitar trampas que dupliquen el objeto
    private function __clone() {}
    public function __wakeup()
    {
        throw new \Exception("No se puede deserializar una instancia de Singleton.");
    }
}
