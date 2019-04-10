<?php

if (php_sapi_name() !='cli') {
    exit;
}

//generate folder
mkdir("runtime", 0755);