<!DOCTYPE html>
<html>
   <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>PHP</title>
    </head>
    <body>
    <h1>Выбор вывода данных</h1>
    
    <form method="post" action="conclusion_publisher.php">
    <h2>За изданием</h2>
        <select name="pub" style="width: 8px; border: 1px; border-radius: 0 8px 8px 0;">
            <?php
                $db_driver="mysql"; $host = "laba1"; $database = "lb_pdo_library";
                $dsn = "$db_driver:host=$host; dbname=$database";
                $username = "root"; $password = "";
                try {
                    $dbh = new PDO ($dsn, $username, $password, $options);
                    //echo "Connected to database<br>";
                    } catch (PDOException $e) {
                        echo "Error!: " . $e->getMessage() . "<br/>"; die();
                    }
                $SQL="SELECT DISTINCT PUBLISHER FROM literature;";
                try {
                    $publisher = $dbh->prepare($SQL);
                    $publisher->execute();
                    $result=$publisher->fetchAll(PDO::FETCH_COLUMN);
                    } catch (PDOException $e) {
                        echo "Error!: " . $e->getMessage() . "<br/>"; die();
                    }
                foreach($result as $row){
                    echo '<option value="'.$row.'">'.$row.'</option>';
                }
            ?>          
        </select>

        <div>
            <button type="submit">Найти!</button>
        </div>
    </form>

    <form method="post" action="conclusion_year.php">
    <h2>За диапазоном</h2>
        <input type="number" name="in_year">
        <input type="number" name="out_year">

        <div>
            <button type="submit">Найти!</button>
        </div>
    </form>

    <form method="post" action="conclusion_author.php">
    <h2>За автором</h2>
        <select name="author">
        <?php
                $db_driver="mysql"; $host = "laba1"; $database = "lb_pdo_library";
                $dsn = "$db_driver:host=$host; dbname=$database";
                $username = "root"; $password = "";
                try {
                    $dbh = new PDO ($dsn, $username, $password, $options);
                    //echo "Connected to database<br>";
                    } catch (PDOException $e) {
                        echo "Error!: " . $e->getMessage() . "<br/>"; die();
                    }
                $SQL="SELECT DISTINCT NAME FROM author;";
                try {
                    $NameAuthor = $dbh->prepare($SQL);
                    $NameAuthor->execute();
                    $result=$NameAuthor->fetchAll(PDO::FETCH_COLUMN);
                    } catch (PDOException $e) {
                        echo "Error!: " . $e->getMessage() . "<br/>"; die();
                    }
                foreach($result as $row){
                    echo '<option value="'.$row.'">'.$row.'</option>';
                }
            ?>   
        </select>
        <div>
            <button type="submit">Найти!</button>
        </div>
    </form>

   </body>
</html>