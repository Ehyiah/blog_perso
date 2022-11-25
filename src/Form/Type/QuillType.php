<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuillType extends AbstractType
{
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['attr']['class'] = trim(($view->vars['attr']['class'] ?? '').' quill');
        $view->vars['attr']['quill_options'] = json_encode($options['quill_options']);
//        $view->vars['attr']['quill_options'] = json_encode($options['quill_options'], JSON_FORCE_OBJECT);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'quill_options' => [
                'bold',
                ['italic', 'underline']
            ],
            'label' => false,
            'error_bubbling' => true,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'quill';
    }
}
