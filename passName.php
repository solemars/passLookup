<?php
@session_start();
#test


if($_POST['pNum']=="no"){                // # 이름, 생년월일, 출신중학교 검색, 수험번호가 아닐시 pNum=no로 데이터를 넘겨 받음
        $pName=$_POST['pName'];
        $pBirth=$_POST['pBirth'];
        $pSchool=$_POST['pSchool'];
        $sql="select * from sg_pass where pName='".$pName."' and pBirth='".$pBirth."' and pSchool='".$pSchool."'";

}else{
        
        //if(!$_POST['pName'] or !$_POST['pBirth'] or !$_POST['pSchool'])
        //return false;
        $pNum=$_POST['pNum'];   // 수험번호 검색
        $sql="select * from sg_pass where pNum='".$pNum."'";
       
       
}

$conn=mysqli_connect("localhost","amars","sumtim12","ipsi");  //DB 연결
mysqli_query($conn,"SET NAMES utf8");
if(mysqli_connect_errno()){
        echo "MySQL connection fault: ".mysqli_connect_error();
}
mysqli_query($conn,"set session character_set_connection=utf8;");
mysqli_query($conn,"set session character_set_results=utf8;");
mysqli_query($conn,"set session character_set_client=utf8;");

$result=mysqli_query($conn,$sql);  //쿼리 결과 저장

$row=mysqli_fetch_array($result)
//if(!$result)
// echo "no result";
//else
//{
        #SQL검색 결과 속성별로 저장

if($row['pName']==""){
        echo "불합격입니다."
}
else{
                #출력 양식지정
                echo "<TABLE align=center border=1 cellspacing=0 cellpadding=0 style=border-collapse:collapse;border:none;> <TR>
                     <TD valign=middle style=width:454px;height:70px;border-left:solid #000000 0.4pt;border-right:solid #000000 0.4pt;
                     border-top:solid #000000 0.4pt;border-bottom:solid #000000 0.4pt;padding:1.4pt 5.1pt 1.4pt 5.1pt>
                     <SPAN STYLE=font-size:20.0pt;font-family:굴림;line-height:160%>";
                
                echo $row['pName'];     
                
                echo "님은 합격입니다.. 축하합니다</SPAN></TD></TR></TABLE></P>";
                                
                $pNum=$row['pNum'];
                $pType=$row['pType'];
                $pBirth=$row['pBirth'];
                $pName=$row['pName'];
        }
}
        mysqli_close($conn);
?>

<SPAN STYLE=font-size:20.0pt;font-family:굴림;line-height:160% align=center>
<form name="password" method="post" action="pcert.php">
<input type="hidden" name="pName" value="<?php echo $pName; ?>">
<input type="hidden" name="pBirth" value="<?php echo $pBirth; ?>">
<input type="hidden" name="pType" value="<?php echo $pType; ?>">
<input type="hidden" name="pNum" value="<?php echo $pNum; ?>">
<input type="submit" name="출력" value="합격증 출력"><input type="button" value="다시조회하기" onclick="history.back()"></SPAN>
</form>
