<?php
 $date = date("D dS M Y, h:m:s a");
?>
<center>
<div class="maindiv">
           <input  class="pin" id='pin ' type="text" name="pin"  value="<?php  echo "UC".rand(1,10000000);  ?>"required="required">
		   <br>

		   <input type="hidden" name="date" value="<?php echo $date ;?>">
		   
						 													
</div>
</center>

<style>
<!--
.maindiv{
	max-width:620px;
	background-color: #34bf49;
	//padding-top:20px;
}
.pin{
	font-size:30px;
	//max-width:600px;
	text-align:center;
	border:1px solid #CCC;
	width:100%;
	padding: 12px 16px 12px 16px;
   transition: 0.3s;
   color:#34bf49;
   font-weight:bold;
}
.submit{
  background-color: #34bf49;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 12px 16px 35px 16px;
  transition: 0.3s;
  font-size: 17px;
  color:#fff;
  border-bottom:3px solid #008800;
}
.submit:hover {
  background-color:#fcb314;
}
.mid2{
	color:#34bf49;
	padding:10px 10px 10px 10px;
	background-color:#fff;
}
.unused{
	border:1px solid #34bf49;
	padding:5px 20px 5px 20px;
	width:100%;
}
.table{
	border:1px solid #fff;
	
}
.delrec{
	cursor: pointer;
	color:#555;
	text-decoration:none;
	border:none;
	background:none;
}
.delrec:hover{
	cursor: pointer;
	text-decoration:underline;
}

-->
</style>