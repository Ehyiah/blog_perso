<?php

namespace App\Form;

use App\DTO\Fields\BlockQuoteField;
use App\DTO\Fields\BoldField;
use App\DTO\Fields\ItalicField;
use App\DTO\QuillGroup;
use App\Entity\Post;
use App\Form\Type\QuillType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('content')
            ->add('quill', QuillType::class, [
                'mapped' => false,
                'quill_options' => [
                    QuillGroup::build(
                        new BoldField(),
                        new ItalicField(),
                    ),
                    QuillGroup::build(
                        new BlockQuoteField(),
                    )
                ],
//                'quill_options' => [
//                    'bold', 'babar',
//                    ['italic', 'underline']
//                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
