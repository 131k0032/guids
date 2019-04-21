<form method="post">
	<input type="text" value="<?php echo $url[2]; ?>" name="id">   
	<div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Actualizar" id="btnupdate" class="btn btn-primary py-2 px-4 text-white" >
                </div>
              </div>
                <?php 
                  $updateTour= new TourController();
                  $updateTour->del();
                 ?>
</form>

<!-- <?php 
	if($url[2]==1){
		echo "1";
	}else{
		echo "no";
	}
 ?> -->