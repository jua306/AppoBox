<?php
include("conexion.php");

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
    <link rel="stylesheet" target="_blank" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>

    <!-- Datatables -->
    <link rel="stylesheet" target="_blank" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.css">
    <script src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.js"></script>
</head>

<body>
    <header>
        <img src="../img/banner.jpg" alt="" style="background-repeat: no-repeat;
        background-position: center;
        width: 100%;">
    </header>
     
            </ul>
        <form class="form-inline my-2 my-lg-0">
          <!--  <input type="search" class="form-control" id="my-search" placeholder="¿Qué estás buscando?">-->
            <a href="#" data-toggle="modal" data-target="#Modal_nuevo">
            <button type="button" class="btn btn-primary">Nuevo Registro</button>
          </a>

    <div class="container-fluid pl-5 pr-5">
        
        <div class="table-responsive" id="mydatatable-container">
            <table class="records_list table table-striped table-bordered table-hover" id="mydatatable">
            <thead>
        <tr class="tableizer-firstrow">
        <th>Nombre aplicativo</th>
        <th>Definición</th>
        <th>Para que sirve</th>
        <th>URL</th>
        <th>Manual</th>
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
            
               <th><?php  echo $row['nombre_aplicativo']?></th>
               <th><?php  echo $row['definicion']?></th>
               <th><?php  echo $row['para_que_sirve']?></th>
               <th><a href="<?php  echo $row['url']?>"> <img src="../img/www.png" style = "width:25px;"></a></th>  
               <th><?php  echo $row['manual']?></th>
               <th><?php  echo $row['requisitos']?></th>
               <th><?php  echo $row['Tecnologia']?></th>
               <td height=28 style='height:21.0pt;border-top:none'>
              <a href="#" data-toggle="modal" data-target="#Modal_<?= utf8_encode($row["datos1"]); ?>">
                <i class="fa fa-pencil"></i>
              </a>
              <a href="#" data-toggle="modal" data-target="#Modalelimin_<?= utf8_encode($row["datos1"]); ?>">
                <i class="fa fa-trash"></i>
              </a>
            </td>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydatatable tfoot th').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Filtrar.." />');
            });

            var table = $('#mydatatable').DataTable({
                "dom": 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
                "responsive": false,
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                },
                "order": [
                    [0, "desc"]
                ],
                "initComplete": function() {
                    this.api().columns().every(function() {
                        var that = this;

                        $('input', this.footer()).on('keyup change', function() {
                            if (that.search() !== this.value) {
                                that
                                    .search(this.value)
                                    .draw();
                            }
                        });
                    })
                }
            });
        });
    </script>
</body>

</html>

