<?php
/*
Copyright 2015 Lcf.vs
 -
Released under the MIT license
 -
https://github.com/Lcfvs/DOMArch
*/
namespace Modules\Error;

use Lib\Controller;

class Error
    extends Controller
{
    public function get(
        array $errors
    )
    {
        $this->_view->set('#schema', 'Error');
        $this->_view->init('messages', $errors);
    }
}
