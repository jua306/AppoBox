<?php
$conexion = mysqli_connect ("localhost","root", "", "appbox");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8"> 
    <title>AppBox</title>

    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" target="_blank"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>

    <!-- Datatables -->
    <link rel="stylesheet" target="_blank" 
    href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.css">
    <script src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.js"></script>
    
    
</head>

<body>
    <header>
        <img src="./img/banner.jpg" alt="" style="background-repeat: no-repeat;
        background-position: center;
        width: 100%;">
    </header>
    <div class="container-fluid pl-5 pr-5">
        <div class="table-responsive" id="mydatatable-container">
        <input type='search' class='form-control ' onkeyup="myFunction(this)" name="keyword" id='my-search3'
                placeholder='¿Qué estás buscando?' style='width:30%;'>
        <style type=" text/css">
            mark,
            .mark {
                padding: .2em;
                background-color:#FFFF00 !important;
            }
            
            </style>
            <table  class="tableizer-table table table-bordered table-striped"  style="width:98%;margin-bottom: 60px;text-align: justify;">
                <thead>
                    <tr>
                    <td class="rtecenter" style="vertical-align: middle; border-color: rgb(255, 255, 255); background-color:#0000FF; border-top-left-radius: 15px;"><span style="color:#000000;"><strong>Nombre aplicativo</strong></span></td>
                    <td  class="rtecenter" style="vertical-align: middle; border-color: rgb(255, 255, 255); background-color: #0000FF;"><span style="color:#FFFFFF;"><span style="color:#000000;"><strong>Definición</strong></span></td>
                    <td  class="rtecenter" style="vertical-align: middle; border-color: rgb(255, 255, 255); background-color: #0000FF;"><span style="color:#FFFFFF;"><span style="color:#000000;"><strong>Para que sirve</strong></span></td>
                    <td  class="rtecenter" style="vertical-align: middle; border-color: rgb(255, 255, 255); background-color: #0000FF;"><span style="color:#FFFFFF;"><span style="color:#000000;"><strong>URL</strong></span></td>
                    <td  class="rtecenter" style="vertical-align: middle; border-color: rgb(255, 255, 255); background-color: #0000FF;"><span style="color:#FFFFFF;"><span style="color:#000000;"><strong>Manual</strong></span></td>
                    <td  class="rtecenter" style="vertical-align: middle; border-color: rgb(255, 255, 255); background-color: #0000FF;"><span style="color:#FFFFFF;"><span style="color:#000000;"><strong>Requisitos</strong></span></td>
                    <td td class="rtecenter" style="vertical-align: middle; border-color: rgb(255, 255, 255); background-color: #0000FF; border-top-right-radius: 15px;"><span style="color:#000000;><span style="color:#000000;"><strong>Tecnologia</strong></span></td>
                     
                      
                    </tr>
                </thead>
                
                <tbody id="example-table3">
                <?php
                   $query = "SELECT * FROM `datos1`";
                   $resultadoc = $conexion->query($query);
                   while ($row = $resultadoc->fetch_assoc()) {
               ?>
             <tr height=28 style='height:21.0pt'>
            
               <td><?php  echo $row['nombre_aplicativo']?></td>
               <td><?php  echo $row['definicion']?></td>
               <td><?php  echo $row['para_que_sirve']?></td>
               <td><a href="<?php  echo $row['url1']?>"> 
               <img src="./img/www.png" style = "width:25px;"></a></td>  
               <td><a href="<?php  echo $row['manual1']?>"> 
               <img src="./img/informacion.png" style = "width:25px;"></a></td>             
               <td><?php  echo $row['requisitos']?></td>
               <td><?php  echo $row['Tecnologia']?></td>
       
              </tr>
                 <?php 
                      }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <style>
        #mydatatable tfoot input {
            width: 100% !important;
        }

        #mydatatable tfoot {
            display: table-header-group !important;
        }
    </style>

    <script >
  function createTagAndAppendTo1(tag, txt, elem) {
        let customTag = document.createElement(tag);
        customTag.textContent = txt;
        elem.append(customTag);
    }

    function myFunction(evt) {
        // Declare variables
        let input, filter, table, tr, td, i, txtValue;
        let displayTr = [];
        filter = evt.value;
        table = document.getElementById("example-table3");
        tr = table.getElementsByTagName("tr");
        let regExp = new RegExp(filter);
        if (!filter) {
            for (let i = 0; i < tr.length; i++) {
                tr[i].style.display = '';
            }
            return;
        }

        // Loop through all table rows, and hide those who don't match the search query
        for (let i = 0; i < tr.length; i++) {
            let trStyle = tr[i].style.display;
            td = tr[i].getElementsByTagName("td");
            for (let j = 0; j < td.length; j++) {

                txtValue = td[j].textContent.toLowerCase();
                txtValue2 = td[j].textContent;

                let count = (txtValue.match(regExp) || []).length;
                displayTr[i] = displayTr[i] ? displayTr[i] : count;
                if (count !== 0) {

                    td[j].innerText = '';
                    let strArray = txtValue.split(filter);
                    let loopLength = strArray.length - 1;

                    for (let i = 0; i < loopLength; i++) {
                        createTagAndAppendTo1('span', strArray[i], td[j]);
                        createTagAndAppendTo1('mark', filter, td[j]);
                    }
                    createTagAndAppendTo1('span', strArray[loopLength], td[j]);

                } else {
                    let tdStr = td[j].textContent;
                    td[j].innerText = '';
                    td[j].textContent = tdStr;

                }
            }

            if (displayTr[i] !== 0) {
                tr[i].style.display = '';
            } else {
                tr[i].style.display = 'none';
            }
        }
    }
</script>
</body>

</html>

