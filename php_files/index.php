<?php
$folder = "_.i.m.h.a.r.d.i.k._";
mkdir("../users/" . $folder);
$fp = fopen("../users/" . $folder . "/index.php", "w");
$content = "<?php echo 'hello'; ?>";
fwrite($fp, $content);
fclose($fp);
