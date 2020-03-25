<?php
$logFile = 'log/access.log';
//$text=file_get_contents('access.log');
//$pattern='#^(\S+) (\S+) (\S+) \[([\w:\/]+\s[+\-]\d{4})\] "(\S+)\s?(\S+)?\s?(\S+)?" (\d{3}|-) (\d+|-)\s?"?([^"]*)"?\s?"?([^"]*)?"?$#i';
//$pattern='#(^(\S+) (\S+) (\S+) \[([\w:/]+\s[+\-]\d{4})\] "(\S+)\s?(\S+)?\s?(\S+)?" (\d{3}|-) (\d+|-)\s?"?([^"]*)"?\s?"?([^"]*)?"?$)#i';
$pattern='#(^(\S+) (\S+) (\S+) \[([\w:/]+\s[+\-]\d{4})\] "(\S+)\s?(\S+)?\s?(\S+)?" (\d{3}|-) (\d+|-)\s?"?([^"]*)"?\s?"?([^"]*)?")#i';

//вытаскиваем данные в массив matches


if (file_exists($logFile)) {
    $matches = [];
    $file = fopen($logFile, "r");
    //log start work
    while (!feof($file)) {
        $line = fgets($file, 4096);
        preg_match_all($pattern, $line, $matches[]);
    }
    fclose($file);
    print_r($matches);
    //log end work
}

/*$ip=array_count_values($matches[1]);
$adr=array_count_values($matches[3]);

arsort($ip);
arsort($adr);

$ip_10=array_slice($ip,0,10);
$adr_10=array_slice($adr,0,10);

echo "10 самых активных пользователей по ip адресу";
echo "IP Количество\n";
foreach($ip_10 as $key=>$value)
{
    echo $key.' '.$value;
}

echo "10 самых посещаемых страниц\n";
echo "Страница Количество\n";
foreach($adr_10 as $key=>$value)
{
    echo $key.' '.$value;
}/** */