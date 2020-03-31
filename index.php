<?php

require_once "vendor/autoload.php";

$test= [
    'name'  =>  'code-architect',
    'task'  =>  'developer',
    'email' =>  'codearchitectdeveloper@gmail.com',
    'tech'  =>  ['php', 'mysql', 'mongodb', 'elastic-search']
];

new \CodeArchitect\ResponseClass\JsonResponse('ok', '', $test);