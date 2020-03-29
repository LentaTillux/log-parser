<?php

declare(strict_types=1);

class ParsingLogFile
{
    private $file;

    public function __construct(?string $file = null)
    {
        $this->file = $file;
    }

    public function parse()
    {
        //$text=file_get_contents('access.log');
        //$pattern='#^(\S+) (\S+) (\S+) \[([\w:\/]+\s[+\-]\d{4})\] "(\S+)\s?(\S+)?\s?(\S+)?" (\d{3}|-) (\d+|-)\s?"?([^"]*)"?\s?"?([^"]*)?"?$#i';
        //$pattern='#(^(\S+) (\S+) (\S+) \[([\w:/]+\s[+\-]\d{4})\] "(\S+)\s?(\S+)?\s?(\S+)?" (\d{3}|-) (\d+|-)\s?"?([^"]*)"?\s?"?([^"]*)?"?$)#i';
        $pattern = '#(^(\S+) (\S+) (\S+) \[([\w:/]+\s[+\-]\d{4})\] "(\S+)\s?(\S+)?\s?(\S+)?" (\d{3}|-) (\d+|-)\s?"?([^"]*)"?\s?"?([^"]*)?")#i';
        $file = $this->file;

        if (file_exists($file)) {
            $matches = [];
            $file = fopen($file, "r");
            while (!feof($file)) {
                $line = fgets($file, 4096);
                \UtilsPHP::preg_match_all($pattern, $line, $matches[]);
            }
            fclose($file);
            print_r($matches);
        }
    }
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