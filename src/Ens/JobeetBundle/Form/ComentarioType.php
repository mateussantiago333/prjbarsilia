<?php

namespace Ens\JobeetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use StarRatingBundle\Form\RatingType;

class ComentarioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('autor');
        /*$builder->add('nota',ChoiceType::class,
            array('label' => 'Field Label','attr' => array('class' => 'stars'),'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5'),
            'choices_as_values' => true,'multiple'=>false,'expanded'=>true));*/
        $builder->add('nota', RatingType::class, [
    	    'label' => 'Nota'
        ]);
        $builder->add('email');
        $builder->add('texto_comentario');
        /*$builder->add('estabelecimentos',HiddenType::class);*/
        /*$builder->add('estabelecimentos',EntityType::class, array(
            'class' => 'EnsJobeetBundle:Estabelecimento',
            'choice_label' => 'nome_estabelecimento'));*/
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ens\JobeetBundle\Entity\Comentario'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ens_jobeetbundle_comentario';
    }


}
