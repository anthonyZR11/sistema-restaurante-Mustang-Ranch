<?php

require __DIR__ . "/../../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

class conexion{
	private $host;
	private $databaseName;
	private $username;
	private $password;

	public function __construct() {
		$this->host = $_ENV["DB_HOST"];
		$this->databaseName = $_ENV["DB_NAME"];
		$this->username = $_ENV["DB_USER"];
		$this->password = $_ENV["DB_PASSWORD"];
	}
	public static function conectar(){
		$instance = new self(); // instancia para acceder a propiedades no estaticas dentro de un metodo estatico
		
		try {
			return new PDO(
			"mysql:host={$instance->host}; dbname={$instance->databaseName}",
			"{$instance->username}",
			"{$instance->password}");
		} catch (\Exception $e) {
			throw new Exception("Error de conexión: ".$e->getMessage());
		}
	}
}