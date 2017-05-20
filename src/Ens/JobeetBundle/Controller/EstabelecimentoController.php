<?php

namespace Ens\JobeetBundle\Controller;
use Ens\JobeetBundle\Entity\Comentario;
use Ens\JobeetBundle\Entity\Estabelecimento;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Estabelecimento controller.
 *
 */
class EstabelecimentoController extends Controller
{
    /**
     * Lists all estabelecimento entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $estabelecimentos = $em->getRepository('EnsJobeetBundle:Estabelecimento')->findAll();

        return $this->render('estabelecimento/index.html.twig', array(
            'estabelecimentos' => $estabelecimentos,
        ));
    }

    /**
     * Creates a new estabelecimento entity.
     *
     */
    public function newAction(Request $request)
    {
        $estabelecimento = new Estabelecimento();
        $form = $this->createForm('Ens\JobeetBundle\Form\EstabelecimentoType', $estabelecimento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($estabelecimento);
            $em->flush();

            return $this->redirectToRoute('estabelecimento_show', array('id' => $estabelecimento->getId()));
        }

        return $this->render('estabelecimento/new.html.twig', array(
            'estabelecimento' => $estabelecimento,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a estabelecimento entity.
     *
     */
    public function showAction(Request $request,Estabelecimento $estabelecimento)
    {
        $deleteForm = $this->createDeleteForm($estabelecimento);

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT round (AVG(c.nota)::DECIMAL, 2)::TEXT FROM EnsJobeetBundle:Comentario c
            JOIN c.estabelecimentos e
            WHERE e.id = :id'
        )->setParameter('id', $estabelecimento->getId());

        $media = $query->setMaxResults(1)->getOneOrNullResult();
        $first_value = reset($media);

        $comentario = new Comentario();
        $form = $this->createForm('Ens\JobeetBundle\Form\ComentarioType', $comentario);
        $comentario->setEstabelecimentos($estabelecimento);
        //$form->get('estabelecimentos')->setData($estabelecimento->getId());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comentario);
            $em->flush();

            return $this->redirectToRoute('estabelecimento_show', array('id' => $estabelecimento->getId()));
        }

        return $this->render('estabelecimento/show.html.twig', array(
            'estabelecimento' => $estabelecimento,
            'comentario' => $comentario,
            'media' => $first_value,
            'form' => $form->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing estabelecimento entity.
     *
     */
    public function editAction(Request $request, Estabelecimento $estabelecimento)
    {
        $deleteForm = $this->createDeleteForm($estabelecimento);
        $editForm = $this->createForm('Ens\JobeetBundle\Form\EstabelecimentoType', $estabelecimento);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('estabelecimento_edit', array('id' => $estabelecimento->getId()));
        }

        return $this->render('estabelecimento/edit.html.twig', array(
            'estabelecimento' => $estabelecimento,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a estabelecimento entity.
     *
     */
    public function deleteAction(Request $request, Estabelecimento $estabelecimento)
    {
        $form = $this->createDeleteForm($estabelecimento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($estabelecimento);
            $em->flush();
        }

        return $this->redirectToRoute('estabelecimento_index');
    }

    /**
     * Creates a form to delete a estabelecimento entity.
     *
     * @param Estabelecimento $estabelecimento The estabelecimento entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Estabelecimento $estabelecimento)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('estabelecimento_delete', array('id' => $estabelecimento->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

