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


class MainController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            ('SELECT 
            	e.id,e.nome_estabelecimento,AVG(c.nota) as nota_media,
            						   e.descricao, e.url_img,e.cidade
            	 FROM EnsJobeetBundle:Estabelecimento e 
            	 LEFT JOIN e.comentario c 
            	 GROUP BY e.id'))->setMaxResults(3);
        $estabelecimentos = $query->getResult();
    	shuffle($estabelecimentos);

		return $this->render('main/main.html.twig', array(
            'estabelecimentos' => $estabelecimentos,
        ));
    }
}
