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
        case 'links':
            $links = [];
            $link = ['href'=>'https://cmshark.com','title'=>'Website','desc'=>'CMShark website.'];
            array_push($links, $link);
            $link = ['href'=>'https://github.com/wclarkey/cmshark','title'=>'GitHub','desc'=>'Github repository.'];
            array_push($links, $link);
            $link = ['href'=>'https://docs.cmshark.com','title'=>'Documentation','desc'=>'Documentation to help you get started.'];
            array_push($links, $link);
            $link = ['href'=>'https://discord.gg/FMmJnz6rmD','title'=>'Discord','desc'=>'CMShark community Discord server.'];
            array_push($links, $link);
            return $links;
        break;
    }
    
}

function getPageContent ($contentType) {
    if (!isset($contentType)) exit();
    $data = json_decode(file_get_contents('./json/page.json'));
    $config = json_decode(file_get_contents('./json/config.json'));
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
            $links = $data->{'links'};
            return $links;
        break;
        case 'page_meta':
            $meta_data = array();
            $meta_data['title'] = $config->{'title'};
            $meta_data['description'] = $config->{'description'};
            $meta_data['url'] = $config->{'url'};
            $meta_data['lang'] = $config->{'url'};
            $meta_data['owner'] = $config->{'owner'};
            return $meta_data;
        break;
    }
}

function checkLinks () {
    $json = json_decode(file_get_contents('./json/page.json'));
    $link = $json->{'links'}[0]->{'link'};
    if (empty(trim($link))) return true;
}

function socialIcons ($icon) {}

function getImages ($type,$link=null) {
    if (!isset($type) && empty(trim($type))) exit();
    switch ($type) {
        case "pfp":
            return './uploads/pfp.webp';
        break;
        case "favicon":
            return './uploads/fav.ico';
        break;
        case "link_icon":
            if (!isset($link) && empty(trim($link))) exit();
        break;
        case "default":
            $image = [];
            $image['pfp'] = './uploads/logo.png'; // cmshark link for default pfp
            $image['favicon'] = './uploads/logo.png'; // cmshark link for default favicon
            return $image;
        break;
    }
}