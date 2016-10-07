<?php include_once 'auxiliar.php'?>

<html>
    <head>
        <meta charset="UTF-8">
        <!-- CSS BOOTSTRAP-->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <!-- CSS DATABLES-->
        <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <title>Gestión Clientes</title>
    </head>
    <body>
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <!-- CABECERA TABLA CLIENTES-->
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>DNI</th>
                    <th>Dirección</th>
                    <th>Localidad</th>
                    <th>Provincia</th>
                    <th>CP</th>
                    <th>Contratos</th>
                </tr>
            </thead>
            <!-- CUERPO TABLA CLIENTE-->
            <!-- Se inserta por cada cliente encontrado una fila con los datos del cliente -->
            <tbody>
                <?php foreach ($datos as $value){?>    
                    <tr>                        
                        <td><?= $value['NOMBRE'] ?></td>
                        <td><?= $value['APELLIDOS'] ?></td>
                        <td><?= $value['DNI'] ?></td>
                        <td><?= $value['DIRECCION'] ?></td>
                        <td><?= $value['LOCALIDAD'] ?></td>
                        <td><?= $value['PROVINCIA'] ?></td>
                        <td><?= $value['CP']?></td>                        
                        
                        <td>
                            <!-- BOTON PARA LANZAR MODAL -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?=$value['IDCLIENTE']?>">
                                Ver
                            </button>
                            <!-- CONTENIDO A MOSTRAR EN EL MODAL -->
                            <div class="modal fade" id="myModal<?=$value['IDCLIENTE']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Contratos de <?= $value['NOMBRE'].  " " . $value['APELLIDOS'] ?></h4>
                                        </div>
                                        <!-- LLAMAMOS A FUNCION PARA MOSTRAR CADA CONTRATO DE UN CLIENTE -->
                                        <div class="modal-body">
                                            <?php  getContratos($value['IDCLIENTE']) ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                <?php } ?>

            </tbody>
            <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>DNI</th>
                    <th>Dirección</th>
                    <th>Localidad</th>
                    <th>Provincia</th>
                    <th>CP</th>
                    <th>Contratos</th>
                </tr>
            </tfoot>
            
        </table>

        <!--SCRIPTS JS-->
        <script src="//code.jquery.com/jquery-1.12.3.js"></script><!-- jQuery-->

        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script><!-- jQuery DataTable-->
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script><!-- jQuery Bootstrap de DataTable-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><!-- JS de Bootstrap-->


        <!-- LLAMADA JQUERY DATATABLE-->
        <script>
            $(document).ready(function () {
                $('#example').DataTable();
            });
        </script>
    </body>
</html>
