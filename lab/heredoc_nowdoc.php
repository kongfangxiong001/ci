<?php

$name = "jack";

//Nowdoc 单引号
echo <<<'EOT'
my name is "$name"
EOT;

//Heredoc 不加引号，或者用双引号
echo <<<FOOBAR
echo $name;
Hello,World!
FOOBAR;

echo <<<"FOOBAR"
Hello World!
echo $name."leihao";
FOOBAR;
