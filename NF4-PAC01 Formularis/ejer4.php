<?php

if(isset($_POST['Enviar'])){
    
    //print_r($_POST);
    $db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
    mysqli_select_db($db, 'moviesite') or die(mysql_error($db));

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $nivel = $_POST['nivel'];
    // $query = <<<ENDSQL
    // INSERT INTO reviews
    //     (review_date, reviewer_name, review_comment, review_rating)
    // VALUES
    //     (NOW(), "$nombre", "$descripcion", $nivel)
    // ENDSQL;

    // Reemplaza 'valor_de_movie_id' con el valor adecuado para identificar la película a la que pertenece la reseña
    $movie_id = $_GET['movie_id'];

    // Consulta SQL 
    $query = "INSERT INTO reviews (review_date, reviewer_name, review_comment, review_rating, review_movie_id)
    VALUES (NOW(), '$nombre', '$descripcion', $nivel, $movie_id)";


    // Ejecutar la consulta
    $result = mysqli_query($db, $query);

    if ($result) {
        echo "INSERTADO";
    } else {
        echo "ERROR" . mysqli_error($db);
    }
    
    // echo 'Se envió el formulario con los siguientes datos:<br>';
    // echo 'Nombre: ' . $nombre . '<br>';
    // echo 'Descripción: ' . $descripcion . '<br>';
    // echo 'Valoración: ' . $nivel;
}

// function to generate ratings
function generate_ratings($rating) {
    $movie_rating = '';
    for ($i = 0; $i < $rating; $i++) {
        $movie_rating .= '<img src="star.png" height="20px" alt="star"/>';
    }
    return $movie_rating;
}

// take in the id of a director and return his/her full name
function get_director($director_id) {

    global $db;

    $query = 'SELECT 
            people_fullname 
       FROM
           people
       WHERE
           people_id = ' . $director_id;
    $result = mysqli_query($db, $query) or die(mysql_error($db));

    $row = mysqli_fetch_assoc($result);
    extract($row);

    return $people_fullname;
}

// take in the id of a lead actor and return his/her full name
function get_leadactor($leadactor_id) {

    global $db;

    $query = 'SELECT
            people_fullname
        FROM
            people 
        WHERE
            people_id = ' . $leadactor_id;
    $result = mysqli_query($db, $query) or die(mysql_error($db));

    $row = mysqli_fetch_assoc($result);
    extract($row);

    return $people_fullname;
}

// take in the id of a movie type and return the meaningful textual
// description
function get_movietype($type_id) {

    global $db;

    $query = 'SELECT 
            movietype_label
       FROM
           movietype
       WHERE
           movietype_id = ' . $type_id;
    $result = mysqli_query($db, $query) or die(mysql_error($db));

    $row = mysqli_fetch_assoc($result);
    extract($row);

    return $movietype_label;
}

// function to calculate if a movie made a profit, loss or just broke even
function calculate_differences($takings, $cost) {

    $difference = $takings - $cost;

    if ($difference < 0) {     
        $color = 'red';
        $difference = '$' . abs($difference) . ' million';
    } elseif ($difference > 0) {
        $color ='green';
        $difference = '$' . $difference . ' million';
    } else {
        $color = 'blue';
        $difference = 'broke even';
    }

    return '<span style="color:' . $color . ';">' . $difference . '</span>';
}

//connect to MySQL
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysql_error($db));

$query = 'SELECT 
        AVG(review_rating) as mediaRating
    FROM
        reviews
    WHERE
    review_movie_id = ' . $_GET['movie_id'];

$result = mysqli_query($db, $query) or die(mysql_error($db));
$row = mysqli_fetch_assoc($result);
$media_rating = number_format($row['mediaRating'], 2);

// retrieve information
$query = 'SELECT
        movie_name, movie_year, movie_director, movie_leadactor,
        movie_type, movie_running_time, movie_cost, movie_takings
    FROM
        movie
    WHERE
        movie_id = ' . $_GET['movie_id'];
$result = mysqli_query($db, $query) or die(mysqli_error($db));

$row = mysqli_fetch_assoc($result);
$movie_name         = $row['movie_name'];
$movie_director     = get_director($row['movie_director']);
$movie_leadactor    = get_leadactor($row['movie_leadactor']);
$movie_year         = $row['movie_year'];
$movie_running_time = $row['movie_running_time'] .' mins';
$movie_takings      = $row['movie_takings'] . ' million';
$movie_cost         = $row['movie_cost'] . ' million';
$movie_health       = calculate_differences($row['movie_takings'],
                          $row['movie_cost']);
