<?php
$host    = "219.245.12.129";
$db_user = "root";//数据库用户名
$db_pass = "cetccetc";//密码
$db_name = "xida";//数据库名称

error_reporting(E_ALL || ~E_NOTICE);
$link    = mysql_connect("$host", "$db_user", "$db_pass") or die("error");
mysql_select_db("$db_name");
mysql_query("set names 'utf8'");

$sql1    = "select fenlei from TUSHU_XINXI";
$result1 = mysql_query($sql1);
$arr     = ['A' => [], 'B' => [], 'C' => [], 'D' => [], 'E' => [], 'F' => [], 'G' => [], 'H' => [], 'I' => [], 'J' => [], 'K' => [], 'N' => [], 'O' => [], 'P' => [], 'Q' => [], 'R' => [], 'S' => [], 'T' => [], 'U' => [], 'V' => [], 'X' => [], 'Z' => []];
$i       = 0;
while ($row = mysql_fetch_array($result1)) {
	$key = substr($row['fenlei'], 0, 1);
	if (preg_match("/[A-Z]/", $key)) {
		array_push($arr[$key], $row['fenlei']);
	}
}
$nkey = array_keys($arr);

$kname = ["马列主义、毛泽东思想、邓小平理论", "哲学、宗教", "社会科学总论", "政治、法律", "军事", "经济", "文化、科学、教育、体育", "语言、文字", "文学", "艺术", "历史、地理", "自然科学总论", "数理科学与化学", "天文学、地球科学", "生物科学", "医学、卫生", "农业科学", "工业技术", "交通运输", "航空、航天", "环境科学，安全科学", "综合性图书"];
$arr_QuanCheng = array_combine($kname, $arr);//将fenlei_name和数组arr合成新的数组

//细化A类图书
$arrayA = [];
$c = count($arr['A']);

for ($i = 0; $i < $c; $i++) {
	$e = substr($arr['A'][$i], 0, 3);
	if (preg_match("/A49/", $e)) {
		$arrayA['A49']++;
		unset($arr['A'][$i]);
	} else {
		$k = substr($e, 0, 2);
		switch ($k) {
			case 'A1':
				$arrayA[$k]++;

				break;
			case 'A2':
				$arrayA[$k]++;

				break;
			case 'A3':
				$arrayA[$k]++;

				break;
			case 'A4':
				$arrayA[$k]++;

				break;
			case 'A5':
				$arrayA[$k]++;

				break;
			case 'A7':
				$arrayA[$k]++;

				break;
			case 'A8':
				$arrayA[$k]++;

				break;
			default  :
				$arrayA['other']++;

				break;
		}
	}
}

//细化B类图书
$arrayB = [];
$c = count($arr['B']);
for ($i = 0; $i < $c; $i++) {
	$e = substr($arr['B'][$i], 0, 3);
	if (preg_match("/B81/", $e)) {
		$arrayB['B81']++;
		unset($arr['B'][$i]);
	} else if (preg_match("/B82/", $e)) {
		$arrayB['B82']++;
		unset($arr['B'][$i]);
	} else if (preg_match("/B83/", $e)) {
		$arrayB['B83']++;
		unset($arr['B'][$i]);
	} else if (preg_match("/B84/", $e)) {
		$arrayB['B84']++;
		unset($arr['B'][$i]);
	} else if (preg_match("/B80/", $e)) {
		$arrayB['B80']++;
		unset($arr['B'][$i]);
	} else {
		$k = substr($e, 0, 2);
		switch ($k) {
			case 'B0':
				$arrayB[$k]++;

				break;
			case 'B1':
				$arrayB[$k]++;

				break;
			case 'B2':
				$arrayB[$k]++;

				break;
			case 'B3':
				$arrayB[$k]++;

				break;
			case 'B4':
				$arrayB[$k]++;

				break;
			case 'B5':
				$arrayB[$k]++;

				break;
			case 'B6':
				$arrayB[$k]++;

				break;
			case 'B7':
				$arrayB[$k]++;

				break;
			case 'B9':
				$arrayB[$k]++;

				break;
			default  :
				$arrayB['other']++;

				break;
		}
	}
}

