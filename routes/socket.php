<?php
use App\Http\Sockets\MyClass;
$socket->route('/', new MyClass  , ['*']);