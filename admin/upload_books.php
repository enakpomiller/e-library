
<!DOCTYPE html>
<html>
<head> 

    <title> book upload </title>
    </head>
    <body>
     <?php  include_once 'book_processing.php';?>

<script src="jquery-3.4.1.min.js"></script> 
    
    <script type = "text/javaScript">
    function checkSize(){
     if($('#file_book')[0].files[0].size > 10485760){
         $("div#book_msg2").html("<div class='msg_error'>Your selected file is over 10MB</div>");
     }
     else{
         $("div#book_msg2").html("");
     }
    }
    </script>
    
<script type="text/JavaScript">
  $(document).ready(function(e){
    // Submit form data via Ajax
    $("#booksForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'processing/add_books_process.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#booksForm').css("opacity",".5");
            },
            success: function(response){ //console.log(response);
                $('#book_msg').html('');
                if(response.status == 1){
                    $('#booksForm')[0].reset();
                    $('#book_msg').html('<p class="alert alert-success">'+response.message+'</p>');
                }else{
                    $('#book_msg').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                $('#booksForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });
});

</script>


<div class="edit" style="">
     <?php // echo password_hash('miller',PASSWORD_BCRYPT);?>

<form action="book_processing.php" method="post" enctype="multipart/form-data">

  

        <div id="book_msg" align="center"><?php //echo $book_msg; ?></div>

        <input type="text" name="booktitle" id="booktitle" placeholder="Book Title" class="formfill" required/>
        <input type="text" name="author" placeholder="Name of Author" id="bookauthor" class="formfill" required />
        
        <select name="department" class="formfill" required>
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
        
        <input type="text" name="edition" placeholder="Book edition" class="formfill" value=" "/>

        <input type="text" name="sbn" placeholder="ISBN" class="formfill"/>
        <?php  $date = date('D-M-Y'); ?>
        <input type="text" name="date"  value=" <?php echo $date ;?> " class="formfill" readonly /> 
        <input type="file" name="filename" id="file_book" placeholder="Upload Book" class="file" required/>

        <center>
        <input type="submit" name="submit"  value="UPLOAD" class="ssend" style="letter-spacing:3px; width:30%;"/>
            <!--<button name="book_update"  onclick="Upload();">Upload</button>-->
        </center>

</form> 

</div>

</body>
</html>