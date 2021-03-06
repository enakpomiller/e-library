<?php
$response = array( 
    'status' => 0, 
    'message' => 'Form submission failed, please try again.' 
);
	try {
		
			require "connection2.php";
			$bookid = "";
		
			$booktitle = trim($_POST['booktitle']);
			$bookauthor = trim($_POST['bookauthor']);
			$book_category = $_POST['book_category'];
			$book_edition = $_POST['book_edition'];
			$book_isbn = $_POST['book_isbn'];
			$bookdate = date("h:i a")." on ".date("l jS F Y");
			$file_book = $_FILES["file_book"]["name"];
			 
			//upload functions
			$target_dir = "../../books_upload/";
			$uploadStatus = 1;
			$docFileType = pathinfo($file_book,PATHINFO_EXTENSION);

			// Check if file already exists
			if (file_exists($target_dir.$file_book)) {
				$msg = " File already exists ";
				$response['message'] = 'File already exists';
				$uploadStatus = 0;
			}
			// Check file size
			if ($_FILES["file_book"]["size"] > 800485760) {
				$msg.=",". "Your file is over 8000MB. ";
				$response['message'] = 'Your file is over 10MB';
				$uploadStatus = 0;
			}
			// Allow certain file formats
			
			if($docFileType != "pdf" and $docFileType != "doc" and $docFileType != "docx" and $docFileType != "txt" ) {
				$msg.=",".  "Wrong file format or Incompatible ";
				$response['message'] = 'Wrong file format or Incompatible';
				$uploadStatus = 0;
			}
			
			// Check if $uploadStatus is set to 0 by an error
			if ($uploadStatus == 0) {
				//echo "<div class='msg_error'>Your file was not uploaded, reason(s) <br>".$msg."</div>";
				$response['message'] = 'Your file was not uploaded, reason(s) <br>'.$msg;
			// if everything is ok, try to upload file
			} 
			
			else {
		  
			
				$stmt = $conn->prepare("INSERT INTO books(book_id, booktitle, author, department, edition, sbn, filename, date) VALUES (:id, :tit, :aut, :dpt, :edn, :sbn, :file, :date)");
				$stmt->bindParam(':id', $bookid);
				$stmt->bindParam(':tit', $booktitle);
				$stmt->bindParam(':aut', $bookauthor);
				$stmt->bindParam(':dpt', $book_category);
				$stmt->bindParam(':edn', $book_edition);
				$stmt->bindParam(':sbn', $book_isbn);
				$stmt->bindParam(':file', $file_book);
				$stmt->bindParam(':date', $bookdate);
				
				if($stmt->execute()){
					//echo "<span class='msg_info'>".$bookauthor."'s book has been uploaded. </span>";
					if (move_uploaded_file($_FILES["file_book"]["tmp_name"], $target_dir.$file_book)) {
						//echo "success";
					$response['status'] = 1; 
                    $response['message'] = 'File submitted successfully!'; 
					} 
					else {
						//echo "<div class='msg_error'>Sorry, there was an error uploading your file:file not Compatible</div>";
						$response['message'] = 'Sorry, there was an error uploading your file:file not !'; 
					}
				}
				else{
					//echo "<div class='msg_error'>Failed to send </div>";
					$response['message'] = 'Failed to send !'; 
				}
				
			}
	}	
		catch(PDOException $e)
		{
			echo "Error: " . $e->getMessage();
		}		
		$conn = null;
		// Return response 
echo json_encode($response);
?>