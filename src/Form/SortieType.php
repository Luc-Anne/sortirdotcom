<?php

namespace App\Form;

use App\Entity\Utilisateur;
use App\Entity\Sortie;
use App\Entity\Lieu;
use App\Entity\Ville;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SortieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class)
            ->add('description', TextType::Class)
            //->add('organisateur', EntityType::Class,
            //    [
            //       'class' => Utilisateur::class,
            //        'choice_label' => 'username',
            //        'mapped'=> true,
            //        'multiple' => false,
            //    ])
            ->add('nbInscriptionMax', TextType::Class)
            ->add('adresse', EntityType::class,
                [
                    'class' => Lieu::class,
                    'label' => 'Lieux de sortie',
                    'choice_label' => 'nom',
                ])
            ->add('date_enregistrement', DateTimeType::class, [
                'date_widget' => 'single_text',
                'time_widget' => 'single_text'])
            ->add('date_ouverture_inscription', DateTimeType::class, [
                'date_widget' => 'single_text',
                'time_widget' => 'single_text'])
            ->add('date_fermeture_inscription', DateTimeType::class, [
                'date_widget' => 'single_text',
                'time_widget' => 'single_text'])
            ->add('isAnnulee')
            ->add('date_debut_sortie', DateTimeType::class, [
                'date_widget' => 'single_text',
                'time_widget' => 'single_text'])
            ->add('date_fin_sortie', DateTimeType::class, [
                'date_widget' => 'single_text',
                'time_widget' => 'single_text'])
            ->add('Enregistrer', Type\SubmitType::class, [
                'attr' => ['class' => 'save'],
            ])
            ->add('Publier',Type\SubmitType::class, [
                'attr' => ['class' => 'publish'],
            ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sortie::class,
        ]);
    }
}