//细化C类图书
$arrayC = [];
$c = count($arr['C']);
for ($i = 0; $i < $c; $i++) {
	$e = substr($arr['C'][$i], 0, 3);
	if (preg_match("/C91/", $e)) {
		$arrayC['C91']++;
		unset($arr['C'][$i]);
	} else if (preg_match("/C92/", $e)) {
		$arrayC['C92']++;
		unset($arr['C'][$i]);
	} else if (preg_match("/C97/", $e)) {
		$arrayC['C97']++;
		unset($arr['C'][$i]);
	} else if (preg_match("/C93/", $e)) {
		$arrayC['C93']++;
		unset($arr['C'][$i]);
	} else if (preg_match("/C94/", $e)) {
		$arrayC['C94']++;
		unset($arr['C'][$i]);
	} else if (preg_match("/C95/", $e)) {
		$arrayC['C95']++;
		unset($arr['C'][$i]);
	} else if (preg_match("/C96/", $e)) {
		$arrayC['C96']++;
		unset($arr['C'][$i]);
	} else {
		$k = substr($e, 0, 2);
		switch ($k) {
			case 'C0':
				$arrayC[$k]++;

				break;
			case 'C1':
				$arrayC[$k]++;

				break;
			case 'C2':
				$arrayC[$k]++;

				break;
			case 'C3':
				$arrayC[$k]++;

				break;
			case 'C4':
				$arrayC[$k]++;

				break;
			case 'C5':
				$arrayC[$k]++;

				break;
			case 'C6':
				$arrayC[$k]++;

				break;
			case 'C7':
				$arrayC[$k]++;

				break;
			case 'C8':
				$arrayC[$k]++;

				break;
			default  :
				$arrayC['other']++;

				break;
		}
	}
}

//细化D类图书
$arrayD = [];
$c = count($arr['D']);
for ($i = 0; $i < $c; $i++) {
	$k = substr($arr['D'][$i], 0, 2);
	switch ($k) {
		case 'D0':
			$arrayD[$k]++;

			break;
		case 'D1':
			$arrayD[$k]++;

			break;
		case 'D2':
			$arrayD[$k]++;

			break;
		case 'D3':
			$arrayD[$k]++;

			break;
		case 'D4':
			$arrayD[$k]++;

			break;
		case 'D5':
			$arrayD[$k]++;

			break;
		case 'D6':
			$arrayD[$k]++;

			break;
		case 'D7':
			$arrayD[$k]++;

			break;
		case 'D8':
			$arrayD[$k]++;

			break;
		case 'D9':
			$arrayD[$k]++;

			break;
		DEFAULT  :
			$arrayD['other']++;

			break;
	}
}

//细化E类图书
$arrayE = [];
$c = count($arr['E']);
for ($i = 0; $i < $c; $i++) {
	$e = substr($arr['E'][$i], 0, 3);
	if (preg_match("/E99/", $e)) {
		$arrayE['E99']++;
		unset($arr['E'][$i]);
	} else {
		$k = substr($arr['E'][$i], 0, 2);
		switch ($k) {
			case 'E0':
				$arrayE[$k]++;

				break;
			case 'E1':
				$arrayE[$k]++;

				break;
			case 'E2':
				$arrayE[$k]++;

				break;
			case 'E3':
				$arrayE[$k]++;

				break;
			case 'E4':
				$arrayE[$k]++;

				break;
			case 'E5':
				$arrayE[$k]++;

				break;
			case 'E6':
				$arrayE[$k]++;

				break;
			case 'E7':
				$arrayE[$k]++;

				break;
			case 'E8':
				$arrayE[$k]++;

				break;
			case 'E9':
				$arrayE[$k]++;

				break;
			DEFAULT :
				$arrayE['other']++;
				break;
		}
	}
}

