<?php
namespace App\Form;

use App\Entity\QranAudio;
use App\Entity\Quari;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QranAudioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('sourate', TextType::class)
            ->add('audioFile', FileType::class, [
                'label' => 'Audio File (MP3, WAV)',
                'required' => false, // Vous pouvez rendre le fichier optionnel si nécessaire
                'mapped' => false, // Ne mappez pas directement au champ 'audio', VichUploader s'en occupe
            ]);
            // ->add('numero', IntegerType::class)
            // ->add('qari', EntityType::class, [
            //     'class' => Quari::class,
            //     'choice_label' => 'nom', // Assurez-vous que Quari a une méthode getNom()
            // ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => QranAudio::class,
        ]);
    }
}
