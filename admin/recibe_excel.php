<!DOCTYPE html>
     <html>

     <head>
         <meta charset="utf-8">
         <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <title></title>
         <link rel="stylesheet" href="">
     </head>

     <body>
         <?php
            header('Content-Type: text/html; charset=UTF-8');
            require('./conexion.php');
            //indicadores ig
            $tipo       = $_FILES['informacion']['type'];
            $tamanio    = $_FILES['informacion']['size'];
            $archivotmp = $_FILES['informacion']['tmp_name'];
            $lineas     = file($archivotmp);

            $i = 0;
            if ($tipo === 'text/csv') {
                $delete = "DELETE FROM datos";
                mysqli_query($conexion, $delete);

                foreach ($lineas as $linea) {
                    $cantidad_registros = count($lineas);
                    $cantidad_regist_agregados =  ($cantidad_registros - 1);

                    if ($i != 0) {

                        $datos = explode(";", $linea);

                        $nombre =         utf8_encode(trim($datos[0]));
                        $definicion =     utf8_encode(trim($datos[1]));
                        $para_que_sirve = utf8_encode(trim($datos[2]));
                        $url1 =           utf8_encode(trim($datos[3]));
                        $manual1 =        utf8_encode(trim($datos[4]));
                        $requisitos =     utf8_encode(trim($datos[5]));
                        $Tecnologia =     utf8_encode(trim($datos[6]));
                       

                        $sqlInsertPersona = "INSERT INTO datos1 (nombre_aplicativo, definicion, para_que_sirve, url1, manual1,requisitos,Tecnologia ) 
                        VALUES ('$nombre','$definicion','$para_que_sirve','$url1','$manual1','$requisitos','$Tecnologia')";

                        $queryResultado = mysqli_query($conexion, $sqlInsertPersona);
                    }
                    $i++;
                }
            } else {
                echo "El archivo no es CSV";
            }

            //redireccionamiento
            header("Location: ./editar.php");
            ?>
     </body>

     </html>