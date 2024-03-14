<?php

include_once("class.logdata.php");

class pgsqlLoggerBackend {

	private $logFile; //nombre del fichero
	private $logLevel; //nivel para registrar los mensajes
	private $confile; //connexió del fitxer
	const DEBUG = 100;
	const INFO = 75;
	const NOTICE = 50;
	const WARNING = 25;
	const ERROR = 10;
	const CRITICAL = 5;

	private function __construct() {
			$this->logLevel = 100;
			$this->logFile = "logmessage.txt";
			echo "File: ".$this->logFile."\n";

			$this->confile = fopen($this->logFile, 'a+');

	  		if (!is_resource($this->confile)){
	  			printf("No puedo abrir el fichero %s", $this->logFile);
	  			return false;
	  		}
	  		echo "File opened...\n";
	}

	public static function getInstance(){
		static $objLog;
		if(!isset($objLog)){
			$objLog = new pgsqlLoggerBackend();
		}
		return $objLog;
	}

	public function __destruct(){
		if(is_resource($this->confile)){
			fclose($this->confile);
		}
	}


	public function logMessage($msg, $logLevel = pgsqlLoggerBackend::INFO){
		if ($logLevel > $this->logLevel){
			return false;
		}
	
$strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432";
$objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root",array());
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$objLog = new Logdata($objPDO);
 		$objLog->setMessage($msg);
 		$objLog->setLoglevel($logLevel);
		$objLog->setModule('ejer4');
 		$objLog->Save();
		

	}

	public static function levelToString($loglevel = null){

		switch ($loglevel) {
			case pgsqlLoggerBackend::DEBUG:
				return 'DEBUG';
				break;
			case pgsqlLoggerBackend::INFO:
				return 'INFO';
				break;
			case pgsqlLoggerBackend::NOTICE:
				return 'NOTICE';
				break;
			case pgsqlLoggerBackend::WARNING:
				return 'WARNING';
				break;
			case pgsqlLoggerBackend::ERROR:
				return 'ERROR';
				break;
			case pgsqlLoggerBackend::CRITICAL:
				return 'CRITICAL';
				break;			
			default:
				return '[OTHER]';
				break;
		}

	}

}

















?>
