<?php

namespace Ens\JobeetBundle\Entity;

/**
 * Comentario_Evento
 */
class Comentario_Evento
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $autor;

    /**
     * @var integer
     */
    private $nota;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $texto_comentario;

    /**
     * @var \Ens\JobeetBundle\Entity\Evento
     */
    private $eventos;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set autor
     *
     * @param string $autor
     *
     * @return Comentario_Evento
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get autor
     *
     * @return string
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set nota
     *
     * @param integer $nota
     *
     * @return Comentario_Evento
     */
    public function setNota($nota)
    {
        $this->nota = $nota;

        return $this;
    }

    /**
     * Get nota
     *
     * @return integer
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Comentario_Evento
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set textoComentario
     *
     * @param string $textoComentario
     *
     * @return Comentario_Evento
     */
    public function setTextoComentario($textoComentario)
    {
        $this->texto_comentario = $textoComentario;

        return $this;
    }

    /**
     * Get textoComentario
     *
     * @return string
     */
    public function getTextoComentario()
    {
        return $this->texto_comentario;
    }

    /**
     * Set eventos
     *
     * @param \Ens\JobeetBundle\Entity\Evento $eventos
     *
     * @return Comentario_Evento
     */
    public function setEventos(\Ens\JobeetBundle\Entity\Evento $eventos = null)
    {
        $this->eventos = $eventos;

        return $this;
    }

    /**
     * Get eventos
     *
     * @return \Ens\JobeetBundle\Entity\Evento
     */
    public function getEventos()
    {
        return $this->eventos;
    }
}
