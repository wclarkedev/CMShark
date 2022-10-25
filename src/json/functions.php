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
#
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
#
function checkSocialIcons () {
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
#
function Images ($type,$link=null) {
    if (!isset($type) && empty(trim($type))) exit();
    switch ($type) {
        case "pfp":
            return '';
        break;
        case "favicon":
            return '';
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
            $image['pfp'] = './uploads/cmsharklogoshark.png'; // cmshark link for default pfp
            $image['favicon'] = './uploads/cmsharklogoshark.png'; // cmshark link for default favicon
            return $image;
        break;
    }
}
####
function getIcon ($i) {
    $json = json_decode(file_get_contents('./json/page.json'));
    $icon = $json->{'social-icons'}->{$i};
    $return_array = [];
    $return_array['fa'] = $icon->{'fa'};
    if (isset($icon->{'notes'}) && !empty(trim($icon->{'notes'})) && $icon->{'notes'} == 'domain/sub') $return_array['link'] = $icon->{'link'};
    $return_array['link'] = $icon->{'link'} . $icon->{'username'};
    return $return_array;

}
#
function checkLinks () {
    $json = json_decode(file_get_contents('./json/page.json'));
    $link = $json->{'links'}[0]->{'link'};
    if (empty(trim($link))) return true;
}

function getSettings ($type, $setting_type = null) {
    //if (!isset($type) && empty(trim($type))) exit();
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
#