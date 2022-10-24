<?php
// นับจำนวนทั้งหมด ในระบบ
function countRecordDbase($strTbl=''){
			$cntRecord=0;
			global $conntelcomm;
			global $database_conntelcomm;

            $strTbl=(!empty($strTbl))? $strTbl:"t_rdoc" ;

			mysql_select_db($database_conntelcomm, $conntelcomm);
			$query_rsCountRecord= "SELECT count(*) as countRecord 
																FROM $strTbl
																";
			$rsCountRecord= mysql_query($query_rsCountRecord, $conntelcomm) or die(mysql_error());
			$row_rsCountRecord= mysql_fetch_assoc($rsCountRecord);
			$totalRows_rsCountRecord= mysql_num_rows($rsCountRecord);
            $cntRecord=$row_rsCountRecord['countRecord'];
        //echo $query_rsCountRecord ;
	return $cntRecord;
}

function countRecordDbaseGuest($strTbl='',$strField='',$strCriteria=''){
			$cntRecord=0;
			global $conntelcomm;
			global $database_conntelcomm;

            $strTbl=(!empty($strTbl))? $strTbl:"t_rdoc" ;

			mysql_select_db($database_conntelcomm, $conntelcomm);
			$query_rsCountRecord= "SELECT count(*) as countRecord 
																FROM $strTbl
																WHERE $strField = '$strCriteria'
																";
			$rsCountRecord= mysql_query($query_rsCountRecord, $conntelcomm) or die(mysql_error());
			$row_rsCountRecord= mysql_fetch_assoc($rsCountRecord);
			$totalRows_rsCountRecord= mysql_num_rows($rsCountRecord);
            $cntRecord=$row_rsCountRecord['countRecord'];
      //   echo $query_rsCountRecord."<br>" ;
	return $cntRecord;
}

//สำหรับสรุปกราฟ ค้างรับแยกหน่วย
function countRecordDbaseGuestDept($strTbl='',$strDept='',$strCriteria1='',$strApprove='',$strCriteria2=''){
			$cntRecord=0;
			global $conntelcomm;
			global $database_conntelcomm;

            $strTbl=(!empty($strTbl))? $strTbl:"t_rdoc" ;

			mysql_select_db($database_conntelcomm, $conntelcomm);
			$query_rsCountRecord= "SELECT count($strDept ) as countRecord 
																FROM $strTbl
																WHERE $strDept = '$strCriteria1'
																AND $strApprove = '$strCriteria2'
																";
			$rsCountRecord= mysql_query($query_rsCountRecord, $conntelcomm) or die(mysql_error());
			$row_rsCountRecord= mysql_fetch_assoc($rsCountRecord);
			$totalRows_rsCountRecord= mysql_num_rows($rsCountRecord);
            $cntRecord=$row_rsCountRecord['countRecord'];
         //echo $query_rsCountRecord."<br>" ;
	return $cntRecord;
}

// นับจำนวนทั้งหมด ของเอกสาร ที่เผยแพร่ได้
function countRecordPublic($strTbl='',$rdocTo='',$strCriteria=''){
			$cntRecord=0;
			global $conntelcomm;
			global $database_conntelcomm;

            $strTbl=(!empty($strTbl))? $strTbl:"t_rdoc" ;

			mysql_select_db($database_conntelcomm, $conntelcomm);
			$query_rsCountRecord= "SELECT count(*) as countRecord 
																FROM $strTbl
																WHERE rdoc_to = '$rdocTo'
																AND rdoc_private_chk = '$strCriteria'
																";
			$rsCountRecord= mysql_query($query_rsCountRecord, $conntelcomm) or die(mysql_error());
			$row_rsCountRecord= mysql_fetch_assoc($rsCountRecord);
			$totalRows_rsCountRecord= mysql_num_rows($rsCountRecord);
            $cntRecord=$row_rsCountRecord['countRecord'];
            //echo $query_rsCountRecord ;
	return $cntRecord;
}

// นับจำนวนทั้งหมด ที่มีชื่อหน่วย xx เป็นผู้รับ
function countRecord($strTbl='',$rdocTo='',$strCriteria=''){
			$cntRecord=0;
			global $conntelcomm;
			global $database_conntelcomm;

            $strTbl=(!empty($strTbl))? $strTbl:"t_rdoc" ;

			mysql_select_db($database_conntelcomm, $conntelcomm);
			$query_rsCountRecord= "SELECT count(*) as countRecord 
																FROM $strTbl
																WHERE rdoc_to = '$rdocTo'
																AND approve_id = '$strCriteria'
																";
			$rsCountRecord= mysql_query($query_rsCountRecord, $conntelcomm) or die(mysql_error());
			$row_rsCountRecord= mysql_fetch_assoc($rsCountRecord);
			$totalRows_rsCountRecord= mysql_num_rows($rsCountRecord);
            $cntRecord=$row_rsCountRecord['countRecord'];
       // echo $query_rsCountRecord."<br>" ;
	return $cntRecord;
}
// นับหน่วยเจ้าของเรื่องแต่ละหน่วย
function countRecordDept($strTbl='',$strDept='',$strCriteria=''){  
			$cntRecord=0;
			global $conntelcomm;
			global $database_conntelcomm;

            $strTbl=(!empty($strTbl))? $strTbl:"t_rdoc" ;

			mysql_select_db($database_conntelcomm, $conntelcomm);
			$query_rsCountRecord= "SELECT count(*) as countRecord 
																FROM $strTbl
																WHERE  rdoc_owner ='$strDept' 
																AND approve_id = '$strCriteria' 
																";
			$rsCountRecord= mysql_query($query_rsCountRecord, $conntelcomm) or die(mysql_error());
			$row_rsCountRecord= mysql_fetch_assoc($rsCountRecord);
			$totalRows_rsCountRecord= mysql_num_rows($rsCountRecord);
            $cntRecord=$row_rsCountRecord['countRecord'];
      //  echo $query_rsCountRecord."</br>" ;
	return $cntRecord;
}

