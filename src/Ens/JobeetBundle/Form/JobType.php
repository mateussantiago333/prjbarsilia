<?php

namespace Ens\JobeetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('type');
        $builder->add('company');
        $builder->add('logo');
        $builder->add('url');
        $builder->add('position');
        $builder->add('location');
        $builder->add('description');
        $builder->add('how_to_apply');
        $builder->add('token');
        $builder->add('is_public');
        $builder->add('is_activated');
        $builder->add('email')
        $builder->add('expires_at');
        $builder->add('created_at');
        $builder->add('updated_at');
        $builder->add('category');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ens\JobeetBundle\Entity\Job'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ens_jobeetbundle_job';
    }

        public function getName()
    {
        return 'ens_jobeetbundle_jobtype';
    }


}
