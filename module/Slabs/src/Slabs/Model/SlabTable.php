<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/5/14
 * Time: 12:05 PM
 */

namespace Slabs\Model;


use Zend\Db\TableGateway\TableGateway;

class SlabTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();

        // required by paginator
        $resultSet->buffer();
        $resultSet->next();

        return $resultSet;
    }
} 