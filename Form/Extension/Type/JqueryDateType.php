<?php

namespace FrequenceWeb\Bundle\FormExtensionBundle\Form\Extension\Type;

use Symfony\Component\Form\Extension\Core\Type\DateType,
    Symfony\Component\Form\FormInterface,
    Symfony\Component\Form\FormBuilder,
    Symfony\Component\Form\FormView;

class JqueryDateType extends DateType
{
    protected $jQueryOptions;

    public function buildForm(FormBuilder $builder, array $options)
    {
        $options['widget'] = 'single_text';
        $options['days']   = range(1, 31);
        $this->jQueryOptions = $options['jquery_options'];

        parent::buildForm($builder, $options);
    }

    public function buildView(FormView $view, FormInterface $form)
    {
        $view->set('jquery_options', $this->jQueryOptions);
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'fw_jquery_date';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'years'          => range(date('Y') - 5, date('Y') + 5),
            'months'         => range(1, 12),
            'days'           => range(1, 31),
            'widget'         => 'choice',
            'input'          => 'datetime',
            'format'         => \IntlDateFormatter::MEDIUM,
            'data_timezone'  => null,
            'user_timezone'  => null,
            'empty_value'    => null,
            // Don't modify \DateTime classes by reference, we treat
            // them like immutable value objects
            'by_reference'   => false,
            'error_bubbling' => false,
            // If initialized with a \DateTime object, FieldType initializes
            // this option to "\DateTime". Since the internal, normalized
            // representation is not \DateTime, but an array, we need to unset
            // this option.
            'data_class'     => null,
            'jquery_options' => array(),
        );
    }
}
