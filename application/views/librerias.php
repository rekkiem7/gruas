<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function rutPhp( $rut ) {
    return number_format( substr ( $rut, 0 , -1 ) , 0, "", ".") . '-' . substr ( $rut, strlen($rut) -1 , 1 );
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo base_url();?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">   
    <link href="<?php echo base_url();?>plugins/animate/animate.css" rel="stylesheet"> 
    <link href="<?php echo base_url();?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>plugins/sweetalert/dist/sweetalert.css" rel="stylesheet"/>
    <link href="<?php echo base_url();?>plugins/datepicker/datepicker3.css" rel="stylesheet"/>
    <link href="<?php echo base_url();?>plugins/jquery-ui/jquery-ui.css" rel="stylesheet"/>
    <script src="<?php echo base_url();?>plugins/jquery/jquery-2.2.4.js"></script>
    <script src="<?php echo base_url();?>plugins/jquery/jquery-2.2.4.min.js"></script>
    <script src="<?php echo base_url();?>plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>plugins/sweetalert/dist/sweetalert-dev.js"></script>
    <script src="<?php echo base_url();?>plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url();?>plugins/jquery-ui/jquery-ui.js"></script>
    <script src="<?php echo base_url();?>plugins/validarut.js"></script>


</head>