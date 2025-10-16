<?php

namespace App\Form;

use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('content', TextareaType::class, [
                'attr' => [
                    'rows' => 10,
                ]
            ])
            ->add('image', FileType::class, [
                'mapped' => false,
                'attr' => [
                    'accept' => 'image/*',
                ],
                'constraints' => [ new File([
                    'maxSize' => '10000k',
                    'mimeTypes' => [
                        'image/png',
                        'image/jpeg',
                        'image/jpg',
                        'image/bmp',
                        'image/webp',
                    ]
                ])]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
