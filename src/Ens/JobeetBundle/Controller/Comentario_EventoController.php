<?php

namespace Ens\JobeetBundle\Controller;

use Ens\JobeetBundle\Entity\Comentario_Evento;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Comentario_evento controller.
 *
 */
class Comentario_EventoController extends Controller
{
    /**
     * Lists all comentario_Evento entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $comentario_Eventos = $em->getRepository('EnsJobeetBundle:Comentario_Evento')->findAll();

        return $this->render('comentario_evento/index.html.twig', array(
            'comentario_Eventos' => $comentario_Eventos,
        ));
    }

    /**
     * Creates a new comentario_Evento entity.
     *
     */
    public function newAction(Request $request)
    {
        $comentario_Evento = new Comentario_evento();
        $form = $this->createForm('Ens\JobeetBundle\Form\Comentario_EventoType', $comentario_Evento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comentario_Evento);
            $em->flush();

            return $this->redirectToRoute('comentario_evento_show', array('id' => $comentario_Evento->getId()));
        }

        return $this->render('comentario_evento/new.html.twig', array(
            'comentario_Evento' => $comentario_Evento,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a comentario_Evento entity.
     *
     */
    public function showAction(Comentario_Evento $comentario_Evento)
    {
        $deleteForm = $this->createDeleteForm($comentario_Evento);

        return $this->render('comentario_evento/show.html.twig', array(
            'comentario_Evento' => $comentario_Evento,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing comentario_Evento entity.
     *
     */
    public function editAction(Request $request, Comentario_Evento $comentario_Evento)
    {
        $deleteForm = $this->createDeleteForm($comentario_Evento);
        $editForm = $this->createForm('Ens\JobeetBundle\Form\Comentario_EventoType', $comentario_Evento);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('comentario_evento_edit', array('id' => $comentario_Evento->getId()));
        }

        return $this->render('comentario_evento/edit.html.twig', array(
            'comentario_Evento' => $comentario_Evento,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a comentario_Evento entity.
     *
     */
    public function deleteAction(Request $request, Comentario_Evento $comentario_Evento)
    {
        $form = $this->createDeleteForm($comentario_Evento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($comentario_Evento);
            $em->flush();
        }

        return $this->redirectToRoute('comentario_evento_index');
    }

    /**
     * Creates a form to delete a comentario_Evento entity.
     *
     * @param Comentario_Evento $comentario_Evento The comentario_Evento entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Comentario_Evento $comentario_Evento)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comentario_evento_delete', array('id' => $comentario_Evento->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}