<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>50 States</title>
    </head>
    <body>
        <?php
        $i = 1;
        while ($i <= 50) {
            echo $i.'<input align="justify" type="text" name="state"/><br/>';
            $i++;
        }
        ?>
    </body>
</html>
