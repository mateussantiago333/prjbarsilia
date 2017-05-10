<?php

namespace Ens\JobeetBundle\Entity;

/**
 * Comentario
 */
class Comentario
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
     * @var \Ens\JobeetBundle\Entity\Estabelecimento
     */
    private $estabelecimentos;


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
     * @return Comentario
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
     * @return Comentario
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
     * @return Comentario
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
     * @return Comentario
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
     * Set estabelecimentos
     *
     * @param \Ens\JobeetBundle\Entity\Estabelecimento $estabelecimentos
     *
     * @return Comentario
     */
    public function setEstabelecimentos(\Ens\JobeetBundle\Entity\Estabelecimento $estabelecimentos = null)
    {
        $this->estabelecimentos = $estabelecimentos;

        return $this;
    }

    /**
     * Get estabelecimentos
     *
     * @return \Ens\JobeetBundle\Entity\Estabelecimento
     */
    public function getEstabelecimentos()
    {
        return $this->estabelecimentos;
    }
}