//细化F类图书
$arrayF = [];
$c = count($arr['F']);
for ($i = 0; $i < $c; $i++) {
	$e = substr($arr['F'][$i], 0, 3);
	if (preg_match("/F49/", $e)) {
		$arrayF['F49']++;
		unset($arr['F'][$i]);
	} else if (preg_match("/F59/", $e)) {
		$arrayF['F59']++;
		unset($arr['F'][$i]);
	} else {
		$k = substr($arr['F'][$i], 0, 2);
		switch ($k) {
			case 'F0':
				$arrayF[$k]++;

				break;
			case 'F1':
				$arrayF[$k]++;

				break;
			case 'F2':
				$arrayF[$k]++;

				break;
			case 'F3':
				$arrayF[$k]++;

				break;
			case 'F4':
				$arrayF[$k]++;

				break;
			case 'F5':
				$arrayF[$k]++;

				break;
			case 'F6':
				$arrayF[$k]++;

				break;
			case 'F7':
				$arrayF[$k]++;

				break;
			case 'F8':
				$arrayF[$k]++;

				break;

			DEFAULT :
				$arrayF['other']++;
				break;
		}
	}
}

//细化G类图书
$c = count($arr['G']);
for ($i = 0; $i < $c; $i++) {
	$k = substr($arr['G'][$i], 0, 2);
	switch ($k) {
		case 'G0':
			$arrayG[$k]++;

			break;
		case 'G1':
			$arrayG[$k]++;

			break;
		case 'G2':
			$arrayG[$k]++;

			break;
		case 'G3':
			$arrayG[$k]++;

			break;
		case 'G4':
			$arrayG[$k]++;

			break;
		case 'G5':
			$arrayG[$k]++;

			break;
		case 'G6':
			$arrayG[$k]++;

			break;
		case 'G7':
			$arrayG[$k]++;

			break;
		case 'G8':
			$arrayG[$k]++;

			break;

		DEFAULT :
			$arrayG['other']++;
			break;
	}
}

//细化H类图书
$arrayH = [];
$c = count($arr['H']);
for ($i = 0; $i < $c; $i++) {
	$e = substr($arr['H'][$i], 0, 3);
	if (preg_match("/H61/", $e)) {
		$arrayH['H61']++;
		unset($arr['H'][$i]);
	} else if (preg_match("/H62/", $e)) {
		$arrayH['H62']++;
		unset($arr['H'][$i]);
	} else if (preg_match("/H63/", $e)) {
		$arrayH['H63']++;
		unset($arr['H'][$i]);
	} else if (preg_match("/H65/", $e)) {
		$arrayH['H65']++;
		unset($arr['H'][$i]);
	} else if (preg_match("/H66/", $e)) {
		$arrayH['H66']++;
		unset($arr['H'][$i]);
	} else if (preg_match("/H67/", $e)) {
		$arrayH['H67']++;
		unset($arr['H'][$i]);
	} else if (preg_match("/H81/", $e)) {
		$arrayH['H81']++;
		unset($arr['H'][$i]);
	} else if (preg_match("/H83/", $e)) {
		$arrayH['H83']++;
		unset($arr['H'][$i]);
	} else if (preg_match("/H84/", $e)) {
		$arrayH['H84']++;
		unset($arr['H'][$i]);
	} else {
		$k = substr($e, 0, 2);
		switch ($k) {
			case 'H0':
				$arrayH[$k]++;

				break;
			case 'H1':
				$arrayH[$k]++;

				break;
			case 'H2':
				$arrayH[$k]++;

				break;
			case 'H3':
				$arrayH[$k]++;

				break;
			case 'H4':
				$arrayH[$k]++;

				break;
			case 'H5':
				$arrayH[$k]++;

				break;
			case 'H7':
				$arrayH[$k]++;

				break;
			case 'H9':
				$arrayH[$k]++;

				break;
			default  :
				$arrayH['other']++;

				break;
		}
	}
}

