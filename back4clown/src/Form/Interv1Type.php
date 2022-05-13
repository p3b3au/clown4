<?php

namespace App\Form;

use App\Entity\Clown;
use App\Entity\Interv;
use App\Entity\Lieu;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class Interv1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateheure', DateType::class, [
                "years" => range(1950, 2050)
            ])
            ->add('statut')
            ->add('clownA', EntityType::class, [
                'class' => Clown::class,
                'choice_label' => function ($clown) {
                    return $clown->getPseudo();
                },
                'label' => 'clown'

            ])
            ->add('clownB', EntityType::class, [
                'class' => Clown::class,
                'choice_label' => function ($clown) {
                    return $clown->getPseudo();
                },
                'label' => 'clown'

            ])
            ->add('lieu', EntityType::class, [
                'class' => Lieu::class,
                'choice_label' => function ($lieu) {
                    return $lieu->getLieu();
                },
                'label' => 'Lieu'

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Interv::class,
        ]);
    }
}
