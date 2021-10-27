
	<script type="text/javascript" src="jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
<script type="text/javascript">
       function save_book(){
    //check if the input t ypes are empty or not
     if( $("#book_id").val() == "" || $("#user_id").val() == "" )  alert("Error:File Not save");
     else
        $.post( $("#saveForm").attr("action"),
        $("#saveForm :input").serializeArray(),
        function (data){
            alert(data);
        });
   
    //ouside th else to return so as not to redirect 
$("saveForm").submit( function(){
 return false;      
});
    
     
}
</script>