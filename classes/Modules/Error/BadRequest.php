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
use Lib\Controller;

class BadRequest
    extends Controller
{
    public function get()
    {
        $error = new StdClass();
        $error->message = 'Bad request';

        $this->_view->init('messages', [$error]);
    }
}
