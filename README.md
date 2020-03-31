#json-responser-package
Take the value user assign/enter to the properties of the class. And return the json formatted response.

## Installation
composer require codearchitect/json_response

### Usage
```php
require_once "vendor/autoload.php";

$test= [
    'name'  =>  'code-architect',
    'task'  =>  'developer',
    'email' =>  'codearchitectdeveloper@gmail.com',
    'tech'  =>  ['php', 'mysql', 'mongodb', 'elastic-search']
];

new \CodeArchitect\ResponseClass\JsonResponse('ok', '', $test);
```

### Param 1 (required)
1. success or ok - 200 http status
2. unauthorized - 401 http status
3. exception - 500 http status

### Param 2 (optional)
string - the return message, use empty quote if message is not available

### Param 3 (required)
array - data array