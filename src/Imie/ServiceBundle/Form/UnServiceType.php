<?php

namespace Imie\ServiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UnServiceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('email')
            ->add('preferences')
            ->add('createdAt', 'datetime', array('widget' => 'single_text'))
            ->add('categorie', 'entity', array(
              'class' => 'ImieServiceBundle:Categorie'
            ))
            ->add('save', 'submit')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Imie\ServiceBundle\Entity\UnService'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'imie_servicebundle_unservice';
    }
}
