<?php
// encript History PW // แบ่ง 5 แบบว่า 143ผี2  บันได 3 ชั้น  แล้วมีเรื่องจริง หุหุ 
function enHistPw($pw){
 $pw1=substr($pw,0,1);
 $pw2=substr($pw,1,1);
 $pw3=substr($pw,2,1);
 $pw4=substr($pw,3,1);
     $pw5=substr($pw,4,1);
     $pw6=substr($pw,5,1);
     $pw7=substr($pw,6,1);
     $pw8=substr($pw,7,1);
 $pw9=substr($pw,8,1);
 $pw10=substr($pw,9,1);
 $pw11=substr($pw,10,1);
 $pw12=substr($pw,11,1);
 $pw13=substr($pw,12,30);
 $fk1="f";
 $fk2="a";
 $fk3="k";
 $fk4="E";
//$pw= $pw1+$pw4+$pw3+$pw2+$pw5+$pw8+$pw7+$pw6+$pw9+$pw12+$pw11+$pw10 ;
//return $pw ;
return "$pw1$pw4$pw3$fk1$pw2$pw5$pw8$pw7$fk2$pw6$pw9$pw12$pw11$fk3$pw10$fk4$pw13" ;
}
function unSuccessLogin($target){
		unlink("../connections/".$target);
}
function checkIden($strTbl,$strPK,$strEnable){
			global $conntelcomm;
			global $database_conntelcomm;
            
			mysql_select_db($database_conntelcomm, $conntelcomm);
			$query_rsIdenKey = "SELECT  $strPK as idenKey FROM $strTbl WHERE $strEnable ='1'";
			$rsIdenKey = mysql_query($query_rsIdenKey, $conntelcomm) or die(mysql_error());
			$row_rsIdenKey= mysql_fetch_assoc($rsIdenKey);
            $idenKey=$row_rsIdenKey['idenKey'];
			//echo $idenKey ;
			return $idenKey; 
}
?>