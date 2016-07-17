<body>
<div class="container">
<div class="animated fadeInRight"><center><h4>Definición de Usuarios</h4></center></div><br><br>
<center><div><button class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Agregar Usuario</button></div></center><br>
	<div class="table-responsive">
		<table id="usuarios" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Usuario</th>
                  <th>Tipo de Usuario</th>
                  <th style="text-align:center">Editar</th>
                  <th style="text-align:center">Eliminar</th>
                </tr>
                </thead>
                <tbody>
                <?php
                	foreach($usuarios as $row)
                	{?>
                		<tr>
                			<td><?php echo $row->id?></td>
                			<td><?php echo $row->nombre_usuario?></td>
                			<td><?php echo $row->nombre?></td>
                			<td style="text-align:center"><button class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></td>
                			<td style="text-align:center"><button class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>
                		</tr>
                <?php
                	} 
                ?>
                </tbody>
        </table>
	</div>
</div>
</body>
<script>
$(document).ready(function()
{
  $('#usuarios').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "language": {
            "search":"Buscar:",
            "lengthMenu": "Ver _MENU_ registros por página",
            "zeroRecords": "<center>No se encontraron registros</center>",
            "info": "_END_ de _TOTAL_ registros",
            "infoEmpty": "No se encontraron registros",
            "infoFiltered": "(Filtrados _TOTAL_ de _MAX_ total registros)",
            "paginate":{
              "previous":"Anterior",
              "next":"Siguiente"
            }
        },      
    });
});
</script>