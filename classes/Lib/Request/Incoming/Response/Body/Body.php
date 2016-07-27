<?php
namespace Lib\Request\Incoming\Response;

use DOMArch\View\JSON;
use Indoctrinated\Entity\Validator;

class Body
    extends JSON
{
    public function validationErrors(
        Validator $validator
    )
    {
        foreach ($validator->getErrors() as $error) {
            $this->error($error->field, $error->message);
        }
    }
}
