<?php

namespace Ens\JobeetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class EventoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nome_evento',null,array('label' => 'Digite o nome do evento que ocorrerá'));
        $builder->add('estabelecimentos',EntityType::class, array(
            'label' => 'Em qual estabelecimento ocorrerá?',
            'class' => 'EnsJobeetBundle:Estabelecimento',
            'choice_label' => 'nome_estabelecimento'));
        $builder->add('img_evento',null,array(
            'label' => 'URL da Imagem do evento:',
            'attr' => array(
            'placeholder' => 'Exemplo: http://i.imgur.com/vgxeAVf.png',)));
        $builder->add('data_evento',DateTimeType::class, array(
        'label' => 'Data em que ocorrerá o evento: ',
        'placeholder' => array(
        'year' => 'Ano', 'month' => 'Mês', 'day' => 'Dia',
        'hour' => 'Hora', 'minute' => 'Minuto'
    )
));;
        $builder->add('descricao_evento',null,array('label' => 'Descrição do evento'));
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
