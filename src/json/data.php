<?php
function get_content ($type, $requested_content) {
    if (!isset($type) && !isset($requested_content)) exit;

    switch ($type) {

        case "default":
            $data = json_decode(file_get_contents('./json/default.json'));
            $page = $data->{"page"};
            $meta = $data->{"meta"};

            switch ($requested_content) {
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

                case 'image':
                    $img = [];
                    $img['pfp']='./uploads/cmsharklogoshark.png';
                    $img['favicon']='./uploads/cmsharklogoshark.png';
                    $img['link_icon']='./uploads/default.png';
                    return $img;
                break;
            }
        break;

        case "page":
            $data = json_decode(file_get_contents('./json/page.json'));
            $config = json_decode(file_get_contents('./json/config.json'));
            switch ($requested_content) {
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
        break;

        case "settings":
            $settings = json_decode(file_get_contents('./json/settings.json'));
            switch ($requested_content) {
                case "page": 
                    return $settings->{"page"};
                break;

                case "page_theme":
                    return $settings->{"page"}->{"theme"};
                break;

                case "user":
                    return $settings->{"user"};
                break;
            }
        break;
    }
}
function put_content () {}

// Code below imported from old file (json/functions.php)
function check_icons ($type = 'icons') {
    $json = json_decode(file_get_contents('./json/page.json'));
    $social_icons = $json->{'social-icons'};
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
    $icons = array();
    
    foreach ($social_icons_list as $icon) {
        $note = $social_icons->{$icon} -> {'notes'};
        if (isset($note) && !empty(trim($note))) {
            switch ($note) {
                case "domain/sub":
                    if (isset($social_icons->{$icon}->{'link'}) && !empty(trim($social_icons->{$icon}->{'link'}))) array_push($icons, $icon);
                break;
            }
        } 
        if (!empty($social_icons->{$icon}->{'username'})) array_push($icons, $icon);
    }
    return $icons;
}
function get_icon ($i) {
    $json = json_decode(file_get_contents('./json/page.json'));
    $icon = $json->{'social-icons'}->{$i};
    $return_array = [];
    $return_array['fa'] = $icon->{'fa'};
    if (isset($icon->{'notes'}) && !empty(trim($icon->{'notes'})) && $icon->{'notes'} == 'domain/sub') $return_array['link'] = $icon->{'link'};
    $return_array['link'] = $icon->{'link'} . $icon->{'username'};
    return $return_array;

}
function check_link () {
    $json = json_decode(file_get_contents('./json/page.json'));
    $link = $json->{'links'}[0]->{'link'};
    if (empty(trim($link))) return true;
}