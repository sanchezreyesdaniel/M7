<?php
require_once('TwitterAPIExchange.php');

// Clase para manejar los datos de Twitter y guardarlos en la base de datos
class TwitterData {
    private $authorName;
    private $authorUrl;
    private $tweetHtml;
    private $photoUrl;

    // Constructor
    public function __construct($authorName, $authorUrl, $tweetHtml, $photoUrl) {
        $this->authorName = $authorName;
        $this->authorUrl = $authorUrl;
        $this->tweetHtml = $tweetHtml;
        $this->photoUrl = $photoUrl;
    }

    // Método para guardar los datos en la base de datos
    public function saveToDatabase() {
        // Establecer conexión con la base de datos
        $pdo = new PDO('pgsql:host=localhost;dbname=usuaris', 'postgres', 'root');

        // Preparar la consulta SQL para insertar los datos
        $stmt = $pdo->prepare("INSERT INTO twitter_data2 (author_name, author_url, tweet_html, photo_url) VALUES (:authorName, :authorUrl, :tweetHtml, :photoUrl)");

        // Ejecutar la consulta con los datos del objeto
        $stmt->execute([
            ':authorName' => $this->authorName,
            ':authorUrl' => $this->authorUrl,
            ':tweetHtml' => $this->tweetHtml,
            ':photoUrl' => $this->photoUrl
        ]);
    }
}

// Configuración de la API de Twitter
$settings = array(
    'oauth_access_token' => "",
    'oauth_access_token_secret' => "",
    'consumer_key' => "",
    'consumer_secret' => ""
);

// Realizar la solicitud a la API de Twitter
$url = 'https://publish.twitter.com/oembed';
$getfield = '?url=https://twitter.com/Interior/status/507185938620219395';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$response = $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();

// Procesar la respuesta JSON
$data = json_decode($response, true);

// Obtener los datos del tweet
$authorName = $data['author_name'];
$authorUrl = $data['author_url'];
$html = $data['html'];
$photoUrl = $data['url']; // URL de la foto del tweet

// Crear un objeto TwitterData con los datos del tweet y guardarlo en la base de datos
$twitterData = new TwitterData($authorName, $authorUrl, $html, $photoUrl);
$twitterData->saveToDatabase();

// Mostrar los datos que se van a insertar en la base de datos
echo "Datos a insertar en la base de datos:\n";
echo "Nombre del autor: $authorName\n";
echo "URL del autor: $authorUrl\n";
echo "HTML del tweet: $html\n";
echo "URL de la foto: $photoUrl\n";
?>
