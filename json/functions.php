<?php
function defaultContent ($requestedContent) {
    if (!isset($requestedContent) && empty(trim($requestedContent))) exit();
    switch ($requestedContent) {
        case 'page_header':
            $header = [];
            $header['name'] = 'CMShark';
            $header['bio'] = 'CMShark is a flexible, customisable and, open source CMS for bio link lists.';
            $header['location'] = 'UK';
            return $header;
            break;
        case 'page_meta': 
            $meta = [];
            $meta['title'] = 'CMShark - A flexible, customisable and, opensource CMS.';
            $meta['description'] = 'CMShark is a flexible, customisable and, open source CMS for bio link lists.';
            $meta['url'] = 'https://cmshark.com';
            $meta['lang'] = 'en_GB';
            $meta['owner'] = 'William Clarke';
            return $meta;
            break;
    }
    
}

function getPageContent ($contentType) {
    if (!isset($contentType)) exit();
    $data = json_decode(file_get_contents('./json/page.json'));
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
