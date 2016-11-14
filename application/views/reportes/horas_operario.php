<body>
<div class="container">
    <div class="animated fadeInRight"><center><h4>Reportes Horas Operario</h4></center>
    </div><br><br>
    <div  class="animated fadeInRight">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
           <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    Desde:&nbsp;&nbsp;<input type="date" class="form-control" id="desde" name="desde" value="<?=date("Y-m-d")?>" /></td>
           </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    Hasta:&nbsp;&nbsp;<input type="date" class="form-control" id="hasta" name="hasta" value="<?=date("Y-m-d")?>" />
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    Operario:&nbsp;&nbsp;<select class="form-control" id="operario" name="operario">
                    <option value="0">Todos</option>
                </select>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    $(document).ready(function() {
        $('#datepicker').datepicker({
            autoclose: true
        });
    });
</script>