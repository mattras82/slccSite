<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Guitar Survey Results</title>
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
        $host = "localhost";
        $user = "root";
        $password = "coding20";
        $dbname = "Survey";

        $cats = array("Guitar Access", "Guitar Type", "Amp Control", "Experience",
            "Meeting Length", "Lessons", "Curriculum", "Performing", "Weekday", "Email");

        $access = array("Own a guitar" => 0, "Could borrow a guitar" => 0, "Does not own a guitar" => 0);
        $type = array("Acoustic guitar" => 0, "Electric guitar" => 0);
        $amp = array("No amp" => 0, "Quiet amp" => 0, "Volume hog" => 0);
        $expert = array("Never played" => 0, "Pluckers" => 0, "Chord stummers" => 0,
            "Song players" => 0, "Shredders" => 0);
        $meet_time = array("30 Minutes" => 0, "60 Minutes" => 0, "90 Minutes" => 0, "No hard duration" => 0);
        $lesson = array("Yes, lessons" => 0, "No teaching!" => 0);
        $crclm = array("Scales" => 0, "Chords" => 0, "Tabs" => 0, "Free Bird" => 0,
            "Theory" => 0, "Shredding" => 0);
        $perform = array("Absolutely" => 0, "Maybe" => 0, "Maybe not" => 0, "Hell no" => 0);
        $week = array("Monday" => 0, "Tuesday" => 0, "Wednesday" => 0, "Thursday" => 0, "Friday" => 0);
        $email = array();
        $group = array($access, $type, $amp, $expert, $meet_time, $lesson, $crclm, $perform, $week);

        $con = mysqli_connect($host, $user, $password, $dbname)
                or die('Could not connect to the database server' . mysqli_connect_error());

        $query = "SELECT * FROM Survey.Guitar_Club";
        $result = mysqli_query($con, $query);
        if (!$result) {
            die("Could not access the database. Please try again later.");
        }

        $rows = mysqli_num_rows($result);
        for ($i = 0; $i < $rows; $i++) {
            mysqli_data_seek($result, $i);
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
            for ($j = 0; $j < (count($row) - 2); $j++) {
                $ans = $row[($j + 1)];
                $vals = array_values($group[$j]);
                $keys = array_keys($group[$j]);
                if ($j != 6) {
                    if ($ans > 0) {
                        $ans--;
                        $key = $keys[$ans];
                        $change = $vals[$ans];
                        $change++;
                        $group[$j][$key] = $change;
                    }
                } else {
                    for ($n = 1; $n < 7; $n++) {
                        $needle = strval($n);
                        if (strpos($ans, $needle) !== false) {
                            $key = $keys[($n - 1)];
                            $change = $vals[($n - 1)];
                            $change++;
                            $group[$j][$key] = $change;
                        }
                    }
                }
            }
            $email[] = $row[(count($row) - 1)];
        }
        
        $display = '<h4 align="center">Number of responses: '.$rows.'</h4>';

        for ($i = 0; $i < count($group); $i++) {
            $display .= '<table><tr><th colspan="3">' . $cats[$i] . '</th></tr>';
            $display .= '<tr><td>Answer</td><td>Count</td><td>Ratio</td></tr>';
            foreach ($group[$i] as $key => $value) {
                $display .= '<tr><td>' . $key . '</td>';
                $display .= '<td>' . $value . '</td>';
                $ratio = 0;
                if ($value > 0) {
                    $ratio = round($value / $rows, 2) * 100;
                }
                $display .= '<td>' . $ratio . '%</td></tr>';
            }
            $display .= '</table>';
        }
        
        $display .= '<table align="center"><tr><th>Emails</th></tr>';
        foreach ($email as $value) {
            $display .= '<tr><td>'.$value.' </td></tr>';
        }
        $display .= '</table>';
        echo $display;
        ?>
        </div>
        </div>
    </body>
</html>
