<style>
    .img-thumb-path{
        width:100px;
        height:80px;
        object-fit:scale-down;
        object-position:center center;
    }
</style>
<div class="card card-outline card-primary rounded-0 shadow">
	<div class="card-header">
		<h3 class="card-title">Customer Info<small><em>(About You)</em></small></h3>
		<div class="card-tools">
			<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-sm btn-primary"><span class="fas fa-plus"></span>  Add New</a>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Province</th>
						<th>City</th>
						<th>Barangay</th>
						<th>House No.</th>
					</tr>
				</thead>
				<tbody>
				<?php 
						$i = 1;
						$qry = $conn->query("SELECT * from `customer`");
						while($row = $qry->fetch_assoc()):
							
						$province = json_decode($row["province"]);
						$city = json_decode($row["city"]);
						$barangay = $row["barangay"];
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td class="truncate-2"><?php echo $row['name'] ?></td>
							<td class=""><?php echo $province->value ?? "" ?></td>
							<td class=""><?php echo $city->value ?? "" ?></td>
							<td class=""><?php echo $barangay ?? "" ?></td>
							<td class=""><?php echo $row["house_street"] ?></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
        $('#create_new').click(function(){
			uni_modal("Add new clinic name","cliniclist/manageclinic.php")
		})
        $('.edit_data').click(function(){
			uni_modal("Update Category Details","cliniclist/manageclinic.php?id="+$(this).attr('data-id'))
		})
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this Clinic permanently?","delete_clinic",[$(this).attr('data-id')])
		})
		$('.view_data').click(function(){
			uni_modal("Category Details","categories/view_category.php?id="+$(this).attr('data-id'))
		})
		$('.table td, .table th').addClass('py-1 px-2 align-middle')
		$('.table').dataTable({
            columnDefs: [
                { orderable: false, targets: 3 }
            ],
        });
	})
	function delete_clinic($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_clinic",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>