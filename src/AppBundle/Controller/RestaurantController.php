<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 18/01/17
 * Time: 13:08
 */

namespace AppBundle\Controller;

use Ivory\GoogleMap\Map;
use Ivory\GoogleMapBundle\Entity\Marker;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ivory\GoogleMap\Base\Bound;
use Ivory\GoogleMap\Base\Coordinate;
use AppBundle\Entity\Restaurant;

class RestaurantController extends Controller
{
    public function listAction(){
        $em = $this->getDoctrine()->getManager();
        $restaurants = $em->getRepository('AppBundle:Restaurant')->findAll();

        $map = new Map();

        $map->setAutoZoom(true);

        foreach ($restaurants as $restaurant){
            $marker = new Marker();
            $position = $marker->getPosition();
            $latitude = $restaurant->getLatitude();
            $longitude = $restaurant->getLongitude();
            $position->setLatitude($latitude);
            $position->setLongitude($longitude);
            $map->addMarker($marker);
        };

        return $this->render('app/restaurant/restaurants.html.twig', array(
            'restaurants' => $restaurants,
            //'marqueurs' => $data_points,
            'map' => $map,

        ));
    }

    public function showAction(Restaurant $restaurant){
        return $this->render('app/main/index.html.twig');
    }
}