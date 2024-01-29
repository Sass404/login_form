<?php
        include('connect.php');
?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <link rel="stylesheet" href="ssc.css"/>
        <meta charset="UTF-8"/>
        <title>utente</title>
    </head>
    <body>
        <form action="index" method="GET">
            <input type="text" name="nick"/>
            <input type="password" name="pss"/>
            <input type="submit" value="accedi"/>
        </form>
<?php
        $n = $_GET['nick'];
        $pss = $_GET['pss'];

        $query = "  SELECT Nome, Cognome 
                    FROM rubrica.persona 
                    WHERE User= \"$n\" AND passwords = \"$pss"\"";
        $k = mysqli_query($c, $query);
        $f=mysqli_fetch_array($k, MYSQLI_ASSOC);
        echo"Bentornato \"$f[Nome]\" \"$f[Cognome]\"";

        $controlla = "  SELECT TipoU 
                        FROM rubrica.persona 
                        WHERE User= '$n' AND passwords = '$pss'";
        
        if($controlla == "a"){
            echo"
                <form action=\"index\" method=\"GET\">
                    <input type=\"text\" name=\"nome\"/>
                    <input type=\"text\" name=\"cognome\"/>
                    <input type=\"text\" name=\"tipoU\"/>
                    <input type=\"text\" name=\"user\"/>
                    <input type=\"password\" name=\"password\"/>
                    <input type=\"submit\" value=\"registati\"/>
                </form>
            ";
            $n = $_GET['nome'];
            $c = $_GET['cognome'];
            $t = $_GET['tipoU'];
            $u = $_GET['user'];
            $p = $_GET['password'];
            $quer = "   INSERT INTO Utente(User, Passwords, Nome, Cognome, tipoU)
                    VALUES($n, $c, $u, $p, $t);
        }
        else
            echo"Mi dispiace ma non sei abbastanza importante";    
?>
    </body>
</html>