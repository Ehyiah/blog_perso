<?php

namespace App\Form;

use App\DTO\Fields\BlockField\AlignField;
use App\DTO\Fields\BlockField\ColorField;
use App\DTO\Fields\BlockField\HeaderGroupField;
use App\DTO\Fields\BlockField\IndentField;
use App\DTO\Fields\InlineField\BoldInlineField;
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
//                    QuillGroup::build(
//                        new BoldField(),
//                        new ItalicField(),
//                        new HeaderField(HeaderField::HEADER_OPTION_2),
//                        new HeaderField(HeaderField::HEADER_OPTION_1),
//                    ),
//                    QuillGroup::build(
//                        new BlockQuoteField(),
//                        new HeaderField(HeaderField::HEADER_OPTION_1, HeaderField::HEADER_OPTION_2),
//                        new UnderlineField(),
//                        new StrikeField(),
//                        new CodeBlockField(),
//                        new ColorField('green', 'blue'),
//                    ),
                    QuillGroup::build(
//                        new BoldInlineField(),
//                        new ColorField('green', 'blue'),
//                        new HeaderField(HeaderField::HEADER_OPTION_2),
//                        new ColorField(),
//                        new HeaderGroupField(),
//                        new AlignField(AlignField::ALIGN_FIELD_OPTION_CENTER, AlignField::ALIGN_FIELD_OPTION_LEFT),
//                        new HeaderGroupField(HeaderGroupField::HEADER_OPTION_1, HeaderGroupField::HEADER_OPTION_2),
//                        new DirectionField(DirectionField::DIRECTION_FIELD_OPTION_RTL),
//                        new SizeField(SizeField::SIZE_FIELD_OPTION_NORMAL,SizeField::SIZE_FIELD_OPTION_LARGE, SizeField::SIZE_FIELD_OPTION_HUGE),
//                        new ScriptField(ScriptField::SCRIPT_FIELD_OPTION_SUB, ScriptField::SCRIPT_FIELD_OPTION_SUPER),
//                        new IndentField(IndentField::INDENT_FIELD_OPTION_MINUS),
//                        new IndentField(),
//                        new ListField(ListField::LIST_FIELD_OPTION_BULLET, ListField::LIST_FIELD_OPTION_ORDERED),
//                        new ListField(ListField::LIST_FIELD_OPTION_BULLET),
//                        new ListField(ListField::LIST_FIELD_OPTION_ORDERED),
                    ),
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
