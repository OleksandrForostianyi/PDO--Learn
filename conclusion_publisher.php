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
                        <td>ISBN</td>
                        <td>Publisher</td>
                        <td>Year</td>
                        <td>Count</td>
                </tr>
            </thead>
            <?php
                $db_driver="mysql"; $host = "laba1"; $database = "lb_pdo_library";
                $dsn = "$db_driver:host=$host; dbname=$database";
                $username = "root"; $password = ""; $publisher = $_POST['pub'];
                try {
                    $dbh = new PDO ($dsn, $username, $password, $options);
                    //echo "Connected to database<br>";
                    } catch (PDOException $e) {
                        echo "Error!: " . $e->getMessage() . "<br/>"; die();
                    }
                    
                $SQL="SELECT literature.NAME, literature.ISBN, literature.PUBLISHER, literature.YEAR, literature.NUMBER FROM literature WHERE literature.PUBLISHER = '".$publisher."'";
                try {
                    $zapros = $dbh->prepare($SQL);
                    $zapros->execute();
                    $result=$zapros->fetchAll(PDO::FETCH_ASSOC);
                    } catch (PDOException $e) {
                        echo "Error!: " . $e->getMessage() . "<br/>"; die();
                    }
                foreach($result as $row){
                    echo "<tr><td>".$row['NAME']."</td><td>".$row['ISBN']."</td><td>".$row['PUBLISHER']."</td><td>".$row['YEAR']."</td><td>".$row['NUMBER']."</td></tr>";
                }
            ?>
        </table>

    </body>
</html>