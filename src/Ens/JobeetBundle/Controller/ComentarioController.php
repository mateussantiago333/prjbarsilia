<?php

namespace Ens\JobeetBundle\Controller;

use Ens\JobeetBundle\Entity\Comentario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Comentario controller.
 *
 */
class ComentarioController extends Controller
{
    /**
     * Lists all comentario entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $comentarios = $em->getRepository('EnsJobeetBundle:Comentario')->findAll();

        return $this->render('comentario/index.html.twig', array(
            'comentarios' => $comentarios,
        ));
    }

    /**
     * Creates a new comentario entity.
     *
     */
    public function newAction(Request $request)
    {
        $comentario = new Comentario();
        $form = $this->createForm('Ens\JobeetBundle\Form\ComentarioType', $comentario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comentario);
            $em->flush();

            return $this->redirectToRoute('comentario_show', array('id' => $comentario->getId()));
        }

        return $this->render('comentario/new.html.twig', array(
            'comentario' => $comentario,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a comentario entity.
     *
     */
    public function showAction(Comentario $comentario)
    {
        $deleteForm = $this->createDeleteForm($comentario);

        return $this->render('comentario/show.html.twig', array(
            'comentario' => $comentario,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing comentario entity.
     *
     */
    public function editAction(Request $request, Comentario $comentario)
    {
        $deleteForm = $this->createDeleteForm($comentario);
        $editForm = $this->createForm('Ens\JobeetBundle\Form\ComentarioType', $comentario);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('comentario_edit', array('id' => $comentario->getId()));
        }

        return $this->render('comentario/edit.html.twig', array(
            'comentario' => $comentario,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a comentario entity.
     *
     */
    public function deleteAction(Request $request, Comentario $comentario)
    {
        $form = $this->createDeleteForm($comentario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($comentario);
            $em->flush();
        }

        return $this->redirectToRoute('comentario_index');
    }

    /**
     * Creates a form to delete a comentario entity.
     *
     * @param Comentario $comentario The comentario entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Comentario $comentario)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comentario_delete', array('id' => $comentario->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