//细化I类图书
$array = [];
$c = count($arr['I']);
for ($i = 0; $i < $c; $i++) {
	$k = substr($arr['I'][$i], 0, 2);
	switch ($k) {
		case 'I0':
			$arrayI[$k]++;

			break;
		case 'I1':
			$arrayI[$k]++;

			break;
		case 'I2':
			$arrayI[$k]++;

			break;
		case 'I3':
			$arrayI[$k]++;

			break;
		case 'I4':
			$arrayI[$k]++;

			break;
		case 'I5':
			$arrayI[$k]++;

			break;
		case 'I6':
			$arrayI[$k]++;

			break;
		case 'I7':
			$arrayI[$k]++;

			break;
		DEFAULT  :
			$arrayI['other']++;

			break;
	}
}
//细化J类图书
$arrayJ = [];
$c = count($arr['J']);
for ($i = 0; $i < $c; $i++) {
	$e = substr($arr['J'][$i], 0, 3);
	if (preg_match("/J29/", $e)) {
		$arrayJ['J49']++;
		unset($arr['J'][$i]);
	} else if (preg_match("/J59/", $e)) {
		$arrayJ['J59']++;
		unset($arr['J'][$i]);
	} else {
		$k = substr($arr['J'][$i], 0, 2);
		switch ($k) {
			case 'J0':
				$arrayJ[$k]++;

				break;
			case 'J1':
				$arrayJ[$k]++;

				break;
			case 'J2':
				$arrayJ[$k]++;

				break;
			case 'J3':
				$arrayJ[$k]++;

				break;
			case 'J4':
				$arrayJ[$k]++;

				break;
			case 'J5':
				$arrayJ[$k]++;

				break;
			case 'J6':
				$arrayJ[$k]++;

				break;
			case 'J7':
				$arrayJ[$k]++;

				break;
			case 'J8':
				$arrayJ[$k]++;

				break;
			case 'J9':
				$arrayJ[$k]++;

				break;

			DEFAULT  :
				$arrayJ['other']++;

				break;
		}
	}
}

//细化K类图书
$arrayK = [];
$c = count($arr['K']);
for ($i = 0; $i < $c; $i++) {
	$e = substr($arr['K'][$i], 0, 3);
	if (preg_match("/K81/", $e)) {
		$arrayK['K81']++;
		unset($arr['K'][$i]);
	} else if (preg_match("/K82/", $e)) {
		$arrayK['K82']++;
		unset($arr['K'][$i]);
	} else if (preg_match("/K83/", $e)) {
		$arrayK['K83']++;
		unset($arr['K'][$i]);
	} else if (preg_match("/K85/", $e)) {
		$arrayK['K85']++;
		unset($arr['K'][$i]);
	} else if (preg_match("/K86/", $e)) {
		$arrayK['K86']++;
		unset($arr['K'][$i]);
	} else if (preg_match("/K87/", $e)) {
		$arrayK['K87']++;
		unset($arr['K'][$i]);
	} else if (preg_match("/K89/", $e)) {
		$arrayK['K89']++;
		unset($arr['K'][$i]);
	} else {
		$k = substr($e, 0, 2);
		switch ($k) {
			case 'K0':
				$arrayK[$k]++;

				break;
			case 'K1':
				$arrayK[$k]++;

				break;
			case 'K2':
				$arrayK[$k]++;

				break;
			case 'K3':
				$arrayK[$k]++;

				break;
			case 'K4':
				$arrayK[$k]++;

				break;
			case 'K5':
				$arrayK[$k]++;

				break;
			case 'K6':
				$arrayK[$k]++;

				break;
			case 'K7':
				$arrayK[$k]++;

				break;
			case 'K9':
				$arrayK[$k]++;

				break;
			default  :
				$arrayK['other']++;

				break;
		}
	}
}

//细化N类图书
$arrayN = [];
$c = count($arr['N']);
for ($i = 0; $i < $c; $i++) {
	$e = substr($arr['N'][$i], 0, 3);
	if (preg_match("/N91/", $e)) {
		$arrayN['N91']++;
		unset($arr['N'][$i]);
	} else if (preg_match("/N92/", $e)) {
		$arrayN['N92']++;
		unset($arr['N'][$i]);
	} else if (preg_match("/N93/", $e)) {
		$arrayN['K83']++;
		unset($arr['N'][$i]);
	} else if (preg_match("/N94/", $e)) {
		$arrayN['N94']++;
		unset($arr['H'][$i]);
	} else if (preg_match("/N99/", $e)) {
		$arrayN['N99']++;
		unset($arr['N'][$i]);
	} else {
		$k = substr($e, 0, 2);
		switch ($k) {
			case 'N0':
				$arrayN[$k]++;

				break;
			case 'N1':
				$arrayN[$k]++;

				break;
			case 'N2':
				$arrayN[$k]++;

				break;
			case 'N3':
				$arrayN[$k]++;

				break;
			case 'N4':
				$arrayN[$k]++;

				break;
			case 'N5':
				$arrayN[$k]++;

				break;
			case 'N6':
				$arrayN[$k]++;

				break;
			case 'N7':
				$arrayN[$k]++;

				break;
			case 'N8':
				$arrayN[$k]++;

				break;
			default  :
				$arrayN['other']++;

				break;
		}
	}
}

