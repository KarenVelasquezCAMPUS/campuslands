<?php
    namespace App;
    class Database{
        private $conn;
        protected static $settings = Array(
            "mysql" => Array(
                    'driver' => 'mysql',
                    'host' => 'localhost',
                    'username' => 'campus',
                    'database' => 'campuslands',
                    'password' => '',
                    'collation' => 'utf8mb4_unicode_ci',
                    'flags' => [
                        // Turn off persistent connections
                        \PDO::ATTR_PERSISTENT => false,
                        // Enable exceptions
                        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                        // Emulate prepared statements
                        \PDO::ATTR_EMULATE_PREPARES => true,
                        // Set default fetch mode to array
                        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                        // Set character set
                        \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci'
                    ]                
                ),
            "psql" => array(
                        'driver' => 'pgsql',
                        'host' => 'localhost',
                        'username' => 'campus',
                        'database' => 'campuslands',
                        'password' => '',
                        'flags' => [
                            // Turn off persistent connections
                            \PDO::ATTR_PERSISTENT => false,
                            // Enable exceptions
                            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                            // Set default fetch mode to array
                            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                            // Set character set
                            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
                        ]                
                )

        );
    }
?>