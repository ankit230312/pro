<div class="allimages row">
    <style>
        .singleiamge.col-md-2 {
    margin-top: 10px;
}
    </style>
<?php 
if(count($exam_taken_exams) > 0){
     foreach ($exam_taken_exams as $key => $value) { ?>
<div class="singleiamge col-md-2">
    
      <img class="img-thumbnail" src="<?php echo base_url(); ?>assets/webcam_upload/<?php echo $value->filename; ?>" alt="" srcset="">
      <div class="created_att">
        <?php echo date('d-m-Y h:i:s A', strtotime($value->created_at)); ?>
      </div>
</div>
<?php }
}else{
     
     ?>  
     <div class="noiamge">Not Found</div>

     <?php } ?>
</div>