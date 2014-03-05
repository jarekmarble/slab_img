<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/5/14
 * Time: 12:04 PM
 */

namespace Slabs\Model;


use Zend\Stdlib\ArraySerializableInterface;

class Slab implements ArraySerializableInterface
{
    public $Id;
    public $SlabId;
    public $Container;


    /**
     * Exchange internal values from provided array
     *
     * @param  array $array
     * @return void
     */
    public function exchangeArray(array $array)
    {
        $this->Id = (isset($data['Id'])) ? $data['Id'] : null;
        $this->SlabId = (isset($data['SlabId'])) ? $data['SlabId'] : null;
        $this->Container = (isset($data['Container'])) ? $data['Container'] : null;
    }

    /**
     * Return an array representation of the object
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}