// นับหน่วยเจ้าของเรื่องแต่ละหน่วย ที่เป็น rdoc_from  ( ส่งแสดงผลกราฟ)
function countRecordDeptFrom($strTbl='',$strDept='',$strCriteria=''){  
			$cntRecord=0;
			global $conntelcomm;
			global $database_conntelcomm;

            $strTbl=(!empty($strTbl))? $strTbl:"t_rdoc" ;

			mysql_select_db($database_conntelcomm, $conntelcomm);
			$query_rsCountRecord= "SELECT count(*) as countRecord 
																FROM $strTbl
																WHERE  rdoc_from ='$strDept' 
																AND approve_id = '$strCriteria' 
																";
			$rsCountRecord= mysql_query($query_rsCountRecord, $conntelcomm) or die(mysql_error());
			$row_rsCountRecord= mysql_fetch_assoc($rsCountRecord);
			$totalRows_rsCountRecord= mysql_num_rows($rsCountRecord);
            $cntRecord=$row_rsCountRecord['countRecord'];
       // echo $query_rsCountRecord."</br>" ;
	return $cntRecord;
}



// นับหน่วยเจ้าของเรื่องแต่ละหน่วย และ ที่ส่งมาถึง ( ส่งแสดงผลกราฟ)
function countRecordDeptGraph($strTbl='',$strDept='',$strCriteria=''){  
			$cntRecord=0;
			global $conntelcomm;
			global $database_conntelcomm;

            $strTbl=(!empty($strTbl))? $strTbl:"t_rdoc" ;

			mysql_select_db($database_conntelcomm, $conntelcomm);
			$query_rsCountRecord= "SELECT count(*) as countRecord 
																FROM $strTbl
																WHERE  rdoc_owner ='$strDept' 
																AND approve_id = '$strCriteria' 
																OR rdoc_to ='$strDept' 
																AND approve_id = '$strCriteria' 
																";
			$rsCountRecord= mysql_query($query_rsCountRecord, $conntelcomm) or die(mysql_error());
			$row_rsCountRecord= mysql_fetch_assoc($rsCountRecord);
			$totalRows_rsCountRecord= mysql_num_rows($rsCountRecord);
            $cntRecord=$row_rsCountRecord['countRecord'];
        //echo $query_rsCountRecord ;
	return $cntRecord;
}

// นับหน่วยเจ้าของเรื่องแต่ละหน่วย และ ที่ส่งมาถึง ( ส่งแสดงผลกราฟ)
function countRecordDeptGraph2($strTbl='',$strDept='',$strCriteria=''){  
			$cntRecord=0;
			global $conntelcomm;
			global $database_conntelcomm;

            $strTbl=(!empty($strTbl))? $strTbl:"t_rdoc" ;

			mysql_select_db($database_conntelcomm, $conntelcomm);
			$query_rsCountRecord= "SELECT count(*) as countRecord 
																FROM $strTbl
																WHERE  rdoc_owner ='$strDept' 
																AND approve_id = '$strCriteria' 
																OR rdoc_from ='$strDept' 
																AND approve_id = '$strCriteria' 
																";
			$rsCountRecord= mysql_query($query_rsCountRecord, $conntelcomm) or die(mysql_error());
			$row_rsCountRecord= mysql_fetch_assoc($rsCountRecord);
			$totalRows_rsCountRecord= mysql_num_rows($rsCountRecord);
            $cntRecord=$row_rsCountRecord['countRecord'];
        // echo $query_rsCountRecord ;
	return $cntRecord;
}

