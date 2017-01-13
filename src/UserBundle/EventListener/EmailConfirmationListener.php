<?php

namespace UserBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use UserBundle\Controller;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Cocur\Slugify\Slugify;

class EmailConfirmationListener extends Controller\UserController implements EventSubscriberInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess',
        );
    }

    public function onRegistrationSuccess(FormEvent $event)
    {
        /** @var $user \FOS\UserBundle\Model\UserInterface */
        $user = $event->getForm()->getData();
        $id = $this->userIdAction();
        $slugify = new Slugify();
        $slugify = $slugify->slugify($id.'.'.$user->getFirstName().'.'.$user->getLastName());
        $user->setSlug($slugify);

    }
}