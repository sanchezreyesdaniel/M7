<?php
print_r($_POST);
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

switch ($_GET['action']) {
case 'add':
    switch ($_GET['type']) {
        case 'employees':
            $error = array();
            $emp_no = isset($_POST['emp_no']) ? (int)$_POST['emp_no'] : 0; // Sanitize as intege
            $birth_date = isset($_POST['birth_date']) ? 
                trim($_POST['birth_date']) : '';
            if (!preg_match('|^\d{4}-\d{2}-\d{2}$|', $birth_date)) {
                $error[] = urlencode('Please enter a date in dd-mm-yyyy format.');
            } else {
                list($year, $month, $day) = explode('-', $birth_date);
                if (!checkdate($day, $month, $year)) {
                    $error[] = urlencode('Please enter a valid date.');
                } else {
                    $birth_date = $year . "-" . $month . "-" . $day;
                }
            }
            $first_name = isset($_POST['first_name']) ?
                trim($_POST['first_name']) : '';
            if (empty($first_name)) {
                $error[] = urlencode('Please enter a valid name.');
            }
            $last_name = isset($_POST['last_name']) ?
                trim($_POST['last_name']) : '';
            if (empty($last_name)) {
                $error[] = urlencode('Please enter a valid last name.');
            }
    
            $gender = isset($_POST['gender']) ?
                        $_POST['gender'] : '';
            if($gender!="M" && $gender!="F"){
                $error[] = urlencode('Please enter at least one valid option');
            }
            $hire_date = isset($_POST['hire_date']) ? 
                trim($_POST['hire_date']) : '';
            if (!preg_match('|^\d{4}-\d{2}-\d{2}$|', $hire_date)) {
                $error[] = urlencode('Please enter a date in dd-mm-yyyy format.');
            } else {
                list($year, $month, $day) = explode('-', $hire_date);
                if (!checkdate($day, $month, $year)) {
                    $error[] = urlencode('Please enter a valid date.');
                } else {
                    $hire_date = $year . "-" . $month . "-" . $day;
                }
            }
            if (empty($error)) {
                $query = 'INSERT INTO
                    employees
                        ( emp_no, birth_date, first_name, last_name, gender,
                        hire_date)
                    VALUES
                        ("' . $emp_no . '",
                         "' . $birth_date . '",
                         "' . $first_name . '",
                         "' . $last_name . '",
                         "' . $gender . '",
                         "' . $hire_date . '")';
            } else {
                header('Location:employees.php?action=add' .
                '&error=' . urlencode(join('<br/>', $error)));
            }
            break;

        case 'people':
            $error = array();
            $people_fullname = isset($_POST['people_fullname']) ?
                trim($_POST['people_fullname']) : '';
            if (empty($people_fullname)) {
                $error[] = urlencode('Please enter a full name.');
            }
            $people_isactor = isset($_POST['people_isactor']) ?
                trim($_POST['people_isactor']) : '';
            $people_isdirector = isset($_POST['people_isdirector']) ?
                trim($_POST['people_isdirector']) : '';
                if ($people_isactor == '0' && $people_isdirector == '0') {
                    $error[] = urlencode("Please select at least one option for Is Actor or Is Director.");
                   
               }
                if (empty($error)) {
                    $query = 'INSERT INTO
                        people
                            (people_fullname, people_isactor, people_isdirector)
                        VALUES
                            ("' . $people_fullname . '",
                             ' . $people_isactor . ',
                             ' . $people_isdirector . ')';
                } else {
                    header('Location:people.php?action=add' .
                        '&error=' . urlencode(join('<br/>', $error)));
                }
                break;
        }
        break;
    case 'edit':
        switch ($_GET['type']) {
            case 'movie':
                $error = array();
                $movie_id = isset($_POST['movie_id']) ? (int)$_POST['movie_id'] : 0; // Sanitize as integer
            
                $movie_name = isset($_POST['movie_name']) ? mysqli_real_escape_string($db, trim($_POST['movie_name'])) : '';
                if (empty($movie_name)) {
                    $error[] = urlencode('Please enter a movie name.');
                }
            
                $movie_type = isset($_POST['movie_type']) ? (int)$_POST['movie_type'] : 0; // Sanitize as integer
                if (empty($movie_type)) {
                    $error[] = urlencode('Please select a movie type.');
                }
            
                $movie_year = isset($_POST['movie_year']) ? (int)$_POST['movie_year'] : 0; // Sanitize as integer
                if (empty($movie_year)) {
                    $error[] = urlencode('Please select a movie year.');
                }
            
                $movie_leadactor = isset($_POST['movie_leadactor']) ? (int)$_POST['movie_leadactor'] : 0; // Sanitize as integer
                if (empty($movie_leadactor)) {
                    $error[] = urlencode('Please select a lead actor.');
                }
            
                $movie_director = isset($_POST['movie_director']) ? (int)$_POST['movie_director'] : 0; // Sanitize as integer
                if (empty($movie_director)) {
                    $error[] = urlencode('Please select a director.');
                }
                
            
                $movie_release = isset($_POST['movie_release']) ? trim($_POST['movie_release']) : '';
                if (!preg_match('|^\d{2}-\d{2}-\d{4}$|', $movie_release)) {
                    $error[] = urlencode('Please enter a date in dd-mm-yyyy format.');
                } else {
                    list($day, $month, $year) = explode('-', $movie_release);
                    if (!checkdate($month, $day, $year)) {
                        $error[] = urlencode('Please enter a valid date.');
                    } else {
                        $movie_release = mktime(0, 0, 0, $month, $day, $year);
                    }
                }
                $movie_rating = isset($_POST['movie_rating']) ? 
            trim($_POST['movie_rating']) : '';
            if (!is_numeric($movie_rating)) {
                $error[] = urlencode('Please enter a numeric rating.');
            } else if ($movie_rating < 0 || $movie_rating > 10) {
                $error[] = urlencode('Please enter a rating between 0 and 10.');
            }
            
                if (empty($error)) {
                    $query = "UPDATE movie
                              SET 
                                  movie_name = '$movie_name',
                                  movie_year = $movie_year,
                                  movie_type = $movie_type,
                                  movie_leadactor = $movie_leadactor,
                                  movie_director = $movie_director,
                                  movie_release = $movie_release,
                                  movie_rating = $movie_rating
                              WHERE
                                  movie_id = $movie_id";
                } else {
                    $errores = join('<br/>', array_map('urlencode', $error));
                    header("Location: N6P104movie.php?action=edit&id=$movie_id&error=$errores");
                    exit();
                }
                break;
            }
            case 'people':
                $error = array();
                $people_fullname = isset($_POST['people_fullname']) ?
                    trim($_POST['people_fullname']) : '';
                if (empty($people_fullname)) {
                    $error[] = urlencode('Please enter a full name.');
                }
                $people_isactor = isset($_POST['people_isactor']) ?
                    trim($_POST['people_isactor']) : '';
                $people_isdirector = isset($_POST['people_isdirector']) ?
                    trim($_POST['people_isdirector']) : '';
                if ($people_isactor == '0' && $people_isdirector == '0') {
                     $error[] = urlencode("Please select at least one option for Is Actor or Is Director.");
                    
                }
                if (empty($error)) {
                    $query = 'UPDATE
                            people
                        SET 
                            people_fullname = "' . $people_fullname . '",
                            people_isactor = ' . $people_isactor . ',
                            people_isdirector = ' . $people_isdirector . '
                        WHERE
                            people_id = ' . $_POST['people_id'];
                } else {
                    $errores = join('<br/>', array_map('urlencode', $error));
                    header('Location:people.php?action=edit&id=' . $_POST['people_id'] . '&error=' . $errores);
                }
            break;
        break;
    }
    
    if (isset($query)) {
        $result = mysqli_query($db,$query) or die(mysqli_error($db));
    }
    ?>
    
    <html>
     <head>
      <title>Commit</title>
     </head>
     <body>
      <p>Done!</p>
     </body>
    </html>    