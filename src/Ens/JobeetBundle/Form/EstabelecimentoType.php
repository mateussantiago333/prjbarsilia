<?php

namespace Ens\JobeetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EstabelecimentoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nome_estabelecimento');
        $builder->add('cidade');
        $builder->add('tipo_estabelecimento');
        $builder->add('endereco');
        $builder->add('dono');
        $builder->add('email');
        $builder->add('cnpj');
        $builder->add('telefone');
        $builder->add('url_img');
        $builder->add('senha');
        $builder->add('descricao');
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
