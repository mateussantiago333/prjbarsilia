<?php

namespace Ens\JobeetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class EventoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nome_evento');
        $builder->add('img_evento');
        $builder->add('data_evento',DateTimeType::class, array(
        'placeholder' => array(
        'year' => 'Ano', 'month' => 'Mês', 'day' => 'Dia',
        'hour' => 'Hora', 'minute' => 'Minuto')
        ));
        $builder->add('descricao_evento');
        $builder->add('estabelecimentos',EntityType::class, array(
            'class' => 'EnsJobeetBundle:Estabelecimento',
            'choice_label' => 'nome_estabelecimento'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ens\JobeetBundle\Entity\Evento'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ens_jobeetbundle_evento';
    }


}
