<?php
$_SERVER['HTTP_HOST'] = 'luxorasystem.com';
require_once '/home/u535843550/domains/luxorasystem.com/public_html/wp-load.php';
$code = get_post_meta(126, '_wpcode_snippet_code', true);
echo $code;
