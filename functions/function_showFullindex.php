<?php
function showFullindex($strTbl='',$strIndex='',$strResult='',$strCriteria=''){
			global $conntelcomm;
			global $database_conntelcomm;
            $strDB=(!empty($strTbl))? $strTbl:"$strTbl" ;
            $strPK=(!empty($strIndex))? $strIndex:"$strIndex" ;

			mysql_select_db($database_conntelcomm, $conntelcomm);
			$query_rsShowFullindex = "SELECT $strResult
			FROM $strTbl
			WHERE $strIndex = '$strCriteria' " ;
			$rsShowFullindex = mysql_query($query_rsShowFullindex, $conntelcomm) or die(mysql_error());
			$row_rsShowFullindex= mysql_fetch_assoc($rsShowFullindex);
			$showFullindex=$row_rsShowFullindex[$strResult];		
			//echo "showww = ".$query_rsShowFullindex ;
			return $showFullindex;
    }
?>