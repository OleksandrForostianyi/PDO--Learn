<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="style.css">
      <title>HTML Document</title>
    </head>
    <body>
        <h1>Вывод данных</h1>
        
        <table> 
            <thead>
                <tr>
                        <td>Name</td>  
                        <td>Year</td>
                </tr>
            </thead>
            <?php
                $db_driver="mysql"; $host = "laba1"; $database = "lb_pdo_library";
                $dsn = "$db_driver:host=$host; dbname=$database";
                $username = "root"; $password = ""; 
                $in_year = $_POST['in_year']; $out_year = $_POST['out_year'];
                try {
                    $dbh = new PDO ($dsn, $username, $password, $options);
                    // echo "Connected to database<br>";
                    } catch (PDOException $e) {
                        echo "Error!: " . $e->getMessage() . "<br/>"; die();
                    }
                $SQL="SELECT NAME, YEAR FROM `literature` WHERE YEAR BETWEEN ".$in_year." AND ".$out_year.";";
                try {
                    $diaposone = $dbh->prepare($SQL);
                    $diaposone->execute();
                    $result=$diaposone->fetchAll(PDO::FETCH_ASSOC);

                    } catch (PDOException $e) {
                        echo "Error!: " . $e->getMessage() . "<br/>"; die();
                    }
                foreach($result as $row){
                    echo "<tr><td>".$row['NAME']."</td><td>".$row['YEAR']."</td></tr>";
                }
            ?>
        </table>
    </body>
</html>