<?php SESSION_START();?>
 <link rel="shortcut icon" href="images/logo3.png" type="image/x-icon"/>
	<div class="top-header-agile">
	
		<h1><a class="col-md-4 navbar-brand" href="index.php" style="width:65%;font-size:25px; align:center;padding-left:20px;">UNIVERSITY OF CALABAR <span style="letter-spacing:10px; font-size:12px;"> E-LIBRARY</span></a></h1>
		<!--<div class="col-md-4 top-header-agile-right">
				<ul>
					<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
				</ul>
			</div>-->
    <style type="text/css">
        .log{
            color:#fff;
        }
    </style>

        <?php
     //$userslogin = php_uname('n');
      //echo $use;	
          //$logout=$_GET['log'];
          $logout = " ";
        if($logout=="out"){
            include('logout.php');
        }
        
            
      //SESSION_START();	
	  $username=$_SESSION['username'];
        if($_SESSION['username']==""){
            //if empty/ have not login
            $userlog=" 0905 212 3003";
            $icon ="fa fa-phone";
        }
        else{
            $userlog="<a href='index.php?log=out' class='log'> Log out: ".$_SESSION['username']."</a>";
            $icon ="fa fa-user";
        }
	
        ?>
        
        
			<div class="col-md-4 top-header-agile-left">
				<ul class="num-w3ls">
					<li><i class="
                        <?php  echo $icon;?>   
                        " aria-hidden="true"></i></li>
					<li>
                        
                       <?php
                        echo $userlog;
                        ?>
                    
                    </li>
				</ul>
				<div class="w3ls_search">
													<div class="cd-main-header">
														<ul class="cd-header-buttons">
															<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
														</ul> <!-- cd-header-buttons -->
													</div>
													<div id="cd-search" class="cd-search">
														<form action="library.php" method="post">
														<input name="search" type="search" placeholder="Search...">
														</form>
													</div>
												</div>
					</div>
			
			<div class="clearfix"></div>
		</div>