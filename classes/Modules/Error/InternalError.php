<?php
/*
Copyright 2015 Lcf.vs
 -
Released under the MIT license
 -
https://github.com/Lcfvs/DOMArch
*/
namespace Modules\Error;

use StdClass;

use Lib\Config;
use Lib\Controller;

class InternalError
    extends Controller
{
    public function get(
        string $message,
        string $file,
        int $line,
        array $context,
        array $traces
    )
    {
        $view = $this->_view;

        $error = new StdClass();
        $error->message = 'Internal error';

        $this->_view->init('messages', [$error]);

        if (!Config::global()->get('context')->get('isDevMode')) {
            error_log("Error
@$file:$line
$message
---
");
            return;
        }

        $view
            ->set('message', $message)
            ->set('file', $file . ':' . $line)
            ->set('traces', $traces);
    }
}