//细化O类图书
$arrayO = [];
$c = count($arr['O']);
for ($i = 0; $i < $c; $i++) {
	$k = substr($arr['O'][$i], 0, 2);
	switch ($k) {

		case 'O1':
			$arrayO[$k]++;

			break;
		case 'O2':
			$arrayO[$k]++;

			break;
		case 'O3':
			$arrayO[$k]++;

			break;
		case 'O4':
			$arrayO[$k]++;

			break;
		case 'O5':
			$arrayO[$k]++;

			break;
		case 'O6':
			$arrayO[$k]++;

			break;
		case 'O7':
			$arrayO[$k]++;

			break;

		default  :
			$arrayO['other']++;

			break;
	}
}

//细化P类图书
$arrayP = [];
$c = count($arr['P']);
for ($i = 0; $i < $c; $i++) {
	$k = substr($arr['P'][$i], 0, 2);
	switch ($k) {

		case 'P1':
			$arrayP[$k]++;

			break;
		case 'P2':
			$arrayP[$k]++;

			break;
		case 'P3':
			$arrayP[$k]++;

			break;
		case 'P4':
			$arrayP[$k]++;

			break;
		case 'P5':
			$arrayP[$k]++;

			break;
		case 'P6':
			$arrayP[$k]++;

			break;
		case 'P7':
			$arrayP[$k]++;

			break;
		case 'P9':
			$arrayP[$k]++;

			break;
		default  :
			$arrayP['other']++;

			break;
	}
}

//细化Q类图书
$arrayQ = [];
$c = count($arr['Q']);
for ($i = 0; $i < $c; $i++) {
	$e = substr($arr['Q'][$i], 0, 3);
	if (preg_match("/Q-0/", $e)) {
		$arrayQ['Q-0']++;
		unset($arr['Q'][$i]);
	} else if (preg_match("/Q-1/", $e)) {
		$arrayQ['Q-1']++;
		unset($arr['Q'][$i]);
	} else if (preg_match("/Q-3/", $e)) {
		$arrayQ['Q-3']++;
		unset($arr['Q'][$i]);
	} else if (preg_match("/Q-9/", $e)) {
		$arrayQ['Q-9']++;
		unset($arr['Q'][$i]);
	} else if (preg_match("/Q81/", $e)) {
		$arrayQ['Q81']++;
		unset($arr['Q'][$i]);
	} else if (preg_match("/Q89/", $e)) {
		$arrayQ['Q89']++;
		unset($arr['Q'][$i]);
	} else if (preg_match("/Q91/", $e)) {
		$arrayQ['Q91']++;
		unset($arr['Q'][$i]);
	} else if (preg_match("/Q93/", $e)) {
		$arrayQ['Q93']++;
		unset($arr['Q'][$i]);
	} else if (preg_match("/Q94/", $e)) {
		$arrayQ['Q94']++;
		unset($arr['Q'][$i]);
	} else if (preg_match("/Q95/", $e)) {
		$arrayQ['Q95']++;
		unset($arr['Q'][$i]);
	} else if (preg_match("/Q96/", $e)) {
		$arrayQ['Q96']++;
		unset($arr['Q'][$i]);
	} else if (preg_match("/Q98/", $e)) {
		$arrayQ['Q98']++;
		unset($arr['Q'][$i]);
	} else {
		$k = substr($e, 0, 2);
		switch ($k) {
			case 'Q1':
				$arrayQ[$k]++;

				break;
			case 'Q2':
				$arrayQ[$k]++;

				break;
			case 'Q3':
				$arrayQ[$k]++;

				break;
			case 'Q4':
				$arrayQ[$k]++;

				break;
			case 'Q5':
				$arrayQ[$k]++;

				break;
			case 'Q6':
				$arrayQ[$k]++;

				break;
			case 'Q7':
				$arrayQ[$k]++;

				break;
			default  :
				$arrayQ['other']++;

				break;
		}
	}
}

