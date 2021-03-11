<?php

include "src/Git.php";

$git = new Git;
print_r($git->branch());
