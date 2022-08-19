<?php
$data = [];
$data['links'] = array();
$links = [
    ['Name'=>'Github', 'Content'=>'https://github.com/wclarkey'],
    ['Name'=>'Github', 'Content'=>'https://github.com/is-a-good-dev'],
    ['Name'=>'Github', 'Content'=>'https://github.com/cmshark']
];
array_push($data['links'],$links);
$data['title'] = 'CMShark';
$data['desc'] = 'CMShark is a flexible CMS';
/*
Array ( 
    [links] => Array ( 
        [0] => Array ( 
            [0] => Array ( 
                [Name] => Github [Content] => https://github.com/wclarkey 
                ) 
            [1] => Array ( 
                [Name] => Github [Content] => https://github.com/is-a-good-dev 
                ) 
            [2] => Array ( 
                [Name] => Github [Content] => https://github.com/cmshark 
            ) 
        ) 
    ) 
    [title] => CMShark 
    [desc] => CMShark is a flexible CMS 
) 
*/
var_dump($data);
echo "<br>".$data['links'][0][0]['Name']."<br>";

$count = count($data['links'][0]);
echo $count;
$i = 0;
for ($i = 0;$i < $count;$i++) {
    echo $data['links'][0][$i]['Name'];
    echo '<br>';
    echo $data['links'][0][$i]['Content'];
    echo '<br>';
}