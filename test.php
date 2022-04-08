<?php
ob_start();
?>

<script type="text/javascript">
    var d = new Date();
    document.write(d.getTimezoneOffset());
</script>

<?php
$offset = ob_get_clean();
print_r($offset);
