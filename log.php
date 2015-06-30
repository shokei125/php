<?php
//log_analysis every_day
$ary = array();
$fp = fopen('ac.log', 'r');

$count = 0;

if ($fp){
    if (flock($fp, LOCK_SH)){
        while (!feof($fp)) {
            $buffer = fgets($fp);
			$ary []= (int)ac_log($buffer);
            //print($buffer.'<br>');
            $count++;
        }

        //print('行は'.$count.'行でした<br>');

        flock($fp, LOCK_UN);
    }else{
        print('ファイルロックに失敗しました');
    }
}

$flag = fclose($fp);
/*
if ($flag){
    print('無事クローズしました');
}else{
    print('クローズに失敗しました');
}
*/
$tmp = array_count_values($ary);
//var_dump($tmp);

foreach($tmp as $k => $v){
	if(0 === $k) break;
	echo $k,"=>",$v,"<br>";
}


//日付の取得
function ac_log($s){
	$len = strlen($s);

	$str = '';

	for($i = 0; $i < $len; $i++){
			$c = $s[$i];
			
			if('	' === $c){
				$str = substr($str, 0, 8);
				return $str;
			}
			
			$str .= $c;
			
	}
	
}
