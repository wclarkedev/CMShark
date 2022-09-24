<?php
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