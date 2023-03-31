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
                $author = $_POST['author'];
                try {
                    $dbh = new PDO ($dsn, $username, $password, $options);
                    // echo "Connected to database<br>";
                    } catch (PDOException $e) {
                        echo "Error!: " . $e->getMessage() . "<br/>"; die();
                    }

                    $SQL="SELECT literature.NAME, literature.YEAR
                    FROM literature, author, book_authrs 
                    WHERE literature.Id = book_authrs.FID_BOOK 
                    AND author.Id = book_authrs.FID_AUTH AND author.NAME 
                    LIKE '$author';";
                try {
                    $NameAuthor = $dbh->prepare($SQL);
                    $NameAuthor->execute();
                    $result=$NameAuthor->fetchAll(PDO::FETCH_ASSOC);
                    } catch (PDOException $e) {
                        echo "Error!: " . $e->getMessage() . "<br/>"; die();
                    }
                foreach($result as $row){
                    echo "<tr><td>".$row['NAME']."</td><td>".$row['YEAR']."</td></tr>";
                }
               // print_r($result);
            ?>
        </table>
    </body>
</html>