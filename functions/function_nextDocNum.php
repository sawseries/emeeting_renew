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
						max(right($strPK,3)) as MaxDocNum 
						FROM $strTbl
						WHERE $strField1= $strCriteria1
						AND left($strField2,7)= left('$strCriteria2',7) " ;
			$rsNextDocNum = mysql_query($query_rsNextDocNum, $conntelcomm) or die(mysql_error());
			$row_rsNextDocNum= mysql_fetch_assoc($rsNextDocNum);
                    //  echo $query_rsNextDocNum ;
			if (!empty($row_rsNextDocNum['MaxDocNum'])) {
								$nextDocNum1=$row_rsNextDocNum['MaxDocNum']+1;
								$nextDocNum= str_pad($nextDocNum1,3,"0",STR_PAD_LEFT);
						}else {
								$nextDocNum='001';
						}
			return $nextDocNum; 
}

// ยังไม่เปิดใช้งาน  แยกประเภทเอกสารด้วย  rdoc_id ใหม่ เป็น   5910-02-01-001
 //  5910 = ปี เดือน  | 02 = สังกัด | 01 = ประเภทเอกสาร | 001 = ลำดับที่เอกสารแต่ละประเภท |   
// ค่าวันที่ที่เก็บใน DB  คือ   2016-10-01    นับมา 7 ตัว ด้านซ้ายคือ   2016-10

/*SELECT 
	max(right(rdoc_id,3)) as MaxDocNum 
	FROM t_rdoc
	WHERE rdoc_from= 6  // สังกัด
	AND docgroup_id=2    // ประเภทเอกสาร
	AND left(rdoc_date,7)= left('2016-10-12',7     */

function nextDocNumNew($strTbl='',$strPK='',$strField1='',$strField2='',$strField3='',$strCriteria1='',$strCriteria2='',$strCriteria3=''){
			$nextDocNum=0;
			global $conntelcomm;
			global $database_conntelcomm;
            $strTbl=(!empty($strTbl))? $strTbl:"t_rdoc" ;
            $strPK=(!empty($strPK))? $strPK:"rdoc_id" ;
            $strField1=(!empty($strField1))? $strField1:"rdoc_from" ;
            $strField2=(!empty($strField2))? $strField2:"rdoc_date" ;

						mysql_select_db($database_conntelcomm, $conntelcomm);
						$query_rsNextDocNum = "SELECT 
						max(right($strPK,3)) as MaxDocNum 
						FROM $strTbl
						WHERE $strField1= $strCriteria1
						AND $strField2= $strCriteria2
						AND left($strField3,7)= left('$strCriteria3',7) " ;
			$rsNextDocNum = mysql_query($query_rsNextDocNum, $conntelcomm) or die(mysql_error());
			$row_rsNextDocNum= mysql_fetch_assoc($rsNextDocNum);
                      echo $query_rsNextDocNum ;
			if (!empty($row_rsNextDocNum['MaxDocNum'])) {
								$nextDocNum1=$row_rsNextDocNum['MaxDocNum']+1;
								$nextDocNum= str_pad($nextDocNum1,3,"0",STR_PAD_LEFT);
						}else {
								$nextDocNum='001';
						}
			return $nextDocNum; 
}
?>