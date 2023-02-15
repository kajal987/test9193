
<?php

// Controller

$data['json'] = json_encode(array("status"=>"success","message"=>"Remove Successfully.","imgdata"=>$FileName));
$this->load->view('json_view', $data);

//json view
$this->output->set_header('Content-Type: application/json; charset=utf-8');
echo $json;

//
function getfaclities(){ // load facilities ajax call			
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    $data['getfaclities'] = $this->admin_model->getfaclities();
    $data['main_content']   = 'viewfacility';
    $d                      = $this->load->view('outputPage', $data, true);
    $this->output->set_output($d);
    return;
    }
}



// output page

<?php if(isset($main_content) && $main_content):?>
	<?php $this->load->view($main_content); ?>
<?php endif; ?>

?>
<script>

    
//ajax call
function getfacilitites(){ // get record form facilities
	var url = $('#base_url').val();
	$.ajax({
		type: "post",
		data: {},
		url: url + 'admins/getfaclities',
		success: function(data) {
			$("#userTable").html(data)
			setDatatable();
		}
	});
}
//data:{}
$("#serviceTable").html(data);

</script>
<div id="userTable" class="col-md-8">
													<?php echo $this->load->view('admins/viewfacility'); ?>
												</div>

                                                <!-- view facility-->

                                                <table class="" id="user_datatable">
	<thead>
		<tr>
			<th>Facility Name</th>
			<th></th>
		</tr>
	</thead>
	<tbody>						
		<?php
			//error_reporting(0);
			foreach($getfaclities as $allusers){?>
			<tr>											
				<td><?php echo $allusers->name;?></td>
				<td>
					<span style="">						
						<a href="javascript:void(0);" data-user='<?php echo json_encode($allusers);?>' data-toggle="modal" data-target="#m_modal_5"class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill Edit_facilities" title="Edit details">
							<i class="la la-edit"></i>
						</a>
						<a href="javascript:void(0);" data-user='<?php echo json_encode($allusers);?>'  class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill delete_facilities" title="Delete">
							<i class="la la-trash"></i>
						</a>
					</span>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>