<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Baptism;
use AppBundle\Entity\BaptismHasUser;
use UserBundle\Entity\User;

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

    /**
     * This function finds out if user is already participating to the baptism.
     * If he is, it checks his role and sets $user["role"] to :
     *     -"baptised" if true
     *     -"guest" if false
     * Else, it sets ûserRole to "none"
     *
     * @param Baptism $baptism
     * @param User $user
     * @return string
     */
    public function findIfUserIsParticipating(Baptism $baptism, User $user){

        $result = $this
            ->createQueryBuilder('bhu')
            ->select('bhu')
            ->where('bhu.baptism = :baptism')
            ->andWhere('bhu.user = :user')
            ->setParameter('baptism', $baptism)
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();

        if(isset($result[0])){
            /** @var BaptismHasUser $baptismHasUser */
            $baptismHasUser = $result[0];
            if(true === $baptismHasUser->getRole()){
                $currentUser["role"] = 'baptised';
            }else{
                $currentUser["role"] = 'guest';
                $currentUser["baptismHasUser"] = $baptismHasUser;
            }
        }else{
            $currentUser["role"] = 'none';
        }

        return $currentUser;
    }

    public function findByUserAndRole(User $user, $role){
        $baptismsHasUser = $this->createQueryBuilder('bhu')
            ->select('bhu')
            ->where('bhu.user = :user')
            ->andWhere('bhu.role = :role')
            ->innerJoin('bhu.baptism', 'b')
            ->orderBy('b.date', 'DESC')
            ->setParameter('user', $user)
            ->setParameter('role', $role)
            ->getQuery()
            ->getResult();

        $results = array();
        $i = 0;

        /** @var BaptismHasUser $baptismHasUser */
        foreach ($baptismsHasUser as $baptismHasUser){
            $results[$i] = array(
                "baptismHasUser" => $baptismHasUser,
                "guestNumber" => $this->findHowManyGuest($baptismHasUser->getBaptism())
            );
            $i++;
        }

        return $results;
    }

    public function findGuestByBaptism(User $user){
        return $this->createQueryBuilder('bhu')
            ->select('bhu')
            ->where('bhu.baptism = :user')
            ->andWhere('bhu.role = 0')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
    }
    
}
