




<?php 
 include_once('journal_processing.php'); 
 ?>
<div class="edit" style="">

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
    

		<div id="journal_msg"><?php /*upload error here*/?></div>
	</center>
		<input type="hidden" name="journalid" value="<?php echo $journalid;?>"/>
		<input type="text" name="article_title" placeholder="Article Title" class="formfill" required />
		<input type="text" name="journal_title" placeholder="Journal Title" class="formfill" required />
		<input type="text" name="journal_author" placeholder="Name of Author" class="formfill" />
				
		<select name="journal_category" class="formfill" required >
			<option value="">Subject Area</option>
			<option value="Agriculture">Agriculture</option>
			<option value="Arts">Arts</option>
			<option value="Biological Sciences">Biological Sciences</option>
			<option value="Education">Education</option>
			<option value="Engineering">Engineering</option>
			<option value="Environmental Sciences">Environmental Sciences</option>
			<option value="Law">Law</option>
			<option value="Management Sciences">Management Sciences</option>
			<option value="Medicine and Medical Sciences">Medicine and Medical Sciences</option>
			<option value="Oceanography">Oceanography</option>
			<option value="Pharmacy">Pharmacy</option>
			<option value="Physical Science">Physical Science</option>
			<option value="Radiography">Radiography</option>
			<option value="Social Sciences">Social Sciences</option>	
		</select>
		
		<select name="journal_base" class="formfill" required ">
			<option value="">Journal Database</option>
			<option value="academic_journals">Academic Journals</option>
			<option value="AJOL">African Journals Online (AJOL)</option>
			<option value="De_Gruyter_Publishers">De Gruyter Publishers</option>
			<option value="DOAJ">Directory of Open Access Journals (DOAJ)</option>
			<option value="HINARI">HINARI</option>
			<option value="JSTOR">JSTOR</option>
			<option value="OARE">Online Access to Research in Environment (OARE)</option>
			<option value="PLOS">PLOS</option>
			<option value="Science_Direct">Science Direct</option>
			<option value="Sciendo">Sciendo</option>
		</select>
			
		<input type="text" name="journal_volume" placeholder="Journal Volume" class="formfill" value=""/>
	
		<input type="text" name="journal_doi" placeholder="DOI Number" class="formfill"value=""/>
		<?php $journal_date = date('D-M-Y'); ?>
		<input type="text" name="journal_date" value="<?php echo $journal_date; ?>" class="formfill" readonly /> 
		<input type="file" name="filename" id="file_journal" placeholder="Upload Journal" class="file" required onChange="checkSize();"  />
          <div id="journal_msg2"><!-- size error--></div>
		<center>
			<input type="submit" name="submit" class="btn btn-success journalBtn" value="UPLOAD" class="ssend" style="letter-spacing:3px; width:30%;"/>
		</center>

	</form>

</div>
<script src="jquery-3.4.1.min.js"></script>	
	
	<script type = "text/javaScript">
	function checkSize(){
	 if($('#file_journal')[0].files[0].size > 10485760){
		 $("div#journal_msg2").html("<div class='msg_error'>Your selected file is over 10MB</div>");
	 }
	 else{
		 $("div#journal_msg2").html("");
	 }
	}
	</script>
	
<script type="text/JavaScript">
  $(document).ready(function(e){
    // Submit form data via Ajax
    $("#journalsForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'processing/add_journals_process.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.journalBtn').attr("disabled","disabled");
                $('#journalsForm').css("opacity",".5");
            },
            success: function(response){ //console.log(response);
                $('#journal_msg').html('');
                if(response.status == 1){
                    $('#journalsForm')[0].reset();
                    $('#journal_msg').html('<p class="alert alert-success">'+response.message+'</p>');
                }else{
                    $('#journal_msg').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                $('#journalsForm').css("opacity","");
                $(".journalBtn").removeAttr("disabled");
            }
        });
    });
});




</script>
