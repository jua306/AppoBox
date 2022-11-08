<?php
include("conexion.php");

?>
<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Matriz RRSS Público - Editor</title>
  <link href="assets/dist/themes/Flaty/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="//biblioteca.emtelco.co/_plugins/inputmask/js/inputmask.js"></script>
  <!-- Actulizar versión de 3 a 4 boostrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="assets/css/styles.css">

  <section class="header-border">
    <header class="header">
      <div class="">
        <image src="../img/banner.jpg" style=" width:100%;" class="img-fluid"></image>
      </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary"><span style="color:#1a2a68; font-size:20px;">&nbsp;</span>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">          
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <!--  <input type="search" class="form-control" id="my-search" placeholder="¿Qué estás buscando?">-->
          <input type="text" id="myInput" onkeyup="myFunction(this)" placeholder="¿Qué estás buscando?" style="color:black!important">
          <button type="button" class="btn btn-primary" onclick="Limpiar()">Limpiar búsqueda</button>
          <a href="#" data-toggle="modal" data-target="#Modal_nuevo">
            <button type="button" class="btn btn-primary">Nuevo Registro</button>
          </a>
        </form>

        
        

      </div>
    </nav>
  </section>

<body>

  <center>
    <!-- id="example-table"  -->
    <table class="tableizer-table table table-bordered table-striped " id="myTable" style="width:98%;margin-bottom: 60px;text-align: justify;">
      <thead>
        <tr class="tableizer-firstrow">
        <th>Nombre aplicativo</th>
        <th>Definición</th>
        <th>Para que sirve</th>
        <th>url1</th>
        <th>manual1</th>
        <th>Requisitos</th>
        <th>Tecnologia</th>
        <th>Editar</th>
      
        </tr>
      </thead>
      <tbody>

        <?php
        $query = "SELECT * FROM `datos1`";
        $resultadoc = $conexion->query($query);
        while ($row = $resultadoc->fetch_assoc()) {
        ?>
          <tr height=28 style='height:21.0pt'>
            
               <td><?php  echo $row['nombre_aplicativo']?></td>
               <td><?php  echo $row['definicion']?></td>
               <td><?php  echo $row['para_que_sirve']?></td>
               <td><a href="<?php  echo $row['url1']?>"> <img src="../img/www.png" style = "width:25px;"></a></td>  
               <td><a href="<?php  echo $row['manual1']?>"> <img src="../img/informacion.png" style = "width:25px;"></a></td>  
               <td><?php  echo $row['requisitos']?></td>
               <td><?php  echo $row['Tecnologia']?></td>
               <td height=28 style='height:21.0pt;border-top:none'>
              <a href="#" data-toggle="modal" data-target="#Modal_<?= utf8_encode($row["id_datos"]); ?>">
                <i class="fa fa-pencil"></i>
              </a>
              <a href="" data-toggle="modal" data-target="#Modalelimin_<?= utf8_encode($row["id_datos"]); ?>">
                <i class="fa fa-trash"></i>
              </a>
            </td>
            <!-- Modal -->
            <div class="modal fade" id="Modal_<?= utf8_encode($row["id_datos"]); ?>" 
            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editando Registro #<?= utf8_encode($row["id_datos"]); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="POST" action="./actualizar.php">
                    <div class="modal-body">
                      <div class="row">

                      <div class="col-md-12">
                          <label> </label>
                          <input type="hidden" name="id_datos" value="<?= utf8_encode($row["id_datos"]); ?>">
                        
                        </div>

                        <div class="col-md-12">
                          <label>Nombre del Aplicativo </label>
                          <input type="hidden" name="datos1" value="<?= utf8_encode($row["datos1"]); ?>">
                          <textarea class="form-control" name="nombre"><?= $row["nombre_aplicativo"]; ?></textarea>
                        </div>

                        <div class="col-md-12">
                          <label>definicion</label>
                          <textarea class="form-control" name="definicion"><?= $row["definicion"]; ?></textarea>
                        </div>                       
                        <div class="col-md-12">
                          <label>Para que sivre </label>
                          <textarea class="form-control" name="para_que_sirve"><?= $row["para_que_sirve"]; ?></textarea>
                        </div>

                        <div class="col-md-12">

                          <label>url1</label>
                          <textarea class="form-control" name="url1"><?= $row["url1"]; ?></textarea>
                        </div>

                        <div class="col-md-12">
                          <label>manual1</label>
                          <textarea class="form-control" name="manual1"><?= $row["manual1"]; ?></textarea>
                        </div>
                        <div class="col-md-12">
                          <label>Requisitos</label>
                          <textarea class="form-control" name="requisitos"><?= $row["requisitos"]; ?></textarea>
                        </div>
                        <div class="col-md-12">
                          <label>Tecnologia</label>
                          <textarea class="form-control" name="Tecnologia"><?= $row["Tecnologia"]; ?></textarea>
                        </div>

                        <div class="col-md-12">
                          <label>Clave</label>
                          <input type=password class="form-control" name="clave">
                        </div>

                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                  </form>


                </div>
              </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="Modalelimin_<?= utf8_encode($row["id_datos"]); ?>"
             tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editando Registro #<?= utf8_encode($row["id_datos"]); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="POST" action="./eliminar.php">
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-12">
                          <input type="hidden" name="id_datos" value="<?= utf8_encode($row["id_datos"]); ?>">


                          <div class="col-md-12">
                            <label>Clave</label>
                            <input type=password class="form-control" name="clave">
                          </div>

                        </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                      </div>
                  </form>


                </div>
              </div>
            </div>
          </tr>
        <?php
        }
        ?>

      </tbody>
    </table>
  </center>
  <footer class="footer">
    <div class="footer-copyright text-center py-3">Emtelco | Tigo</div>
  </footer>




  <!-- Modal -->
  <div class="modal fade" id="Modal_nuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo Registro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form method= "POST" action="./guardar.php">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <label>Nombre Aplicativo	</label>
                <textarea class="form-control" name="nombre"></textarea>
              </div>
              <div class="col-md-12">
                <label>Definicion</label>
                <textarea class="form-control" name="definicion"></textarea>
              </div>
              <div class="col-md-12">
                <label>Para que Sirve</label>
                <textarea class="form-control" name="para_que_sirve"></textarea>
              </div>
              <div class="col-md-12">
                <label>url1</label>
                <textarea class="form-control" name="url1"></textarea>
              </div>
              <div class="col-md-12">
                <label>manual1</label>
                <textarea class="form-control" name="manual1"></textarea>
              </div>
              <div class="col-md-12">
                <label>Requisitos</label>
                <textarea class="form-control" name="requisitos"></textarea>
              </div>
              <div class="col-md-12">
                <label>Tecnologia</label>
                <textarea class="form-control" name="Tecnologia"></textarea>
              </div>
              
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
<style>
  mark,
  .mark {
    padding: .2em;
    background-color: #e8d156 !important;
  }

  .table>thead>tr>th {
    vertical-align: bottom;
    border-bottom: 4px solid #5191cc;
    background-color: #28428d;
    color: white;
    padding: 15px;
    text-align: center;
  }

  .btn-primary {
    color: #fff;
    background-color: #14326b;
    border-color: #14326b;
    margin-left: 15px;
  }
</style>
<script>
  /*
    $(function () {
        $("#my-search").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#example-table > tbody > tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
 function Limpiar() {
        $('#my-search').val('');
    }
   
*/




  function Limpiar() {
    location.reload();
  }


  function createTagAndAppendTo(tag, txt, elem) {
    let customTag = document.createElement(tag);
    customTag.textContent = txt;
    elem.append(customTag);
  }

  function myFunction(evt) {
    // Declare variables
    let input, filter, table, tr, td, i, txtValue;
    let displayTr = [];
    filter = evt.value;
    table = document.getElementById("myTable");
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
            createTagAndAppendTo('span', strArray[i], td[j]);
            createTagAndAppendTo('mark', filter, td[j]);
          }
          createTagAndAppendTo('span', strArray[loopLength], td[j]);

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