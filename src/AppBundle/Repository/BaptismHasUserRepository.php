<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Baptism;

/**
 * BaptemHasUserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BaptismHasUserRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * this function finds out if there are other people on this baptism
     * allowing us to know if we have to remove baptism in database in case of
     * cancelled payment
     * For example :
     *     Baptism 1 already has 2 people who bought it, 1 place is left.
     *     When a new User will confirm his intention to buy it :
     *         - Baptism 1 will be updated with 0 places left.
     *         - Payment System will be launched
     *     If Payment is valid, Baptism 1 will be closed
     *     Else Places will be set back to 1 left.
     *
     * This function is here to be sure that someone else bought this baptism
     *
     * @param Baptism $baptism
     * @return array
     */
    public function findOtherByBaptism(Baptism $baptism){
        return $this->createQueryBuilder('bhu')
            ->select('COUNT(bhu.id)')
            ->where('bhu.baptism = :baptism')
            ->andWhere('bhu.role = 1')
            ->setParameter('baptism', $baptism)
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * This function count how many guests have already reserved a place at a baptism
     *
     * @param Baptism $baptism
     * @return integer
     */
    public function findHowManyGuest(Baptism $baptism){
        return $this->createQueryBuilder('bhu')
            ->select('SUM(bhu.guestCount) as guestCount')
            ->where('bhu.baptism = :baptism')
            ->setParameter('baptism', $baptism)
            ->getQuery()
            ->getSingleScalarResult();
    }
}
