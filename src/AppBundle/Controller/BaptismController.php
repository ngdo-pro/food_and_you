<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 08/01/17
 * Time: 20:30
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Baptism;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class BaptismController extends Controller
{

    public function selectAction(Request $request){
        // TODO: This is a fake function, need to be replaced with the real searchAction
        $form = $this->createFormBuilder()
            ->add("send", SubmitType::class)
            ->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted()){
            /** @var array $baptismParams contains the parameters of the selected baptism */
            $baptism = new Baptism();
            $baptism->setStatus("open");
            $baptism->setDate(new \DateTime("2017-01-20"));
            $baptism->setPlaces(2);
            $restaurant = $this->getDoctrine()->getManager()->getRepository("AppBundle:Restaurant")->find(1);
            $baptism->setRestaurant($restaurant);
            $service = $this->getDoctrine()->getManager()->getRepository("AppBundle:Service")->find(1);
            $baptism->setService($service);
            return $this->forward("AppBundle:Baptism:purchase", array("baptism" => $baptism));
        }

        return $this->render('app/baptism/select.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function purchaseAction(Request $request, Baptism $baptism)
    {
        $form = $this->createFormBuilder()
            ->add("send", SubmitType::class)
            ->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $this->getUser();
            var_dump($this->getUser());
            //$em->persist($baptism);
            //$em->flush();
        }

        return $this->render('app/baptism/purchase.html.twig', array(
            'baptism' => $baptism,
            'form' => $form->createView()
        ));
    }

}