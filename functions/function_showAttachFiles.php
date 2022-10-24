<?php
//  list รายการ ทั้งหมดของ attach file
function showAttachFiles($strCriteria=''){
			global $conntelcomm;
			global $database_conntelcomm;

           $strCriteria=(!empty($strCriteria))? $strCriteria:"$strCriteria" ;

			mysql_select_db($database_conntelcomm, $conntelcomm);
			$query_rsAttachFile= "SELECT  *
														FROM t_attach
														WHERE rdoc_id = '$strCriteria' ";
			$rsAttachFile= mysql_query($query_rsAttachFile, $conntelcomm) or die(mysql_error());
			$row_rsAttachFile= mysql_fetch_assoc($rsAttachFile);
			$totalRows_rsAttachFile= mysql_num_rows($rsAttachFile);
                //  echo "sssss :".$query_rsAttachFile;

								             $i=1;
												do {    if($totalRows_rsAttachFile >=1)
													      {   // ตรวจสอบว่ามีไฟล์แนบหรือไม่ 				
                                                                    echo	 "<i class='fa fa-file-text' style='color : #009900'></i><a href= ' ".$row_rsAttachFile['attach_partname'].$row_rsAttachFile['attach_filename']." '  target='_blank '> ".$row_rsAttachFile['attach_filename']." 
															 | </a>";
												         }   
												    $i++ ;	
									             	} while ($row_rsAttachFile= mysql_fetch_assoc($rsAttachFile));  
   }
?>