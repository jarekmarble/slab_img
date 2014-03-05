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

    public function getSlab($id)
    {
        $id = (int)$id;
        $rowSet = $this->tableGateway->select(array('Id' => $id));
        $row = $rowSet->current();
        if (!$row)
        {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function getSlabBySlabId($slabId)
    {
        // TODO: add unique constraint on DB
        $slabId = (int)$slabId;
        $rowSet = $this->tableGateway->select(array('SlabId' => $slabId));
        $row = $rowSet->current();
        if (!$row) {
            throw new \Exception("Could not find row $slabId");
        }
        return $row;
    }
} 