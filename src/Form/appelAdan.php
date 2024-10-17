<?php
namespace App\Form;

use App\Entity\Muezzin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class adanAudioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('audioFile', FileType::class, [
                'label' => 'Audio File (MP3, WAV)',
                'required' => false, // Vous pouvez rendre le fichier optionnel si nécessaire
                'mapped' => false, // Ne mappez pas directement au champ 'audio', VichUploader s'en occupe
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Muezzin::class,
        ]);
    }
}
