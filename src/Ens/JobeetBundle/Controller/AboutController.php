<?php
namespace Ens\JobeetBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Ens\JobeetBundle\Entity\Comentario;
use Ens\JobeetBundle\Entity\Estabelecimento;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Collections\ArrayCollection;


class AboutController extends Controller
{

    public function indexAction()
    {
		return $this->render('about/about.html.twig'
        ));
    }
}
