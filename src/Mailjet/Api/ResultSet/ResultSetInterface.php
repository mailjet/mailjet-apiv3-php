<?php
namespace Mailjet\Api\ResultSet;

use Countable;
use Traversable;

interface ResultSetInterface extends Traversable, Countable
{
    /**
     * Can be anything traversable|array
     * @abstract
     * @param $dataSource
     * @return mixed
     */
    public function initialize($dataSource);

    /**
     * Set the row object prototype
     *
     * @param  object                             $objectPrototype
     * @throws Exception\InvalidArgumentException
     * @return self
     */
    public function setObjectPrototype($objectPrototype);
}
