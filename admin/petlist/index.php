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
				<colgroup>
					<col width="5%">
					<col width="20%">
					<col width="20%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
						<th>#</th>
						<th>Image</th>
						<th>Pet name</th>
						<th>Customer</th>
						<th>Birthdate</th>
						<th>Breed</th>
						<th>Weight</th>
						<th>Height</th>
						<th>Kind of Pet</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$select = " SELECT p.*,  c.name as customer FROM pet p left join customer c on c.id = p.customer_id";
					$result = $conn->query($select);

					while($row = $result->fetch_assoc()) {
				?>
					<tr>
						<td><?= $row["id"] ?></td>
						<td><img src="../uploads/<?= $row["image"] ?>" height="100px" width="100px"></td>
						<td><?= $row["name"] ?></td>
						<td><?= $row["customer"] ?></td>
						<td><?= $row["bdate"] ?></td>
						<td><?= $row["height"] ?></td>
						<td><?= $row["weight"] ?></td>
						<td><?= $row["type"] ?></td>
						<td><?= $row["breed"] ?></td>
					</tr>
				<?php } ?>
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