<?php

// Clase TwitterData
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

    // Método público para obtener el nombre del autor
    public function getAuthorName() {
        return $this->authorName;
    }

    // Método público para obtener la URL del autor
    public function getAuthorUrl() {
        return $this->authorUrl;
    }

    // Método público para obtener el HTML del tweet
    public function getTweetHtml() {
        return $this->tweetHtml;
    }

    // Método público para obtener la URL de la foto
    public function getPhotoUrl() {
        return $this->photoUrl;
    }

    // Método estático para obtener todos los datos de la tabla
    public static function getAllDataFromDatabase() {
        // Establecer conexión con la base de datos
        $pdo = new PDO('pgsql:host=localhost;dbname=usuaris', 'postgres', 'root');
        
        // Preparar la consulta SQL para obtener todos los datos
        $stmt = $pdo->prepare("SELECT * FROM twitter_data2");

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener los resultados como objetos TwitterData
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $twitterDataArray = [];
        foreach ($results as $result) {
            $twitterDataArray[] = new TwitterData($result['author_name'], $result['author_url'], $result['tweet_html'], $result['photo_url']);
        }

        return $twitterDataArray;
    }
}

// Obtener todos los datos de la tabla
$twitterDataArray = TwitterData::getAllDataFromDatabase();

// Mostrar los datos en una tabla
echo "<table border='1'>";
echo "<tr><th>Nombre del autor</th><th>URL del autor</th><th>HTML del tweet</th><th>URL de la foto</th></tr>";
foreach ($twitterDataArray as $twitterData) {
    echo "<tr>";
    echo "<td>" . $twitterData->getAuthorName() . "</td>";
    echo "<td>" . $twitterData->getAuthorUrl() . "</td>";
    echo "<td>" . $twitterData->getTweetHtml() . "</td>";
    echo "<td>" . $twitterData->getPhotoUrl() . "</td>";
    echo "</tr>";
}
echo "</table>";

?>
