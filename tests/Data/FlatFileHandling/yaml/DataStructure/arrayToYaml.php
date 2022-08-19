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

yaml_emit_file ('dataSample.yml',$data);