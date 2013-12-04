<?php

namespace Ticketing;

use Doctrine\ORM\EntityRepository;

interface RowRepositoryInterface
{
    public function getFullRow($id);
    public function save($row);
}

class RowRepository extends EntityRepository implements RowRepositoryInterface
{
    public function getFullRow($id)
    {
        $dql = "SELECT r, ro, s FROM Ticketing\\Row r
            INNER JOIN r.room ro
            INNER JOIN r.seats s
                 WHERE r.id = ?1";
        $row = $this->getEntityManager()
            ->createQuery($dql)
            ->setParameter(1, 5)
            ->getSingleResult();
        return $row;
    }

    public function save($row)
    {
        $this->getEntityManager()->persist($row);
        $this->getEntityManager()->flush();
    }
}
