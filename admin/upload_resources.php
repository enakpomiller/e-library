<?php include_once('resource_processing.php');?>

<div class="edit" style="">

<form action="resource_processing.php" method="POST" enctype="multipart/form-data">


	<center>
		<div id="resource_msg"><?php /*upload error here*/ ?></div>
	</center>
		<input type="hidden" name="resourceid" />
		 <?php $resource_title ="";?>
		<input type="text" name="title" placeholder="Title" class="formfill" required value="<?php  echo $resource_title; ?>"/>
		 <?php $resource_author ="";?>
		<input type="text" name="author" placeholder="Name of Author" class="formfill" value="<?php  echo $resource_author; ?>"/>
		
		<select name="category" class="formfill" required style="visibility:<?php echo $select ;?>;" value="<?php  echo $resource_category; ?>">
			<option value="">Subject Area</option>
			<option value="Arts">Arts</option>
			<option value="Social Sciences">Social Sciences</option>  
			<option value="Physical Science">Physical Science</option>
			<option value="Medicine and Medical Sciences">Medicine and Medical Sciences</option>
			<option value="Education">Education</option>
			<option value="Biological Sciences">Biological Sciences</option>
			<option value="Law">Law</option>
			<option value="Radiography">Radiography</option>
			<option value="Pharmacy">Pharmacy</option>
			<option value="Engineering">Engineering</option>
			<option value="Environmental Sciences">Environmental Sciences</option>
			<option value="Management Sciences">Management Sciences</option>
			<option value="Agriculture">Agriculture</option>
			<option value="Oceanography">Oceanography</option>
		</select>
		
		<select name="type" class="formfill" required >
			<option value="">Resource Type</option>
			<option value="Arts">Staff Publication</option>
			<option value="Social Sciences">Lecture Note</option>  
		</select>
		
		<input type="text" name="month" placeholder="Release Month" class="formfill" />
		<input type="number" name="year" placeholder="Release Year" class="formfill" value="<?php  echo $year; ?>"/>
		  
		<input type="text" name="date" value="<?php echo $date; ?>" class="formfill" readonly /> 
		<input type="file" name="filename" id="file_resource" placeholder="Upload Resource" class="file" onChange="checkSize();" required/>
<div id="resource_msg2"><!-- size error--></div>
		<center>
			<input type="submit" name="submit" class="btn btn-success resourceBtn" value="UPLOAD" class="ssend" style="letter-spacing:3px; width:30%;"/>
		</center>
		

	</form>

</div>
<script src="jquery-3.4.1.min.js"></script>	
	
	<script type = "text/javaScript">
	
	function checkSize(){
	 if($('#file_resource')[0].files[0].size > 10485760){
		 $("div#resource_msg2").html("<div class='msg_error'>Your selected file is over 10MB</div>");
	 }
	 else{
		 $("div#resource_msg2").html("");
	 }
	}
	</script>
	
<script type="text/JavaScript">
  $(document).ready(function(e){
    // Submit form data via Ajax
    $("#resourceForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'processing/add_resources_process.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.resourceBtn').attr("disabled","disabled");
                $('#resourceForm').css("opacity",".5");
            },
            success: function(response){ //console.log(response);
                $('#resource_msg').html('');
                if(response.status == 1){
                    $('#resourceForm')[0].reset();
                    $('#resource_msg').html('<p class="alert alert-success">'+response.message+'</p>');
                }else{
                    $('#resource_msg').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                $('#resourceForm').css("opacity","");
                $(".resourceBtn").removeAttr("disabled");
            }
        });
    });
});

</script>
