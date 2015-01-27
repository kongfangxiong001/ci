<?php
fwrite(STDOUT,"Enter your name:");
$name = trim(fgets(STDIN));
fwrite(STDOUT,"hello,$name");