// display the information
echo <<<ENDHTML
<html>
 <head>
  <title>Details and Reviews for: $movie_name</title>
 </head>
 <body>
  <div style="text-align: center;">
   <h2>$movie_name</h2>
   <h3><em>Details</em></h3>
   <table cellpadding="2" cellspacing="2"
    style="width: 70%; margin-left: auto; margin-right: auto;">
    <tr>
     <td><strong>Title</strong></strong></td>
     <td>$movie_name</td>
     <td><strong>Release Year</strong></strong></td>
     <td>$movie_year</td>
    </tr><tr>
     <td><strong>Movie Director</strong></td>
     <td>$movie_director</td>
     <td><strong>Cost</strong></td>
     <td>$$movie_cost</td>
    </tr><tr>
     <td><strong>Lead Actor</strong></td>
     <td>$movie_leadactor</td>
     <td><strong>Takings</strong></td>
     <td>$$movie_takings</td>
    </tr><tr>
     <td><strong>Running Time</strong></td>
     <td>$movie_running_time</td>
     <td><strong>Health</strong></td>
     <td>$movie_health</td>
    </tr><tr>
     <td><strong>Average Rating</strong></td>
     <td>$media_rating</td>
     <td></td>
     <td></td>
    </tr>
   </table>
ENDHTML;

// retrieve reviews for this movie
$query = 'SELECT
        review_movie_id, review_date, reviewer_name, review_comment,
        review_rating
    FROM
        reviews
    WHERE
        review_movie_id = ' . $_GET['movie_id'] . '
    ORDER BY
        review_date DESC';

$result = mysqli_query($db, $query) or die(mysql_error($db));

// display the reviews
echo <<<ENDHTML
   <h3><em>Reviews</em></h3>
   <table cellpadding="2" cellspacing="2"
    style="width: 90%; margin-left: auto; margin-right: auto;">
    <tr>
     <th style="width: 7em;"><a href="?movie_id={$_GET['movie_id']}&columna=date">Date</a></th>
     <th style="width: 10em;"><a href="?movie_id={$_GET['movie_id']}&columna=review">Reviewer</a></th>
     <th><a href "?movie_id={$_GET['movie_id']}&columna=comment">Comments</a></th>
     <th style="width: 5em;"><a href="?movie_id={$_GET['movie_id']}&columna=rating">Rating</a></th>
    </tr>
ENDHTML;

$columna_ordenada = 'review_date';

if (isset($_GET['columna'])) {
   switch ($_GET['columna']) {
     case 'date':
       $columna_ordenada = 'review_date';
       break;
    case 'review':
       $columna_ordenada = 'reviewer_name';
       break;
    case 'comment':
         $columna_ordenada = 'review_comment';
       break;
    default:
       $columna_ordenada = 'review_rating';
       break;
  }
}

$oddRowColor = 'lightgray';
$evenRowColor = 'white';
$rowColor = $oddRowColor;

while ($row = mysqli_fetch_assoc($result)) {
    $date = $row['review_date'];
    $name = $row['reviewer_name'];
    $comment = $row['review_comment'];
    $rating = generate_ratings($row['review_rating']);

    echo <<<ENDHTML
    <tr style="background-color: $rowColor;">
      <td style="vertical-align:top; text-align: center;">$date</td>
      <td style="vertical-align:top;">$name</td>
      <td style="vertical-align:top;">$comment</td>
      <td style="vertical-align:top;">$rating</td>
    </tr>
ENDHTML;

    // Alternar el color de fondo para la siguiente fila
    $rowColor = ($rowColor === $oddRowColor) ? $evenRowColor : $oddRowColor;
}

echo '</table>';
$id = $_GET["movie_id"];
echo <<<ENDHTML
  </div>
  <form action="ejer4.php?movie_id=$id" method="post">
  <label for="nombre">Nombre:</label>
  <input type="text" id="nombre" name="nombre" required>

  <label for="descripcion">Descripción:</label>
  <textarea id="descripcion" name="descripcion" rows="4" cols="50" required></textarea>

  <label for="nivel">Valoración:</label>
  <select id="nivel" name="nivel" required>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
  </select>
  <input id="Enviar" type="submit" name="Enviar" value="Enviar">
  </form>
 </body>
</html>
ENDHTML;


?>
