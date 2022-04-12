<?php
include './library/functions.php';

//echo myHash('dfsdfjds7745');

$pt = 'index.php\?module=account\&page=activate\&id=([0-9]+)\&hash=(.+)';

$link  = 'index.php?module=account&page=activate&id=3&hash=wtK.jQh/RrvWk';

if(preg_match('#^'.$pt.'$#ui', $link, $mch)){
	echo '+';
	wtf($mch,1);
} else {
	echo '-';
}