//细化R类图书
$arrayR = [];
$c = count($arr['R']);
for ($i = 0; $i < $c; $i++) {
	$e = substr($arr['R'][$i], 0, 3);
	if (preg_match("/R-0/", $e)) {
		$arrayR['R-0']++;
		unset($arr['R'][$i]);
	} else if (preg_match("/R71/", $e)) {
		$arrayR['R71']++;
		unset($arr['R'][$i]);
	} else if (preg_match("/R72/", $e)) {
		$arrayR['R72']++;
		unset($arr['R'][$i]);
	} else if (preg_match("/R73/", $e)) {
		$arrayR['R73']++;
		unset($arr['R'][$i]);
	} else if (preg_match("/R74/", $e)) {
		$arrayR['R74']++;
		unset($arr['R'][$i]);
	} else if (preg_match("/R75/", $e)) {
		$arrayR['R75']++;
		unset($arr['R'][$i]);
	} else if (preg_match("/R76/", $e)) {
		$arrayR['R76']++;
		unset($arr['R'][$i]);
	} else if (preg_match("/R77/", $e)) {
		$arrayR['R77']++;
		unset($arr['R'][$i]);
	} else if (preg_match("/R78/", $e)) {
		$arrayR['R78']++;
		unset($arr['R'][$i]);
	} else if (preg_match("/R79/", $e)) {
		$arrayR['R79']++;
		unset($arr['R'][$i]);
	} else {
		$k = substr($e, 0, 2);
		switch ($k) {
			case 'R1':
				$arrayR[$k]++;

				break;
			case 'R2':
				$arrayR[$k]++;

				break;
			case 'R3':
				$arrayR[$k]++;

				break;
			case 'R4':
				$arrayR[$k]++;

				break;
			case 'R5':
				$arrayR[$k]++;

				break;
			case 'R6':
				$arrayR[$k]++;

				break;
			case 'R8':
				$arrayR[$k]++;

				break;
			case 'R9':
				$arrayR[$k]++;
				break;

			default  :
				$arrayR['other']++;

				break;
		}
	}
}

//细化S类图书
$arrayS = [];
$c = count($arr['S']);
for ($i = 0; $i < $c; $i++) {
	$e = substr($arr['S'][$i], 0, 3);
	if (preg_match("/S-0/", $e)) {
		$arrayS['S-0']++;
		unset($arr['S'][$i]);
	} else if (preg_match("/S-1/", $e)) {
		$arrayS['S-1']++;
		unset($arr['S'][$i]);
	} else if (preg_match("/S-3/", $e)) {
		$arrayS['S-3']++;
		unset($arr['S'][$i]);
	} else if (preg_match("/S-9/", $e)) {
		$arrayS['S-9']++;
		unset($arr['S'][$i]);
	} else {
		$k = substr($e, 0, 2);
		switch ($k) {
			case 'S1':
				$arrayS[$k]++;

				break;
			case 'S2':
				$arrayS[$k]++;

				break;
			case 'S3':
				$arrayS[$k]++;

				break;
			case 'S4':
				$arrayS[$k]++;

				break;
			case 'S5':
				$arrayS[$k]++;

				break;
			case 'S6':
				$arrayS[$k]++;

				break;
			case 'S7':
				$arrayS[$k]++;

				break;
			case 'S8':
				$arrayS[$k]++;

				break;
			case 'S9':
				$arrayS[$k]++;
				break;

			default  :
				$arrayS['other']++;

				break;
		}
	}
}

