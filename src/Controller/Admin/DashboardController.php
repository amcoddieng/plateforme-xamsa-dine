<?php

namespace App\Controller\Admin;
use App\Entity\Compte;
use App\Entity\Coran;
use App\Entity\CoranAudio;
use App\Entity\Event;
use App\Entity\Moderateur;
use App\Entity\HorairePriere;
use App\Entity\Quari;
use App\Entity\Doua;
use App\Entity\Muezzin;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(UsersCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<h4>Xamsa Dine : Espace Admin</h4>');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('utilisateur', 'fa-solid fa-users', Compte::class);
        yield MenuItem::linkToCrud('Moderateur', 'fa-solid fa-user-tie', Moderateur::class);
        yield MenuItem::linkToCrud('coran', 'fa-solid fa-book-quran', Coran::class);
        yield MenuItem::linkToCrud('coran en audio', 'fa-solid fa-play', CoranAudio::class);
        yield MenuItem::linkToCrud('Quari', 'fa-solid fa-microphone', Quari::class);
        yield MenuItem::linkToCrud('Doua', 'fa-solid fa-hands-holding', Doua::class);
        yield MenuItem::linkToCrud('Evennements', 'fa-solid fa-calendar-days', Event::class);
        yield MenuItem::linkToCrud('Horaire', 'fa-sharp fa-solid fa-clock', HorairePriere::class);
        yield MenuItem::linkToCrud('Muezzin', 'fa-sharp fa-solid fa-mosque', Muezzin::class);
    }
}
