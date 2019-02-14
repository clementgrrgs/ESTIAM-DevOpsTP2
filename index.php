<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>DevOps-TP2</title>
    </head>
    <body>
        <h4>Compteur</h4>
        <br>
        <?php
            $servername = "mariadb";
            $username = "user";
            $password = "pwd";
            $dbname = "testdb";


            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            
            $conn->query("CREATE TABLE `testdb`.`compteur` ( `id` INT NOT NULL AUTO_INCREMENT , `value` INT NOT NULL , PRIMARY KEY (`id`));");

            $conn->query("INSERT INTO `testdb`.`compteur` (`id`,`value`) VALUES (1,0);");

            $conn->query("UPDATE compteur SET value=value+1 WHERE id=1");

            $res = $conn->query("SELECT value FROM compteur WHERE id=1");
            $row = $res->fetch_array(MYSQLI_NUM);
            echo "Compteur : ". $row[0];

        ?>
    </body>
</html>