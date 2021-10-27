<?php
$response = array( 
    'status' => 0, 
    'message' => 'Form submission failed, please try again.' 
);

		try {
			require "connection2.php";
			$journalid = "";
		
			$article_title = $_POST['article_title']; $article_title = trim($article_title);
			$journal_title = $_POST['journal_title']; $journal_title = trim($journal_title);
			$journal_author = $_POST['journal_author']; $journal_author = trim($journal_author);
			$journal_category = $_POST['journal_category'];
			$journal_base = $_POST['journal_base'];
			$journal_volume = $_POST['journal_volume'];
			$journal_doi = $_POST['journal_doi'];
			$journaldate = date("h:i a")." on ".date("l jS F Y");
			$file_journal = $_FILES["file_journal"]["name"];			
			
			//upload functions
			$target_dir = "../../journals_upload/";
			$uploadStatus = 1;
			$docFileType = pathinfo($file_journal,PATHINFO_EXTENSION);
			
			// Check if file already exists
			if (file_exists($target_dir.$file_journal)) {
				$msg =  "Sorry, file already exists. ";
				$response['message'] = 'File already exists';
				$uploadStatus = 0;
			}
			// Check file size
			if ($_FILES["file_journal"]["size"] > 10485760) {
				$msg =  "Sorry, your file is over 10MB. ";
				$response['message'] = 'Sorry, your file is over 10MB. ';
				$uploadStatus = 0;
			}
			// Allow certain file formats
			if($docFileType != "pdf" and $docFileType != "doc" and $docFileType != "docx" and $docFileType != "txt") {
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
				$stmt = $conn->prepare("INSERT INTO journals(id, articletitle, journaltitle, author, category, database, volume, doi, date, filename) VALUES (:id, :tit1, :tit2, :aut, :cat, :dat, :vol, :doi, :date, :file)");
				$stmt->bindParam(':id', $journalid);
				$stmt->bindParam(':tit1', $article_title);
				$stmt->bindParam(':tit2', $journal_title);
				$stmt->bindParam(':aut', $journal_author);
				$stmt->bindParam(':cat', $journal_category);
				$stmt->bindParam(':dat', $journal_base);
				$stmt->bindParam(':vol', $journal_volume);
				$stmt->bindParam(':doi', $journal_doi);
				$stmt->bindParam(':file', $file_journal);
				$stmt->bindParam(':date', $journaldate);
				
				if($stmt->execute()){
					//$msg =  "<span class='msg_info'>".$bookauthor."'s book has been uploaded. </span>";
					if (move_uploaded_file($_FILES["file_journal"]["tmp_name"], $target_dir.$file_journal)) {
						
					$response['status'] = 1; 
                    $response['message'] = 'File uploaded successfully!'; 
					} 
					else {
						//$msg =  "Sorry, there was an error uploading your file. ";
						$response['status'] = 0; 
						$response['message'] = 'Sorry, there was an error uploading your file.!'; 
					}
				}
				else{
					//$msg =  "<span class='msg_err'>Failed to Send. </span>";
					$response['message'] = 'Failed to Send.';
				}
				
			}
		}
		
		catch(PDOException $e)
		{
			$msg =  "Error: " . $e->getMessage();
		}
		
		$conn = null;
				// Return response 
echo json_encode($response);
?>