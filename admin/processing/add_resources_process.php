<?php
$response = array( 
    'status' => 0, 
    'message' => 'Form submission failed, please try again.' 
);

		
		try {
			require "connection2.php";
			$resourceid = "";
		
			$resource_title = $_POST['resource_title']; $resource_title = trim($resource_title);
			$resource_author = $_POST['resource_author']; $resource_author = trim($resource_author);
			$resource_category = $_POST['resource_category'];
			$resource_type = $_POST['resource_type'];
			$resource_month = $_POST['resource_month'];
			$resource_year = $_POST['resource_year'];
			$resource_date = date("h:i a")." on ".date("l jS F Y");
			$file_resource = $_FILES["file_resource"]["name"];			
			
			//upload functions
			$target_dir = "../../resources_upload/";
			//$target_file = $target_dir . basename($_FILES["file_resource"]["name"]);
			$uploadStatus = 1;
			$docFileType = pathinfo($file_resource,PATHINFO_EXTENSION);
			
			// Check if file already exists
			if (file_exists($target_dir.$file_resource)) {
				$msg =  "Sorry, file already exists. ";
				$response['message'] = 'File already exists';
				$uploadStatus = 0;
			}
			// Check file size
			if ($_FILES["file_resource"]["size"] > 10485760) {
				$msg =  "Sorry, your file is over 10MB. ";
				$response['message'] = 'Sorry, your file is over 10MB. ';
				$uploadStatus = 0;
			}
			// Allow certain file formats
			if($docFileType != "pdf" && $docFileType != "doc" && $docFileType != "docx" && $docFileType != "txt" ) {
				$msg =  "Sorry, wrong file format. ";
				$response['message'] = 'Sorry, wrong file format.';
				$uploadStatus = 0;
			}
			// Check if $uploadStatus is set to 0 by an error
			if ($uploadStatus == 0) {
				$response['message'] = 'Your file was not uploaded, reason(s) <br>'.$msg;
			// if everything is ok, try to upload file
			} 
			else {
				$stmt = $conn->prepare("INSERT INTO resources(resource_id, resourcetitle, author, category, type, month, year, filename, date) VALUES (:id, :tit, :aut, :cat, :typ, :mont, :year, :file, :date)");
				$stmt->bindParam(':id', $resourceid);
				$stmt->bindParam(':tit', $resource_title);
				$stmt->bindParam(':aut', $resource_author);
				$stmt->bindParam(':cat', $resource_category);
				$stmt->bindParam(':typ', $resource_type);
				$stmt->bindParam(':mont', $resource_month);
				$stmt->bindParam(':year', $resource_year);
				$stmt->bindParam(':file', $file_resource);
				$stmt->bindParam(':date', $resource_date);
				
				if($stmt->execute()){
					//echo "<span class='msg_info'>".$resourceauthor."'s resource has been uploaded. </span>";
					if (move_uploaded_file($_FILES["file_resource"]["tmp_name"], $target_dir.$file_resource)) {
					$response['status'] = 1; 
                    $response['message'] = 'File uploaded successfully!'; 
					} 
					else {
						//$response['status'] = 0; 
						$response['message'] = 'Sorry, there was an error uploading your file.!'; 
					}
				}
				else{
					$response['message'] = 'Failed to Send.';
				}
				
			}
		}
		
		catch(PDOException $e)
		{
			echo "Error: " . $e->getMessage();
			$response['message'] ="Error: please try again or contact site Admin";
		}
		
		$conn = null;
			// Return response 
echo json_encode($response);
?>