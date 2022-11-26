<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuillType extends AbstractType
{
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
//        $view->vars['attr']['class'] = trim(($view->vars['attr']['class'] ?? '').' quill');
        $view->vars['attr']['quill_options'] = json_encode($options['quill_options']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'sanitize_html' => true,
            'quill_options' => ['bold', 'italic'],
            'label' => false,
            'error_bubbling' => true,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'quill';
    }

    public function getParent(): string
    {
        return TextareaType::class;
    }
}
