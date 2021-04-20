<?php

namespace App\Form;

use App\Entity\Autori;
use App\Entity\Gradja;
use App\Entity\Zanrovi;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GradjaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ISBN', TextType::class,[
                'required' => false,
                'label' => 'ISBN'
            ])
            ->add('naslov')
            //->add('oibKnjiznice') //TODO
            ->add('fotografija', FileType::class, [ //TODO
                'required' => false,
            ])
            ->add('opis',TextType::class, [
                'required' => false,
            ])
            ->add('datumDodavanja', DateType::class, [
                'data' => new \DateTime("now")
            ])
            ->add('godinaIzdanja', DateType::class, [
                    'required' => false,
                ])
            ->add('jezik',TextType::class, [
                'required' => false,
            ])
            ->add('brojInventara', NumberType::class)
            ->add('autori', EntityType::class, [
                'multiple' => true,
                'class' => Autori::class,
            ])
            ->add('status')
            ->add('zanrovi', EntityType::class, [
                'multiple' => true,
                'class' => Zanrovi::class,
            ])
           // ->add('knjiznicaVlasnik')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Gradja::class,
        ]);
    }
}