<?php

namespace Ens\JobeetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EstabelecimentoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nome_estabelecimento',null,array('label' => 'Nome do estabelecimento:'));
        $builder->add('tipo_estabelecimento', ChoiceType::class, array('label' => 'Tipo do estabelecimento:',
        'choices'  => array(
        'Bar' => 'Bar',
        'Restaurante' => 'Restaurante',
        'Boteco' => 'Boteco',
        'Boate' => 'Boate',
        'Chopperia' => 'Chopperia',
        'Casa de shows' => 'Casa de shows'
    ),
    ));
        $builder->add('endereco',null,array('label' => 'Endereço:'));
        $builder->add('cidade', ChoiceType::class, array(
        'choices'  => array(
        'Asa Norte' => 'Asa Norte',
        'Asa Sul' => 'Asa Sul',
        'Gama' => 'Gama',
        'Taguatinga' => 'Taguatinga',
        'Brazlândia' => 'Brazlândia',
        'Sobradinho' => 'Sobradinho',
        'Planaltina' => 'Planaltina',
        'Paranoá' => 'Paranoá',
        'Núcleo Bandeirante' => 'Núcleo Bandeirante',
        'Cruzeiro' => 'Cruzeiro',
        'Guará' => 'Guará',
        'Lago Sul' => 'Lago Sul',
        'Lago Norte' => 'Lago Norte', 
        'Águas Claras' => 'Águas Claras',
        'Park Way' => 'Park Way',
        'Samambaia' => 'Samambaia',
        'Ceilândia' => 'Ceilândia',

    ),));
        $builder->add('email');
        $builder->add('cnpj');
        $builder->add('telefone');
        $builder->add('url_img',null,array('label' => 'URL da Imagem do estabelecimento:',
                                           'attr' => array('placeholder' => 'Exemplo: http://i.imgur.com/minhaimagem.png',)));
        $builder->add('descricao',null,array('label' => 'Descrição:',));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ens\JobeetBundle\Entity\Estabelecimento'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ens_jobeetbundle_estabelecimento';
    }


}
