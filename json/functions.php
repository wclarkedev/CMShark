<?php
function getPageContent ($contentType) {
    if (!isset($contentType)) exit();
    switch ($contentType) {
        case 'page_header':
            // return array with all page header data
        break;
        case 'name':
            // return page header name
        break;
        case 'bio':
            // return page header bio
        break;
        case 'location':
            // return page header location
        break;
        case 'links':
            // return array of all links
        break;
    }
}
function socialIcons ($icon) {}