<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;


class Main extends Controller
{
    /**
     * @Route("/main/inicio")
     */
    public function indexAction()
    {
	return $this->render('pages/inicio.html.twig');
    }
}
