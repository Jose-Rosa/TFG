<?php 

session_destroy();

$url = Route::controllerRoute();

echo'<script>

    window.location = "'.$url.'"


</script';