function countRecordAppGroup($strTbl='',$rdocTo='',$strCriteria=''){
			$cntRecord=0;
			global $conntelcomm;
			global $database_conntelcomm;

            $strTbl=(!empty($strTbl))? $strTbl:"t_rdoc" ;

			mysql_select_db($database_conntelcomm, $conntelcomm);
			$query_rsCountRecord= "SELECT count(*) as countRecord 
																FROM $strTbl AS A
																INNER JOIN t_approve As C
																ON A.approve_id = C.approve_id
																WHERE rdoc_to = '$rdocTo'
																AND approve_group = '$strCriteria' ;
																";
			$rsCountRecord= mysql_query($query_rsCountRecord, $conntelcomm) or die(mysql_error());
			$row_rsCountRecord= mysql_fetch_assoc($rsCountRecord);
			$totalRows_rsCountRecord= mysql_num_rows($rsCountRecord);
            $cntRecord=$row_rsCountRecord['countRecord'];
       // echo $query_rsCountRecord ;
	return $cntRecord;
}
// นับหน่วยเจ้าของเรื่องแต่ละหน่วย
function countRecordAppGroupDept($strTbl='',$strDept='',$strCriteria=''){
			$cntRecord=0;
			global $conntelcomm;
			global $database_conntelcomm;

            $strTbl=(!empty($strTbl))? $strTbl:"t_rdoc" ;

			mysql_select_db($database_conntelcomm, $conntelcomm);
			$query_rsCountRecord= "SELECT count(*) as countRecord 
																FROM $strTbl AS A
																INNER JOIN t_approve As C
																ON A.approve_id = C.approve_id
																WHERE  rdoc_owner ='$strDept' 
																AND approve_group = '$strCriteria' ;
																";
			$rsCountRecord= mysql_query($query_rsCountRecord, $conntelcomm) or die(mysql_error());
			$row_rsCountRecord= mysql_fetch_assoc($rsCountRecord);
			$totalRows_rsCountRecord= mysql_num_rows($rsCountRecord);
            $cntRecord=$row_rsCountRecord['countRecord'];
       // echo $query_rsCountRecord ;
	return $cntRecord;
}


// นับหน่วยเจ้าของเรื่องแต่ละหน่วย
function countRecordAppGroupDept2($strTbl='',$strDept='',$strCriteria=''){
			$cntRecord=0;
			global $conntelcomm;
			global $database_conntelcomm;

            $strTbl=(!empty($strTbl))? $strTbl:"t_rdoc" ;

			mysql_select_db($database_conntelcomm, $conntelcomm);
			$query_rsCountRecord= "SELECT count(*) as countRecord 
																FROM $strTbl AS A
																INNER JOIN t_approve As C
																ON A.approve_id = C.approve_id
																WHERE  rdoc_owner ='$strDept' 
																AND approve_group = '$strCriteria' 
																OR  rdoc_from ='$strDept' 
																AND approve_group = '$strCriteria' ;
																";
			$rsCountRecord= mysql_query($query_rsCountRecord, $conntelcomm) or die(mysql_error());
			$row_rsCountRecord= mysql_fetch_assoc($rsCountRecord);
			$totalRows_rsCountRecord= mysql_num_rows($rsCountRecord);
            $cntRecord=$row_rsCountRecord['countRecord'];
       // echo $query_rsCountRecord ;
	return $cntRecord;
}
// นับทั้งหมดที่ส่งถึงหน่วย xx
function countAllRecord($strTbl='',$rdocTo=''){
			$cntRecord=0;
			global $conntelcomm;
			global $database_conntelcomm;

            $strTbl=(!empty($strTbl))? $strTbl:"t_rdoc" ;

			mysql_select_db($database_conntelcomm, $conntelcomm);
			$query_rsCountRecord= "SELECT count(*) as countRecord 
																FROM $strTbl
																WHERE rdoc_to = '$rdocTo'
																";
			$rsCountRecord= mysql_query($query_rsCountRecord, $conntelcomm) or die(mysql_error());
			$row_rsCountRecord= mysql_fetch_assoc($rsCountRecord);
			$totalRows_rsCountRecord= mysql_num_rows($rsCountRecord);
            $cntRecord=$row_rsCountRecord['countRecord'];
            //echo $query_rsCountRecord ;
	        return $cntRecord;
}
// นับหน่วยเจ้าของเรื่องแต่ละหน่วย
function countAllRecordDept($strTbl='',$strDept=''){  
			$cntRecord=0;
			global $conntelcomm;
			global $database_conntelcomm;

            $strTbl=(!empty($strTbl))? $strTbl:"t_rdoc" ;

			mysql_select_db($database_conntelcomm, $conntelcomm);
			$query_rsCountRecord= "SELECT count(*) as countRecord 
																FROM $strTbl
																WHERE  rdoc_owner ='$strDept' 
																";
			$rsCountRecord= mysql_query($query_rsCountRecord, $conntelcomm) or die(mysql_error());
			$row_rsCountRecord= mysql_fetch_assoc($rsCountRecord);
			$totalRows_rsCountRecord= mysql_num_rows($rsCountRecord);
            $cntRecord=$row_rsCountRecord['countRecord'];
            //echo $query_rsCountRecord ;
	        return $cntRecord;
}

//round(520, 2)
function percentRecord($cntRecord,$allRecord){
     if ($allRecord >0){   // ตรวจสอบตัวหารไม่ให้เป็น 0
			 $percentRecord = round((intval($cntRecord)*100/$allRecord),2);
		} else {
		      $percentRecord  = 0 ;
		}
	return $percentRecord;
	}

?>