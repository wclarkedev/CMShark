<?php
$this_folder   = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT']));
$parent_folder = dirname($this_folder);
define("DOC_ROOT", $parent_folder . '/public/');