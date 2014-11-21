<?php
/*
 *自定义函数
 */

//判断是否有某权限
function ifpermit($prm,$i){
    $m = $prm >> ($i-1);
    $mod = $m%2;
    return $mod;
}

//通过复选框获取权限数组，转化为权限值
function getpermit($prm_arr){
    $prm_val=0;
    if(!empty($prm_arr)){
        foreach ($prm_arr as $a){
            $i = $a-1;
            $prm_val=$prm_val+pow(2,$i);
        }
    }
    return $prm_val;
}

function getchecked($prm,$i){
    if(ifpermit($prm,$i)){return "checked";}
}

function fmoney($num) {
$num=0+$num;
$num = sprintf("%.02f",$num);
if(strlen($num) <= 6) return $num;
//从最后开始算起，每3个数它加一个","
for($i=strlen($num)-1,$k=1, $j=100; $i >= 0; $i--,$k++) {
$one_num = substr($num,$i,1);
if($one_num ==".") {
$numArray[$j--] = $one_num;
$k=0;
continue;
}

if($k%3==0 and $i!=0) {
//如果正好只剩下3个数字，则不加','
$numArray[$j--] = $one_num;
$numArray[$j--] = ",";
$k=0;
} else {
$numArray[$j--]=$one_num;
}
}
ksort($numArray);
return join("",$numArray);
}




function umoney($num,$type="usd") {
global $numTable,$commaTable,$moneyType;

//global $numTable;
$numTable[0]="ZERO ";
$numTable[1]="ONE ";
$numTable[2]="TWO ";
$numTable[3]="THREE ";
$numTable[4]="FOUR ";
$numTable[5]="FIVE ";
$numTable[6]="SIX ";
$numTable[7]="SEVEN ";
$numTable[8]="EIGHT ";
$numTable[9]="NINE ";
$numTable[10]="TEN ";
$numTable[11]="ELEVEN ";
$numTable[12]="TWELVE ";
$numTable[13]="THIRTEEN ";
$numTable[14]="FOURTEEN ";
$numTable[15]="FIFTEEN ";
$numTable[16]="SIXTEEN ";
$numTable[17]="SEVENTEEN ";
$numTable[18]="EIGHTEEN ";
$numTable[19]="NINETEEN ";
$numTable[20]="TWENTY ";
$numTable[30]="THIRTY ";
$numTable[40]="FORTY ";
$numTable[50]="FIFTY ";
$numTable[60]="SIXTY ";
$numTable[70]="SEVENTY ";
$numTable[80]="EIGHTY ";
$numTable[90]="NINETY ";

$commaTable[0]="HUNDRED ";
$commaTable[1]="THOUSAND ";
$commaTable[2]="MILLION ";
$commaTable[3]="MILLIARD ";
$commaTable[4]="BILLION ";
$commaTable[5]="????? ";

//单位
$moneyType["usd"]="DOLLARS ";
$moneyType["usd_1"]="CENTS ONLY";
$moneyType["rmb"]="YUAN ";
$moneyType["rmb_1"]="FEN ONLY";


if($type=="") $type="usd";
$fnum = fmoney($num);
$numArray = explode(",",$fnum);
$resultArray = array();
$k=0;
$cc=count($numArray);
for($i = 0; $i < count($numArray); $i++) {
$num_str = $numArray[$i];
//echo "<br>";
//小数位的处理400.21
if(preg_match("/\./",$num_str)) {
$dotArray = explode(".",$num_str);
if($dotArray[1] != 0) {
$resultArray[$k++]=format3num($dotArray[0]+0);
$resultArray[$k++]=$moneyType[strtolower($type)];
$resultArray[$k++]="AND ";
$resultArray[$k++]=format3num($dotArray[1]+0);
$resultArray[$k++]=$moneyType[strtolower($type)."_1"];
} else {
$resultArray[$k++]=format3num($dotArray[0]+0);
$resultArray[$k++]=$moneyType[strtolower($type)];
}
} else {
//非小数位的处理
if(($num_str+0)!=0) {
$resultArray[$k++]=format3num($num_str+0);
$resultArray[$k++]=$commaTable[--$cc];
//判断：除小数外其余若不为零则加and
for($j=$i; $j <= $cc; $j++) {
//echo "<br>";
//echo $numArray[$j];
if($numArray[$j] !=0) {
$resultArray[$k++]="AND ";
break;
}
}
}
}
}
return join("",$resultArray);
}



function format3num($num) {
global $numTable,$commaTable;
$numlen = strlen($num);
for($i = 0,$j = 0;$i < $numlen; $i++) {
$bitenum[$j++] = substr($num,$i,1);
}
if($num==0) return "";
if($numlen == 1) return $numTable[$num];
if($numlen == 2) {
if($num <= 20) return $numTable[$num];
//第一位不可能零
if($bitenum[1]==0) {
return $numTable[$num];
} else {
return trim($numTable[$bitenum[0]*10])."-".$numTable[$bitenum[1]];
}

}
//第一个不可能为零
if($numlen == 3) {
if($bitenum[1]==0 && $bitenum[2]==0) {
//100
return $numTable[$bitenum[0]].$commaTable[0];
} elseif($bitenum[1]==0) {
//102
return $numTable[$bitenum[0]].$commaTable[0].$numTable[$bitenum[2]];
} elseif ($bitenum[2]==0) {
//120
return $numTable[$bitenum[0]].$commaTable[0].$numTable[$bitenum[1]*10];
} else {
//123
return $numTable[$bitenum[0]].$commaTable[0].trim($numTable[$bitenum[1]*10])."-".$numTable[$bitenum[2]];
}
}
return $num;
}
?>