//细化T类图书
$arrayT = [];
$c = count($arr['T']);
for ($i = 0; $i < $c; $i++) {
	$e = substr($arr['T'][$i], 0, 3);
	if (preg_match("/T-0/", $e)) {
		$arrayT['T-0']++;
		unset($arr['T'][$i]);
	} else if (preg_match("/T-1/", $e)) {
		$arrayT['T-1']++;
		unset($arr['T'][$i]);
	} else if (preg_match("/T-6/", $e)) {
		$arrayT['T-6']++;
		unset($arr['T'][$i]);
	} else if (preg_match("/T-9/", $e)) {
		$arrayT['T-9']++;
		unset($arr['T'][$i]);
	} else {
		$k = substr($e, 0, 2);
		switch ($k) {
			case 'TB':
				$arrayT[$k]++;

				break;
			case 'TD':
				$arrayT[$k]++;

				break;
			case 'TE':
				$arrayT[$k]++;

				break;
			case 'TF':
				$arrayT[$k]++;

				break;
			case 'TG':
				$arrayT[$k]++;

				break;
			case 'TH':
				$arrayT[$k]++;

				break;
			case 'TJ':
				$arrayT[$k]++;

				break;
			case 'TK':
				$arrayT[$k]++;

				break;
			case 'TL':
				$arrayT[$k]++;

				break;
			case 'TM':
				$arrayT[$k]++;

				break;
			case 'TN':
				$arrayT[$k]++;

				break;
			case 'TP':
				$arrayT[$k]++;

				break;
			case 'TQ':
				$arrayT[$k]++;

				break;
			case 'TS':
				$arrayT[$k]++;

				break;
			case 'TU':
				$arrayT[$k]++;
				break;
			case 'TV':
				$arrayT[$k]++;

				break;
			default  :
				$arrayT['other']++;

				break;
		}
	}
}

//细化U类图书
$arrayU = [];
$c = count($arr['U']);
for ($i = 0; $i < $c; $i++) {
	$k = substr($arr['U'][$i], 0, 2);
	switch ($k) {
		case 'U1':
			$arrayU[$k]++;

			break;
		case 'U2':
			$arrayU[$k]++;

			break;
		case 'U4':
			$arrayU[$k]++;

			break;
		case 'U6':
			$arrayU[$k]++;

			break;
		case 'U8':
			$arrayU[$k]++;
			break;

		default  :
			$arrayU['other']++;

			break;
	}
}

//细化V类图书
$arrayV = [];
$c = count($arr['V']);
for ($i = 0; $i < $c; $i++) {
	$k = substr($arr['V'][$i], 0, 2);
	switch ($k) {
		case 'V1':
			$arrayV[$k]++;

			break;
		case 'V2':
			$arrayV[$k]++;

			break;
		case 'V3':
			$arrayV[$k]++;

			break;
		case 'V4':
			$arrayV[$k]++;

			break;
		case 'V5':
			$arrayV[$k]++;

			break;
		case 'V7':
			$arrayV[$k]++;

			break;
		default  :
			$arrayV['other']++;

			break;
	}
}

//细化X类图书
$arrayX = [];
$c = count($arr['X']);
for ($i = 0; $i < $c; $i++) {
	$e = substr($arr['X'][$i], 0, 3);
	if (preg_match("/X-1/", $e)) {
		$arrayX['X-1']++;
		unset($arr['X'][$i]);
	} else if (preg_match("/X-4/", $e)) {
		$arrayX['X-4']++;
		unset($arr['X'][$i]);
	} else if (preg_match("/X-6/", $e)) {
		$arrayX['X-6']++;
		unset($arr['X'][$i]);
	} else {
		$k = substr($e, 0, 2);
		switch ($k) {
			case 'X1':
				$arrayX[$k]++;

				break;
			case 'X2':
				$arrayX[$k]++;

				break;
			case 'X3':
				$arrayX[$k]++;

				break;
			case 'X4':
				$arrayX[$k]++;

				break;
			case 'X5':
				$arrayX[$k]++;

				break;
			case 'X7':
				$arrayX[$k]++;

				break;
			case 'X8':
				$arrayX[$k]++;

				break;
			case 'X9':
				$arrayX[$k]++;
				break;

			default  :
				$arrayX['other']++;

				break;
		}
	}
}

//细化Z类图书
$arrayZ = [];
$c = count($arr['Z']);
for ($i = 0; $i < $c; $i++) {
	$k = substr($arr['Z'][$i], 0, 2);
	switch ($k) {
		case 'Z1':
			$arrayZ[$k]++;

			break;
		case 'Z2':
			$arrayZ[$k]++;

			break;
		case 'Z4':
			$arrayZ[$k]++;

			break;
			break;
		case 'Z5':
			$arrayZ[$k]++;

			break;
		case 'Z6':
			$arrayZ[$k]++;

			break;
		case 'Z8':
			$arrayZ[$k]++;
			break;

		default  :
			$arrayZ['other']++;

			break;
	}
}
?>
