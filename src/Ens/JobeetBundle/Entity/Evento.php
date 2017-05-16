<?php

namespace Ens\JobeetBundle\Entity;

/**
 * Evento
 */
class Evento
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nome_evento;

    /**
     * @var string
     */
    private $img_evento;

    /**
     * @var \DateTime
     */
    private $data_evento;

    /**
     * @var string
     */
    private $descricao_evento;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $comentario_evento;

    /**
     * @var \Ens\JobeetBundle\Entity\Estabelecimento
     */
    private $estabelecimentos;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comentario_evento = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set nomeEvento
     *
     * @param string $nomeEvento
     *
     * @return Evento
     */
    public function setNomeEvento($nomeEvento)
    {
        $this->nome_evento = $nomeEvento;

        return $this;
    }

    /**
     * Get nomeEvento
     *
     * @return string
     */
    public function getNomeEvento()
    {
        return $this->nome_evento;
    }

    /**
     * Set imgEvento
     *
     * @param string $imgEvento
     *
     * @return Evento
     */
    public function setImgEvento($imgEvento)
    {
        $this->img_evento = $imgEvento;

        return $this;
    }

    /**
     * Get imgEvento
     *
     * @return string
     */
    public function getImgEvento()
    {
        return $this->img_evento;
    }

    /**
     * Set dataEvento
     *
     * @param \DateTime $dataEvento
     *
     * @return Evento
     */
    public function setDataEvento($dataEvento)
    {
        $this->data_evento = $dataEvento;

        return $this;
    }

    /**
     * Get dataEvento
     *
     * @return \DateTime
     */
    public function getDataEvento()
    {
        return $this->data_evento;
    }

    /**
     * Set descricaoEvento
     *
     * @param string $descricaoEvento
     *
     * @return Evento
     */
    public function setDescricaoEvento($descricaoEvento)
    {
        $this->descricao_evento = $descricaoEvento;

        return $this;
    }

    /**
     * Get descricaoEvento
     *
     * @return string
     */
    public function getDescricaoEvento()
    {
        return $this->descricao_evento;
    }

    /**
     * Add comentarioEvento
     *
     * @param \Ens\JobeetBundle\Entity\Comentario_Evento $comentarioEvento
     *
     * @return Evento
     */
    public function addComentarioEvento(\Ens\JobeetBundle\Entity\Comentario_Evento $comentarioEvento)
    {
        $this->comentario_evento[] = $comentarioEvento;

        return $this;
    }

    /**
     * Remove comentarioEvento
     *
     * @param \Ens\JobeetBundle\Entity\Comentario_Evento $comentarioEvento
     */
    public function removeComentarioEvento(\Ens\JobeetBundle\Entity\Comentario_Evento $comentarioEvento)
    {
        $this->comentario_evento->removeElement($comentarioEvento);
    }

    /**
     * Get comentarioEvento
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComentarioEvento()
    {
        return $this->comentario_evento;
    }

    /**
     * Set estabelecimentos
     *
     * @param \Ens\JobeetBundle\Entity\Estabelecimento $estabelecimentos
     *
     * @return Evento
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
