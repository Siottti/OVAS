<?php
require_once('../../config.php');
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT * FROM `clinic` where id = '{$_GET['id']}'");
    if($qry->num_rows > 0){
        $res = $qry->fetch_array();
        foreach($res as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
    }
}
?>
<div class="container-fluid">
    <form action="" id="category-form">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div class="form-group">
            <label for="name" class="control-label">Clinic Name</label>
            <input type="text" name="clinicname" id="name" class="form-control form-control-border" placeholder="Enter Clinic Name" value ="<?php echo isset($clinicname) ? $clinicname : '' ?>" required>
            <label for="name" class="control-label">Clinic Address</label>
            <input type="text" name="address" id="address" class="form-control form-control-border" placeholder="Enter Clinic Address" value ="<?php echo isset($address) ? $address : '' ?>" required> <br>
            <label for="name" class="control-label">Longitude</label>
            <input type="text" name="Longitude" id="Longitude" class="form-control form-control-border" placeholder="Enter Longitude" value ="<?php echo isset($Longitude) ? $Longitude : '' ?>" required><br>
            <label for="name" class="control-label">Latitude</label>
            <input type="text" name="Latitude" id="address" class="form-control form-control-border" placeholder="Enter Latitude" value ="<?php echo isset($Latitude) ? $Latitude : '' ?>" required><br>
        </div>
    </form>
</div>
<script>
    $(function(){
        $('#uni_modal #category-form').submit(function(e){
            e.preventDefault();
            var _this = $(this)
            $('.pop-msg').remove()
            var el = $('<div>')
                el.addClass("pop-msg alert")
                el.hide()
            start_loader();
            $.ajax({
                url:_base_url_+"classes/Master.php?f=save_clinic",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occuredsss",'error');
					end_loader();
				},
                success:function(resp){
                    if(resp.status == 'success'){
                        location.reload();
                    }else if(!!resp.msg){
                        el.addClass("alert-danger")
                        el.text(resp.msg)
                        _this.prepend(el)
                    }else{
                        el.addClass("alert-danger")
                        el.text("An error occurred due to unknown reason.")
                        _this.prepend(el)
                    }
                    el.show('slow')
                    $('html,body,.modal').animate({scrollTop:0},'fast')
                    end_loader();
                }
            })
        })
    })
</script>