<!-- TEMPLATE TOMADO DE https://www.tutorialrepublic.com/snippets/preview.php?topic=bootstrap&file=crud-data-table-for-database-with-modal-form -->

<link rel="stylesheet" href="css/styleProductos.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="popper.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="bootstrap.min.js"></script>

<style>
    body {
        color: #566787;
        background: #f5f5f5;
        font-family: 'Varela Round', sans-serif;
        font-size: 13px;
    }
</style>
<script>
    $(document).ready(function() {
        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();

        // Select/Deselect checkboxes
        var checkbox = $('table tbody input[type="checkbox"]');

        $("#selectAll").click(function() {
            if (this.checked) {
                checkbox.each(function() {
                    this.checked = true;
                });
            } else {
                checkbox.each(function() {
                    this.checked = false;
                });
            }
        });

        checkbox.click(function() {
            if (!this.checked) {
                $("#selectAll").prop("checked", false);
            }
        });

        // VALIDAR QUE SE SELECCIONE UN CHBx
        $("#deleteEmployeeModal").click(function() {
            var exists = $('input[type=checkbox][name^=options]:checked').length;

            if (!exists) {
                alert('Seleccione al menos un producto');
            }
        });
    });
</script>
</head>

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Control de <b>Productos</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar producto</span></a>
                            <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal" id="eliminar"><i class="material-icons">&#xE15C;</i> <span>Eliminar producto</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll">
                                    <label for="selectAll"></label>
                                </span>
                            </th>
                            <th style="visibility: hidden;"></th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Tipo</th>
                            <th>Medida Unitaria</th>
                            <th>Imagen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($productos as $key) {
                            $cont = 0;
                            $fila = '<tr>
                            <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                    <label for="checkbox1"></label>
                                </span>
                            </td>';

                            foreach ($key as $value) {
                                if ($cont != 7) {
                                    $cadena = ($cont == 0) ? '<td style="visibility: hidden;" id="numProd">$value</td>' : "<td>$value</td>";
                                    $fila .= $cadena;
                                }

                                $cont++;
                            }

                            $fila .= '
                            <td>
                                <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                            </td>';

                            echo $fila;
                        }
                        ?>
                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="hint-text">Mostrando <b><?= $inicial ?></b> de <b><?= $total ?></b> entradas</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Anterior</a></li>
                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link">Siguiente</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <?= form_open(base_url() . "PA", array('name' => 'form1', 'method' => 'post', 'enctype' => 'multipart/form-data')) ?>
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea id="des" name="des" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Precio</label>
                        <input type="number" id="precio" name="precio" min="0.1" step="0.1" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input type="number" id="stock" name="stock" min="1" step="1" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tipo</label>
                        <select name="tipo" id="tipo">
                            <option value="Fruta">Fruta</option>
                            <option value="Fruta">Verdura</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Medida Unitaria</label>
                        <select name="mu" id="mu">
                            <option value="Kg">Kilogramo</option>
                            <option value="Lt">Litro</option>
                            <option value="U">Unitario</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="myfile">Seleccione una imagen:</label>
                        <input type="file" id="file" name="file" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input type="submit" class="btn btn-success" value="Agregar">
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <?= form_open(base_url() . "PM", array('name' => 'form1', 'method' => 'post', 'enctype' => 'multipart/form-data')) ?>
                <div class="modal-header">
                    <h4 class="modal-title">Editar Producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea id="des" name="des" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Precio</label>
                        <input type="number" id="precio" name="precio" min="0.1" step="0.1" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input type="number" id="stock" name="stock" min="1" step="1" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tipo</label>
                        <select name="tipo" id="tipo">
                            <option value="Fruta">Fruta</option>
                            <option value="Fruta">Verdura</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Medida Unitaria</label>
                        <select name="mu" id="mu">
                            <option value="Kg">Kilogramo</option>
                            <option value="Lt">Litro</option>
                            <option value="U">Unitario</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="myfile">Seleccione una imagen:</label>
                        <input type="file" id="file" name="file" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input type="submit" class="btn btn-info" value="Guardar">
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <?= form_open(base_url() . "PB", array('name' => 'form1', 'method' => 'post', 'enctype' => 'multipart/form-data')) ?>
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar Producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>¿Está seguro de eliminar el producto?</p>
                    <p class="text-warning"><small>Ésta acción, no podrá ser reversible</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input type="submit" class="btn btn-danger" value="Eliminar">
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>


    <script>
        $('#btnCheck').on('click', function() {
            $('#checkbox').prop('checked');
        });
    </script>