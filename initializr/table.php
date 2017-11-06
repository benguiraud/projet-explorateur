<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>explorateur de fichier</title>
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.min.css">

    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <link rel="stylesheet" href="dropzone-4.3.0/dist/min/dropzone.min.css">
    <link rel="stylesheet" href="dropzone-4.3.0/dist/basic.css">
    <script src="dropzone-4.3.0/dist/min/dropzone.min.js"></script>
    <script src="dropzone-4.3.0/dist/min/dropzone-amd-module.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">



</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->



    <header>
        <div class="col row">
        <div class="col-md-6">

            <form action="table.php" method="post">
                Créer un Dossier : <br>
                <input type="text" name="dossier">
                <input type="submit" value="Créer">
            </form>



            <?php

            $dossier = $_POST['dossier'];

            mkdir($dossier,0777);

            ?>






        </div>
        <div class="col-md-6">
            <form action="upload.php" class="dropzone"></form>
        </div>
        </div>




    </header>

    <main>

    </main>

    <table class="col-md-12">
        <tr>
            
            <td><b>Nom du fichier</b></td>
            <td><b>Taille du fichier</b></td>
            <td><b>Date</b></td>
            <td><b>Permission</b></td>
            <td><b>Download</b></td>
            <td><b>Delete</b></td>
        </tr>





        <?php

$directory = scandir('./');
            
foreach($directory as $element){
    echo 
        "<tr>" .
        "<td><a id='target' href='". $element ."'>". $element ."</a>
        <div class='box'><iframe src='". $element ."' width='300px' height='200px'></iframe></div></td>" .
        "<td>" . GetSizeName(stat($element)[7]) . "</td>" .
        "<td>" . date("d-m-Y H:i:", filemtime($element)) . "</td>" .
        "<td>" . listRights($element) . "</td>" .
        "<td><a href='" . $element . "'download><i class='fa fa-download' aria-hidden='true'></i></a></td>" .
        
        
        
        
        "<td>      
        
        
        
        
        <form method='POST' action='deletefile.php'>
        
            <input type='hidden' name = 'todelete'>
            <button class='fa fa-times' type='submit' name='submit'>delete</button>
        </form>
        
        
        
        
        
        
        
        
        
        
        </td>" .
        
        
        
        
        
        
        
        
        "</tr>" ; 
    }
            
//////////////////////////////////////////////////////////////////////     
            
            
//taille des elements
            
function GetSizeName($element)
{
 
    // Array contenant les differents unités 
    $unite = array(' octet',' ko',' mo',' go');
    
    if ($element < 1000) // octet
    {
        return $element.$unite[0];
    }
    else 
    {
        if ($element < 1000000) // ko
        {
            $ko = round($element/1024,2);
            return $ko.$unite[1];
        }
        else // Mo ou Go 
        {
            if ($element < 1000000000) // Mo 
            {
                $mo = round($element/(1024*1024),2);
                return $mo.$unite[2];
            }
            else // Go 
            {
                $go = round($element/(1024*1024*1024),2);
                return $go.$unite[3];    
            }
        }
    }
}
        
/////////////////////////////////////////////////////////////////

//gestion permission des fichiers

     
       function listRights($element){
               $rights = stat($element)['mode'];
               
               $result = base_convert($rights, 10, 8);
     
               $rights = str_split(substr($result, -3));
              
    
              $text_rights = "";
              foreach ($rights as $value) {
                      switch ($value) {
                              case 1 :
                              $text_rights .= "exec ";
                              break;
                              case 2 :
                              $text_rights .= "write ";
                              break;
                              case 3 :
                              $text_rights .= "write+exec ";
                              break;
                              case 4 :
                              $text_rights .= "read ";
                              break;
                              case 5 :
                              $text_rights .= "read+exec ";
                              break;
                              case 6 :
                              $text_rights .= "read+write ";
                              break;
                              case 7 :
                              $text_rights .= "read+write+exec ";
                              break;
                      }
              }
              return $text_rights;
    
      }
    
////////////////////////////////////////////////////////////////    
//Modal
?>
<!--        
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#target">
  Launch demo modal
</button>
target-->
<!-- Modal -->
<div class="modal fade" id="target" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
     </div>
    </div>
  </div>
</div>
        
<?php        
//////////////////////////////////////////////////////////////////
?>


    </table>

    <footer>

        <div class="col-md-6"></div>
        <div class="col-md-6"></div>


    </footer>




    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')

    </script>

    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">

    </script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(b, o, i, l, e, r) {
            b.GoogleAnalyticsObject = l;
            b[l] || (b[l] =
                function() {
                    (b[l].q = b[l].q || []).push(arguments)
                });
            b[l].l = +new Date;
            e = o.createElement(i);
            r = o.getElementsByTagName(i)[0];
            e.src = '//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e, r)
        }(window, document, 'script', 'ga'));
        ga('create', 'UA-XXXXX-X', 'auto');
        ga('send', 'pageview');

    </script>
</body>

</html>
