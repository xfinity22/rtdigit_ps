<?php
	class UploadfileComponent extends Component{		
		
		public function checkFolder($dir, $foldername){
			if(is_dir($dir.'/'.$foldername) && is_writeable($dir.'/'.$foldername)){							
				return true;
			}else{
				if(mkdir($dir.'/'.$foldername, 0777)){
					return true;
				}else{
					return false;
				}
			}
		}
		
		public function uploadforDownloadfile($filename, $directory, $newfilename){
			$dir = $directory;
			$upload_dir  = $dir . basename($filename['name']);												
			if(move_uploaded_file($filename['tmp_name'], $upload_dir)){
				$file_handler = fopen($upload_dir, 'r');	
				fclose($file_handler);
				if(!empty($newfilename)){
					if(rename($upload_dir, $dir.''.$newfilename)){			
						return true;
					}else{
						return false;
					}
				}
			}else{
				return false;
			}			
		}
		
		public function renameImage($filename, $newfilename){
			$filename = $filename['name'];
			$extension = end(explode(".", $filename));
			$newfilename = $newfilename.".".$extension;
			return $newfilename;
		}
	
		public function checkfileExtensionforfile($filename){			
			$extension = pathinfo($filename['name']);
			$ext=0;
			switch($extension['extension']){				
				case "xls": $ext++; break;				
				case "xlsx": $ext++; break;				
			}						
			if($ext>0){return true;}else{ return false;}
		}
			
		public function checkfileExtensionforfileforpicture($filename){			
			$extension = pathinfo($filename['name']);
			$ext=0;
			switch($extension['extension']){
				case "png": $ext++; break;				
				case "jpeg": $ext++; break;				
				case "jpg": $ext++; break;								
			}						
			if($ext>0){return true;}else{ return false;}
		}
		
		public function checkfileExtensionforfileforattachment($filename){			
			$extension = pathinfo($filename['name']);
			$ext=0;
			switch($extension['extension']){
				case "doc": $ext++; break;				
				case "docx": $ext++; break;				
				case "pdf": $ext++; break;								
				case "png": $ext++; break;								
				case "jpg": $ext++; break;								
				case "xls": $ext++; break;								
				case "xlsx": $ext++; break;								
			}						
			if($ext>0){return true;}else{ return false;}
		}
		
		
		public function resizeImage($inputFileName, $maxSize=100){			
			$info = getimagesize($inputFileName);
			$type = isset($info['type']) ? $info['type'] : $info[2];
			if (!(imagetypes() & $type)) {
				return false;
			}

			$width = isset($info['width']) ? $info['width'] : $info[0];
			$height = isset($info['height']) ? $info['height'] : $info[1];

			// Calculate aspect ratio
			$wRatio = $maxSize / $width;
			$hRatio = $maxSize / $height;

			// Using imagecreatefromstring will automatically detect the file type
			$sourceImage = imagecreatefromstring(file_get_contents($inputFileName));

			// Calculate a proportional width and height no larger than the max size.
			if (($width <= $maxSize) && ($height <= $maxSize)) {
				// Input is smaller than thumbnail, do nothing
				return $sourceImage;
			} elseif (($wRatio * $height) < $maxSize) {
				// Image is horizontal
				$tHeight = ceil($wRatio * $height);
				$tWidth = $maxSize;
			} else {
				// Image is vertical
				$tWidth = ceil($hRatio * $width);
				$tHeight = $maxSize;
			}

			$thumb = imagecreatetruecolor($tWidth, $tHeight);

			if ($sourceImage === false) {
				// Could not load image
				return false;
			}

			// Copy resampled makes a smooth thumbnail
			imagecopyresampled($thumb, $sourceImage, 0, 0, 0, 0, $tWidth, $tHeight, $width, $height);
			imagedestroy($sourceImage);

			return $thumb;
		}
		
	}
?>