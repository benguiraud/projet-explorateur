<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>explorateur</title>
</head>

<body>
    <header>
    <div class="col-md-6"></div>
    <div class="col-md-6"></div>
    
    
    
    </header>
    <div class="col-md-12">
    <table>
        <tr>
            <td>Nom du fichier</td>
            <td>taille du fichier</td>
            <td>date</td>
            <td>permission</td>
            <td><!download></td>
            <td><!delete></td>
        </tr>
<?php

        
           $name=basename (file);
           $size=filesize;
           $date=filemtime;
           $rights=stat ('tile.png');
         /*  $download=include();
           $delete=include(); */
        
        var_dump($rights);
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
           $table = array ($name,$size,$date,$rights,$dl,$delete);
            var_dump ($table) ;
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        
        
        foreach ($table as $value)
            echo "<tr><td>".$name."</td><td>".$size."</td><td>".$date."</td><td>".$right."</td><td>".$dl."</td><td>".$delete."</td></tr>";

        
        
        var_dump(scandir('./'));
        $test = scandir('./');
        foreach ($test as $value){
            echo $value.'<br>';
            
            var_dump(stat($value));
            
            echo "<br>";
            
            
            echo "valeur des droits :" . stat($value)[2];
            echo "<br>";

            }
        
        
?>
    </table>
    </div>
    <footer>
    
        <div class="col-md-6"></div>
        <div class="col-md-6"></div>
    
    
    </footer>
</body>
</html>