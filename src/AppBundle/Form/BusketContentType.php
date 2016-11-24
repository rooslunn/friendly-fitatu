<?php

namespace AppBundle\Form;

use AppBundle\AppBundle;
use AppBundle\Entity\Product;
use AppBundle\Entity\VatType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\{
    SubmitType,
    ChoiceType
};

class BusketContentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('product', ChoiceType::class, [
                'choices' => $options['products'],
                'choice_label' => function ($value, $key, $index) {
                    /** @var Product $value */
                    return sprintf('%s (%s)', $value->getName(), money_format('%i', $value->getPrice()));
                },
                'choice_value' => 'price',
                'expanded' => false,
                'multiple' => false,
            ])
            ->add('vatType', ChoiceType::class, [
                'choices' => $options['vat_types'],
                'choice_label' => function ($value, $key, $index) {
                    /** @var VatType $value */
                    return sprintf('%s (%s %%)', $value->getName(), number_format($value->getValue()*100, 2));
                },
                'choice_value' => 'value',
                'expanded' => false,
                'multiple' => false,
            ])
            ->add('qty')
            ->add('save', SubmitType::class, [
                'label' => 'Add Item',
                'attr' => ['class' => 'btn-primary']
            ]);
    }

    /**
     * {@inheritdoc}
     * @throws \Symfony\Component\OptionsResolver\Exception\AccessException
     * @throws \Symfony\Component\OptionsResolver\Exception\UndefinedOptionsException
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\BusketContent'
        ));

        $resolver->setDefault('products', null)
            ->setRequired('products')
            ->setAllowedTypes('products', ['array']);

        $resolver->setDefault('vat_types', null)
            ->setRequired('vat_types')
            ->setAllowedTypes('vat_types', ['array']);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_busketcontent';
    }


}
