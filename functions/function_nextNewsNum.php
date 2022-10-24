<?php
function nextDocNum($strTbl='',$strPK='',$strField1='',$strField2='',$strCriteria1='',$strCriteria2=''){
			$nextDocNum=0;
			global $conntelcomm;
			global $database_conntelcomm;
            $strTbl=(!empty($strTbl))? $strTbl:"t_rdoc" ;
            $strPK=(!empty($strPK))? $strPK:"rdoc_id" ;
            $strField1=(!empty($strField1))? $strField1:"rdoc_from" ;
            $strField2=(!empty($strField2))? $strField2:"rdoc_date" ;

						mysql_select_db($database_conntelcomm, $conntelcomm);
						$query_rsNextDocNum = "SELECT 
						RIGHT(max($strPK,3)) as MaxDocNum 
						FROM $strTbl
						WHERE $strField1= $strCriteria1
						AND left($strField2,7)= left('$strCriteria2',7) " ;
			$rsNextDocNum = mysql_query($query_rsNextDocNum, $conntelcomm) or die(mysql_error());
			$row_rsNextDocNum= mysql_fetch_assoc($rsNextDocNum);

				if (!empty($row_rsNextDocNum['MaxDocNum'])) {
								$nextDocNum=$row_rsNextDocNum['MaxDocNum']+1;
								$nextDocNum= str_pad($nextDocNum,2,"0",STR_PAD_LEFT);
						}else {
								$nextDocNum='001';
						}
			return $nextDocNum;
}
?>
