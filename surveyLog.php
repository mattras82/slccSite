<!DOCTYPE html>
<html>
    <head>
        <title>Guitar Club Survey</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles/layout.css">
    </head>
    <body>
        
        <div class="container">
        <div class="head">
            <header><h2>Nelson Labs Guitar Club Survey</h2></header>
        </div>
        <div class="content">
        <?php
        $results = array();
        $own1 = filter_input(INPUT_POST, 'own1', FILTER_SANITIZE_NUMBER_INT);
        array_push($results, $own1);
        if (!empty($_POST['own'])) {
            $own = filter_input(INPUT_POST, 'own', FILTER_SANITIZE_NUMBER_INT);
        } else {
            $own = 0;
        }
        array_push($results, $own);
        if (!empty($_POST['elec'])) {
            $elec = filter_input(INPUT_POST, 'elec', FILTER_SANITIZE_NUMBER_INT);
        } else {
            $elec = 0;
        }
        array_push($results, $elec);
        if (!empty($_POST['exp'])) {
            $exp = filter_input(INPUT_POST, 'exp', FILTER_SANITIZE_NUMBER_INT);
        } else {
            $exp = 0;
        }
        array_push($results, $exp);
        if (!empty($_POST['time'])) {
            $time = filter_input(INPUT_POST, 'time', FILTER_SANITIZE_NUMBER_INT);
        } else {
            $time = 0;
        }
        array_push($results, $time);
        if (!empty($_POST['lesson'])) {
            $lesson = filter_input(INPUT_POST, 'lesson', FILTER_SANITIZE_NUMBER_INT);
        } else {
            $lesson = 0;
        }
        array_push($results, $lesson);
        if (!empty($_POST['crclm'])) {
            $crclm = "";
            foreach ($_POST['crclm'] as $val) {
                $crclm .= $val . ', ';
            }
            $length = strlen($crclm);
            $crclm = substr($crclm, 0, ($length - 2));
        } else {
            $crclm = 0;
        }
        array_push($results, $crclm);
        if (!empty($_POST['play'])) {
            $play = filter_input(INPUT_POST, 'play', FILTER_SANITIZE_NUMBER_INT);
        } else {
            $play = 0;
        }
        array_push($results, $play);
        if (!empty($_POST['week'])) {
            $week = filter_input(INPUT_POST, 'week', FILTER_SANITIZE_NUMBER_INT);
        } else {
            $week = 0;
        }
        array_push($results, $week);
        if (!empty($_POST['email'])) {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        } else {
            header("Location:survey.html");
        }
        array_push($results, $email);

        $host = "localhost";
        $user = "root";
        $password = "coding20";
        $dbname = "Survey";

        $con = mysqli_connect($host, $user, $password, $dbname)
                or die('Could not connect to the database server' . mysqli_connect_error());
        
        $fields = "(Guitar_Own, Guitar_Kind, Amp_Control, Guitar_Experience, Meeting_Time, Lesson, Curriculum, Performing, Weekday, Email)";
        $values = "('";
        foreach ($results as $value) {
            $values .= $value . "', '";
        }
        $v_length = strlen($values);
        $values = substr($values, 0, ($v_length - 3));
        $values .= ")";
        
        $query = "INSERT INTO Survey.Guitar_Club ".$fields." VALUES ".$values;
        $check = mysqli_query($con, $query);
        if ($check) {
            echo '<h3 align="center">Thanks for taking the survey! You should be hearing more about the club soon.</h3>';
        } else {
            echo "Oh no! Something went wrong. Please try again.";
            echo "<br>Query: ".$query;
        }

        $con->close();
        ?>
        </div>
        </div>
    </body>
</html>
