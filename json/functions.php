<?php
function getPageContent ($contentType) {
    if (!isset($contentType)) exit();
    $data = json_decode(file_get_contents('page.json'));
    switch ($contentType) {
        case 'page_header':
            $header_data = array();
            $header_data['name'] = $data->{'name'};
            $header_data['bio'] = $data->{'bio'};
            $header_data['location'] = $data->{'location'};
            return $header_data;
        break;
        case 'name':
            return $data->{'name'};
        break;
        case 'bio':
            return $data->{'bio'};
        break;
        case 'location':
            return $data->{'location'};
        break;
        case 'links':
            // return array of all links
        break;
    }
}
function socialIcons ($icon) {}
$header_data = getPageContent('page_header');
//var_dump($header_data);
echo $header_data['name'];