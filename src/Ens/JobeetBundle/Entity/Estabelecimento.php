<?php

namespace Ens\JobeetBundle\Entity;

/**
 * Estabelecimento
 */
class Estabelecimento
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nome_estabelecimento;

    /**
     * @var string
     */
    private $cidade;

    /**
     * @var string
     */
    private $tipo_estabelecimento;

    /**
     * @var string
     */
    private $endereco;

    /**
     * @var integer
     */
    private $dono;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $cnpj;

    /**
     * @var string
     */
    private $telefone;

    /**
     * @var string
     */
    private $url_img;

    /**
     * @var string
     */
    private $senha;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $comentario;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comentario = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nomeEstabelecimento
     *
     * @param string $nomeEstabelecimento
     *
     * @return Estabelecimento
     */
    public function setNomeEstabelecimento($nomeEstabelecimento)
    {
        $this->nome_estabelecimento = $nomeEstabelecimento;

        return $this;
    }

    /**
     * Get nomeEstabelecimento
     *
     * @return string
     */
    public function getNomeEstabelecimento()
    {
        return $this->nome_estabelecimento;
    }

    /**
     * Set cidade
     *
     * @param string $cidade
     *
     * @return Estabelecimento
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get cidade
     *
     * @return string
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set tipoEstabelecimento
     *
     * @param string $tipoEstabelecimento
     *
     * @return Estabelecimento
     */
    public function setTipoEstabelecimento($tipoEstabelecimento)
    {
        $this->tipo_estabelecimento = $tipoEstabelecimento;

        return $this;
    }

    /**
     * Get tipoEstabelecimento
     *
     * @return string
     */
    public function getTipoEstabelecimento()
    {
        return $this->tipo_estabelecimento;
    }

    /**
     * Set endereco
     *
     * @param string $endereco
     *
     * @return Estabelecimento
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get endereco
     *
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set dono
     *
     * @param integer $dono
     *
     * @return Estabelecimento
     */
    public function setDono($dono)
    {
        $this->dono = $dono;

        return $this;
    }

    /**
     * Get dono
     *
     * @return integer
     */
    public function getDono()
    {
        return $this->dono;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Estabelecimento
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
     * Set cnpj
     *
     * @param string $cnpj
     *
     * @return Estabelecimento
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    /**
     * Get cnpj
     *
     * @return string
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * Set telefone
     *
     * @param string $telefone
     *
     * @return Estabelecimento
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get telefone
     *
     * @return string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set urlImg
     *
     * @param string $urlImg
     *
     * @return Estabelecimento
     */
    public function setUrlImg($urlImg)
    {
        $this->url_img = $urlImg;

        return $this;
    }

    /**
     * Get urlImg
     *
     * @return string
     */
    public function getUrlImg()
    {
        return $this->url_img;
    }

    /**
     * Set senha
     *
     * @param string $senha
     *
     * @return Estabelecimento
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get senha
     *
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     *
     * @return Estabelecimento
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Add comentario
     *
     * @param \Ens\JobeetBundle\Entity\Comentario $comentario
     *
     * @return Estabelecimento
     */
    public function addComentario(\Ens\JobeetBundle\Entity\Comentario $comentario)
    {
        $this->comentario[] = $comentario;

        return $this;
    }

    /**
     * Remove comentario
     *
     * @param \Ens\JobeetBundle\Entity\Comentario $comentario
     */
    public function removeComentario(\Ens\JobeetBundle\Entity\Comentario $comentario)
    {
        $this->comentario->removeElement($comentario);
    }

    /**
     * Get comentario
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComentario()
    {
        return $this->comentario;
    }
}

