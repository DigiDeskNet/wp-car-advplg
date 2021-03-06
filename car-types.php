<?php 
include("includes/admin.class.php");

include("includes/conf.class.php");

if(isset($_GET['delid'])){	

	$bsiAdminMain->TyperowDelete($bsiCore->ClearInput($_GET['delid']));

	header("location:admin.php?page=car-type-list");

}


	wp_enqueue_script( 'custom_script10', plugins_url().'/car/js/bsi_datatables.js');

	wp_enqueue_script( 'custom_script11', plugins_url().'/car/js/DataTables/jquery.dataTables.js');

	wp_enqueue_style('custom-style9', plugins_url().'/car/css/data.table.css');

	wp_enqueue_style('custom-style10', plugins_url().'/car/css/jqueryui.css');

?>
<script type="text/javascript">
function deletecartpe(delid){

 var approval = confirm('Do you want to delete this Cartype? Remember corresponding of its cars and bookings will be deleted.');

	if(approval){

		window.location = 'admin.php?page=car-type-list&noheader=true&delid='+delid;	

	}

}
</script>

<p>&nbsp;</p>

<div id="container-inside" style="width:1000px;"> <span style="font-size:16px; font-weight:bold">Car Type List</span>&nbsp;&nbsp;

<?php

if(isset($_SESSION['type_error'])){

	echo '<font color="#FF0000">Already Exists.....</font>';

	unset($_SESSION['type_error']);

}

?>

  <input type="button" value="Add New Car Type" onClick="window.location.href='admin.php?page=add_car_type&tid=0'" style="background: #EFEFEF; float:right;"/>  

  <hr style="margin-top:14px;"/>

  <table class="display datatable" border="0">

    <thead>

      <tr>

        <th>Type</th>

        <th>&nbsp;</th>

      </tr>

    </thead>

    <tbody>

    <?php echo $bsiAdminMain->getAllTypesRow();?>

    </tbody>

  </table>

</div>

<script type="text/javascript" src="<?php echo plugins_url()?>/car/js/DataTables/jquery.dataTables.js"></script> 

<script>

 jQuery(document).ready(function() {

	 	var oTable = jQuery('.datatable').dataTable( {

				"bJQueryUI": true,

				"sScrollX": "",

				"bSortClasses": false,

				"aaSorting": [[0,'desc']],

				"bAutoWidth": true,

				"bInfo": true,

				"sScrollY": "100%",	

				"sScrollX": "100%",

				"bScrollCollapse": true,

				"sPaginationType": "full_numbers",

				"bRetrieve": true,

				"oLanguage": {

								"sSearch": "Search:",

								"sInfo": "Showing _START_ to _END_ of _TOTAL_ entries",

								"sInfoEmpty": "Showing 0 to 0 of 0 entries",

								"sZeroRecords": "No matching records found",

								"sInfoFiltered": "(filtered from _MAX_ total entries)",

								"sEmptyTable": "No data available in table",

								"sLengthMenu": "Show _MENU_ entries",

								"oPaginate": {

												"sFirst":    "First",

												"sPrevious": "Previous",

												"sNext":     "Next",

												"sLast":     "Last"

											  }

							 }

	} );

} );

</script>
