<div class="edit" style="">

	<form enctype="multipart/form-data" action="thesis_stud_processing.php" method="POST">
		
		<div id="thesis_msg" align="center"><?php //echo $thesis_msg; ?></div>
		<input type="hidden" name="thesisid" value="<?php echo $thesisid;?>"/>
		 <?php $title ="";?>
		<input type="text" name="title" placeholder="Title" class="formfill" required value="<?php  echo $title; ?>"/>
		 <?php $Year ="";?>
		<input type="number" name="year" placeholder="Year Published" class="formfill" required value="<?php  echo $year; ?>"/>
		 <?php $author ="";?>
		<input type="text" name="author" placeholder="Author Name" class="formfill" required value="<?php  echo $author; ?>"/>
		 <?php $level ="";?>
		<select name="level" class="formfill" required style="visibility:<?php echo $select ;?>;" value="<?php  echo $level; ?>">
			<option value="">Author's Academic Level</option>
			<option value="msc">Master</option>
			<option value="doc">Doctor</option>
			<option value="prof">Professor</option>
		</select>
<select name="category" class="formfill" required> 
	<?php $cartegory ="";?>
        <option value=""> Department</option>
  <option value="Agric_Economics">Agric Economics</option>
<option value="Crop_Science">Crop Science</option>
<option value="Food_Science_Technology">Food Science Technology</option>
<option value="Medical_Lab.Sci">Medical Lab.Sci</option>
<option value="English_Literary_Studies">English / Literary Studies</option>
<option value="Philosophy">Philosophy</option>
<option value="Religious_Studies">Religious Studies</option>
<option value="Biochemistry">Biochemistry</option></option>
<option value="Adult_Education">Adult Education</option>
<option value="Library and Information Science">Library & Information Science</option>
<option value="Agric_Education">Agric Education</option>
<option value="Accounting">Accounting</option>
<option value="Banking_and_Finance">Banking and Finance</option>
<option value="Marketing">Marketing</option>
<option value="Applied_Chemistry">Applied Chemistry</option>
<option value="Pure_Chemistry">Pure Chemistry</option>
<option value="Botany">Botany</option>
<option value="Biotechnology">Biotechnology</option>
<option value="Genetics">Genetics </option>
<option value="Geology">Geology</option>
<option value="Computer_Science">Computer Science</option>
<option value="Applied_Geophyisics">Applied Geophysics</option>
<option value="Zoology">Zoology</option>
<option value="Fisheries_and_Aquaculture">Fisheries & Aquaculture</option>
<option value="Economics_Geology_and_Environmental_Science">Economics Geology & Environmental Science</option>
<option value="Public_Administration">Public Administration</option>
<option value="Radiography">Radiography</option>
<option value="Banking_and_Finance">Banking  & Finance</option>
<option value="Adult_Education">Adult Education</option>
      
       
    </select>
         <?php $ate = date('D-M-Y')?>
		<input type="text" name="date" value="<?php echo $date; ?>" class="formfill" readonly />
		<input type="file" name="file_thesis" id="file_thesis" placeholder="Upload Thesis" class="file" required />
		<div id="thesis_msg2"><!-- size error--></div>
		<center>
			<input type="submit" name="submit" class="btn btn-success thesisBtn" value="UPLOAD" class="ssend" style="letter-spacing:3px; width:30%;"/>
		</center>

	</form>

</div>
<script src="jquery-3.4.1.min.js"></script>	
	
	<script type = "text/javaScript">
	
function checkSize(){
	 if($('#file_resource')[0].files[0].size > 10485760){
		 $("div#thesis_msg2").html("<div class='msg_error'>Your selected file is over 10MB</div>");
	 }
	 else{
		 $("div#thesis_msg2").html("");
	 }
	}
	</script>
	
<script type="text/JavaScript">
  $(document).ready(function(e){
    // Submit form data via Ajax
    $("#thesisForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'processing/add_thesis_process.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.thesisBtn').attr("disabled","disabled");
                $('#thesisForm').css("opacity",".5");
            },
            success: function(response){ //console.log(response);
                $('#thesis_msg').html('');
                if(response.status == 1){
                    $('#thesisForm')[0].reset();
                    $('#thesis_msg').html('<p class="alert alert-success">'+response.message+'</p>');
                }else{
                    $('#thesis_msg').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                $('#thesisForm').css("opacity","");
                $(".thesisBtn").removeAttr("disabled");
            }
        });
    });
});

</script>