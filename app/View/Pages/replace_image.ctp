<?php
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');


$dir = new Folder(WWW_ROOT . 'img/productimage');
$files = $dir->find('.*hackup_tub.*', true);
$replace_with = $dir->find('step-free-click-here.jpg');
/*foreach($files as $file)
{
	$replace_with = 
}*/

echo "<pre>"; print_r($files); echo "</pre>";
echo "replace with";
echo "<pre>"; print_r($replace_with); echo "</pre>";