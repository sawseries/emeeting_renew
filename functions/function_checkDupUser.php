<?php
function checkDupKey($strTbl='',$strPK='',$strCriteria=''){
			$cntDupKey=0;
			$Err="";
			global $conntelcomm;
			global $database_conntelcomm;

            $strTbl=(!empty($strTbl))? $strTbl:"t_user" ;
            $strPK=(!empty($strPK))? $strPK:"User_name" ;

			mysql_select_db($database_conntelcomm, $conntelcomm);
			$query_rsDupKey = "SELECT count(*) as countDupKey FROM $strTbl WHERE $strPK ='$strCriteria'";
			$rsDupKey = mysql_query($query_rsDupKey, $conntelcomm) or die(mysql_error());
			$row_rsDupKey= mysql_fetch_assoc($rsDupKey);
			$totalRows_rsDupKey = mysql_num_rows($rsDupKey);
            $cntDupKey=$row_rsDupKey['countDupKey'];
						if ($cntDupKey>0)    // จำนวนที่หาได้มากกว่า 0
								/*	{

										echo "<script language='JavaScript'> "; 
										echo "alert( ' รายการ $strCriteria  ซ้ำหรือ มีใช้อยู่แล้ว กรุณาเปลี่ยนใหม่');";
										echo "history.back();";
										echo"</script> ";
										exit();

									}*/
				if ($cntDupKey>0)    // จำนวนที่หาได้มากกว่า 0
					{	
						$Err=" ชื่อผู้ใช้(username) :  ".$strCriteria." ลงทะเบียนไว้แล้ว , ใช้ชื่อใหม่ หรือ ติดต่อผู้ดูแลระบบ ";
					}
				return $Err;
}

function checkDupKeyJava($strTbl='',$strPK='',$strCriteria=''){
			$cntDupKey=0;
			$Err="";
			global $conntelcomm;
			global $database_conntelcomm;

            $strTbl=(!empty($strTbl))? $strTbl:"t_user" ;
            $strPK=(!empty($strPK))? $strPK:"User_name" ;

			mysql_select_db($database_conntelcomm, $conntelcomm);
			$query_rsDupKey = "SELECT count(*) as countDupKey FROM $strTbl WHERE $strPK ='$strCriteria'";
			$rsDupKey = mysql_query($query_rsDupKey, $conntelcomm) or die(mysql_error());
			$row_rsDupKey= mysql_fetch_assoc($rsDupKey);
			$totalRows_rsDupKey = mysql_num_rows($rsDupKey);
            $cntDupKey=$row_rsDupKey['countDupKey'];
						if ($cntDupKey>0)    // จำนวนที่หาได้มากกว่า 0
								{
										echo "<script type='text/javascript' charset='utf-8'> "; 
										echo "alert( ' This Value : $strCriteria  already exists ,please register with a different Value ')   ;";
										echo "history.back();";
										echo"</script> ";
										exit();

									}
}

function checkDupKeyDoc($strTbl='',$strPK='',$strCriteria=''){
			$cntDupKey=0;
			$Err="";
			global $conntelcomm;
			global $database_conntelcomm;
            
            $strTbl=(!empty($strTbl))? $strTbl:"t_pre_doc" ;
            $strPK=(!empty($strPK))? $strPK:"pre_doc_num" ;

			mysql_select_db($database_conntelcomm, $conntelcomm);
			$query_rsDupKey = "SELECT count(*) as countDupKey FROM $strTbl WHERE $strPK ='$strCriteria'";
			$rsDupKey = mysql_query($query_rsDupKey, $conntelcomm) or die(mysql_error());
			$row_rsDupKey= mysql_fetch_assoc($rsDupKey);
			$totalRows_rsDupKey = mysql_num_rows($rsDupKey);
            $cntDupKey=$row_rsDupKey['countDupKey'];
										if ($cntDupKey>0)    // จำนวนที่หาได้มากกว่า 0
									{
										echo "<script language='JavaScript'> "; 
										echo "alert( ' รายการ $strCriteria  ซ้ำหรือ มีใช้อยู่แล้ว กรุณาเปลี่ยนใหม่');";
										echo "history.back();";
										echo"</script> ";
										exit();
									}
}
?>