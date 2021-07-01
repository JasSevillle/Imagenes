<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

$con = new SQLite3("base.db") or die("Problemas para conectar");

$cs = $con -> query("SELECT * FROM nombresBlackDragons");



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="col-md-8 mx-auto my-5">
        <h1 class="bg-primary text-white p-3 rounded text-center">Lista</h1>
        <table class="table">
            <thead class="bg-primary text-white">
                <tr>
                    <th>
                        Nombre
                    </th>
                
                    <th>
                        Apellido Paterno
                    </th>
                
                    <th>
                        Apellido Materno
                    </th>
                
                    <th>
                        Matricula
                    </th>
                
                    <th>
                        Imagen
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                while ($resul = $cs -> fetchArray()) {
                    $nombre = $resul['nombre'];
                    $aPaterno = $resul['aPaterno'];
                    $aMaterno = $resul['aMaterno'];
                    $matricula = $resul['matricula'];
                    
                    
                echo '
                <tr>
                <td>
                    '.$nombre.'
                </td>
                <td>
                    '.$aPaterno.'
                </td>
                <td>
                    '.$aMaterno.'
                </td>
                </td>
                <td>
                    '.$matricula.'
                </td>
                <td class="align-middle">
                <img class="rounded" src="img/'.$matricula.'.jpg" style="width: 100px;">
                
                </td>
                </tr>';
                
                }
                
                $con -> close();
                ?>
                
            
            
            </tbody>
        </table>
    </div>
</div>
</body>
</html>