<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die('No se puede conectar. Verifica los parámetros de conexión.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

// Agregar tres reseñas a cada una de las tres películas
addReviewsToMovie($db, 4, 'Usuario4', 'Buena película, la recomiendo.', 4, '2023-10-11');
addReviewsToMovie($db, 4, 'Usuario5', 'No me gustó en absoluto.', 2, '2023-10-12');
addReviewsToMovie($db, 4, 'Usuario6', 'Excelente película, la mejor que he visto.', 5, '2023-10-13');

addReviewsToMovie($db, 5, 'Usuario7', 'Me hizo reír todo el tiempo.', 4, '2023-10-14');
addReviewsToMovie($db, 5, 'Usuario8', 'Buena actuación de los actores.', 3, '2023-10-15');
addReviewsToMovie($db, 5, 'Usuario9', 'No fue lo que esperaba.', 2, '2023-10-16');

addReviewsToMovie($db, 6, 'Usuario10', 'Una obra maestra del cine.', 5, '2023-10-17');
addReviewsToMovie($db, 6, 'Usuario11', 'Maravillosa experiencia cinematográfica.', 5, '2023-10-18');
addReviewsToMovie($db, 6, 'Usuario12', 'Nunca me canso de verla.', 4, '2023-10-19');

// Función para agregar una reseña a una película
function addReviewsToMovie($db, $movieId, $reviewer, $comment, $rating, $reviewDate) {
    $query = "INSERT INTO reviews (review_movie_id, review_date, reviewer_name, review_comment, review_rating) 
              VALUES ($movieId, '$reviewDate', '$reviewer', '$comment', $rating)";
    mysqli_query($db, $query) or die(mysqli_error($db));
}

echo 'Nueve reseñas adicionales agregadas exitosamente (3 por película).';
?>


