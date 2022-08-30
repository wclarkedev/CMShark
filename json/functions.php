<?php
function defaultContent ($requestedContent) {
    if (!isset($requestedContent) && empty(trim($requestedContent))) exit();
    $data = json_decode(
        file_get_contents(
            './json/default.json'
        )
    );
    $page = $data->{"page"};
    $meta = $data->{"meta"};
    $links = $page->{'links'};
    switch ($requestedContent) {
        case 'page_header':
            $return = array();
            $return['name'] = $page->{'name'};
            $return['bio'] = $page->{'bio'};
            $return['location'] = $page->{'location'};
            return $return;
        break;
        case 'page_meta': 
            $return = [];
            $return['title'] = $meta->{'title'};
            $return['description'] = $meta->{'description'};
            $return['url'] = $meta->{'url'};
            $return['lang'] = $meta->{'lang'};
            $return['owner'] = $meta->{'owner'};
            return $return;
        break;
        case 'links':
            return $page->{'links'};
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

function checkSocialIcons () {
    $json = json_decode(file_get_contents('./json/page.json'));
    $social_icons = $json->{'social-icons'};
    $social_icons_list = [
        'bandcamp',
        'bahance',
        'bitbucket',
        'discourse',
        'discord',
        'email',
        'facebook',
        'github',
        'gitlab',
        'instagram',
        'linkedin',
        'medium',
        'patreon',
        'phone',
        'pinterest',
        'quora',
        'reddit',
        'snapchat',
        'stackoverflow',
        'telegram',
        'tiktok',
        'twitch',
        'twitter',
        'whatsapp',
        'youtube',
        'tumblr',
        'messenger',
        'blogger'
    ];
    $icons = array();
    
    foreach ($social_icons_list as $icon) {
        $note = $social_icons->{$icon} -> {'notes'};
        if (isset($note) && !empty(trim($note))) {
            switch ($note) {
                case "domain/sub":
                    if (isset($social_icons->{$icon}->{'link'}) && !empty(trim($social_icons->{$icon}->{'link'}))) array_push($icons, $icon);
                break;
            }
        } else {
            if (isset($social_icons->{$icon}->{'username'}) && !empty(trim($social_icons->{$icon}->{'username'}))) array_push($icons, $icon);
        }
        return $icons;
    }
}
$test = json_decode(file_get_contents('page.json'));
$social_icons_list = [
    'bandcamp',
    'behance',
    'bitbucket',
    'discourse',
    'discord',
    'email',
    'facebook',
    'github',
    'gitlab',
    'instagram',
    'linkedin',
    'medium',
    'patreon',
    'phone',
    'pinterest',
    'quora',
    'reddit',
    'snapchat',
    'stackoverflow',
    'telegram',
    'tiktok',
    'twitch',
    'twitter',
    'whatsapp',
    'youtube',
    'tumblr',
    'messenger',
    'blogger'
];
foreach ($social_icons_list as $icon) {
    $note = $test->{'social-icons'}->{$icon} -> {'notes'};
    if (isset($note) && !empty(trim($note))) {
        switch ($note) {
            case "domain/sub":
                //echo $icon . "<br>";
        }
    }  
}

function socialIcons ($icon) {
    $social = json_decode(file_get_contents('./json/page.json'));
    $social = $social->{'social-icons'};
    return $social->{$icon};
}

function checkLinks () {
    $json = json_decode(file_get_contents('./json/page.json'));
    $link = $json->{'links'}[0]->{'link'};
    if (empty(trim($link))) return true;
}

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
            $default = './images/default.png';
            $domain = explode('/', $link);
            $domain = $domain[2]; //assuming that the url starts with http:// or https://
            return $default;

        break;
        case "default":
            $image = [];
            $image['pfp'] = './uploads/default/logo.png'; // cmshark link for default pfp
            $image['favicon'] = './uploads/default/logo.png'; // cmshark link for default favicon
            return $image;
        break;
    }
}

function getSettings ($type, $setting_type = null) {
    if (!isset($type) && empty(trim($type))) exit();
    $settings = json_decode(file_get_contents('./json/settings.json'));
    $page_settings = $settings->{'page'};
    $user_settings = $settings->{'user'};
    switch ($type) {
        case "page":
            return $page_settings;
        break;
        case "page_theme":
            return $page_settings->{'theme'};
        break;
        case "user":
            return $user_settings;
        break;
    }
}