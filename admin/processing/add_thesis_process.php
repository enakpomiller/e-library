<?php
$response = array( 
    'status' => 0, 
    'message' => 'Form submission failed, please try again.' 
);

		try {
			require "connection2.php";
			$thesisid = "";
		
			$thesis_title = $_POST['thesis_title']; $thesis_title = trim($thesis_title);
			$thesis_author = $_POST['thesis_author']; $thesis_author = trim($thesis_author);
			$thesis_level = $_POST['thesis_level'];
			$thesis_year = $_POST['thesis_year'];
			$department = $_POST['department'];
			$thesis_date = date("h:i a")." on ".date("l jS F Y");
			$file_thesis = $_FILES["file_thesis"]["name"];			
			
			//upload functions
			$target_dir = "../../thesis_upload/";
			//$target_file = $target_dir . basename($_FILES["file_thesis"]["name"]);
			$uploadStatus = 1;
			$docFileType = pathinfo($file_thesis,PATHINFO_EXTENSION);
			
			// Check if file already exists
			if (file_exists($target_dir.$file_thesis)) {
				$msg =  "Sorry, file already exists. ";
				$response['message'] = 'File already exists';
				$uploadStatus = 0;
			}
			// Check file size
			if ($_FILES["file_thesis"]["size"] > 10485760) {
				$msg =  "Sorry, your file is over 10MB. ";
				$response['message'] = 'Sorry, your file is over 10MB. ';
				$uploadStatus = 0;
			}
			// Allow certain file formats
			if($docFileType != "pdf" && $docFileType != "doc" && $docFileType != "docx") {
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
				$stmt = $conn->prepare("INSERT INTO thesis(id, title, author, level, year, department, filename, date) VALUES (:id, :tit, :aut, :lvl, :year, :department, :file,  :date)");
				$stmt->bindParam(':id', $thesisid);
				$stmt->bindParam(':tit', $thesis_title);
				$stmt->bindParam(':aut', $thesis_author);
				$stmt->bindParam(':lvl', $thesis_level);
				$stmt->bindParam(':year', $thesis_year);
				$stmt->bindParam(':department', $department);
				$stmt->bindParam(':file', $file_thesis);
				$stmt->bindParam(':date', $thesis_date);
				
				if($stmt->execute()){
					//echo "<span class='msg_info'>".$thesisauthor."'s thesis has been uploaded. </span>";
					if (move_uploaded_file($_FILES["file_thesis"]["tmp_name"], $target_dir.$file_thesis)) {
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