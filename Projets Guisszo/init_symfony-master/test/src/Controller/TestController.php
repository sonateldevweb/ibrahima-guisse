<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Employe;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Service;
use App\Repository\EmployeRepository;

class TestController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index()
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
    /**
     * @Route("/ajouter", name="ajouter")
     * @Route("/{id}/modifier", name="modif_Emp")
     */
    public function formulaire(Employe $employe = null,Request $req,ObjectManager $manager){
        
        if(!$employe){
            $employe=new Employe();
        }
        
        $form= $this->createFormBuilder($employe)
                    ->add('matricule')
                    ->add('nom_complet')
                    ->add('datenais',DateType::class,[
                        'widget'=> "single_text",
                        'format' => "yyyy-MM-dd"
                    ])
                    ->add('salaire')
                    ->add('services',EntityType::class,[
                        'class' => Service::class,'choice_label'=> "libelle"
                    ])
                    ->getForm(); 
                    $form->handleRequest($req);

                if ($form->isSubmitted() && $form->isValid()) {
                    
                    $manager->persist($employe);
                    $manager->flush();

                    return $this->redirectToRoute('lister');
                }
        return $this->render('test/ajouter.html.twig',[
            'formEmploye'=> $form->createView(),
            'editMode' => $employe->getId() !== null
        ]);
        
    }
    /**
     * @Route("/lister", name="lister")
     */
    public function lister(EmployeRepository $repo){
        
        $employes=$repo->findAll();
        
        return $this->render('test/lister.html.twig',[
            'controller_name' =>'TestController',
            'employes' => $employes
        ]);
    }

/**
 * @Route("lister/{id}", name="supprimer")
 */
    public function supprimer(Employe $employe){
        
        $element = $this->getDoctrine()->getManager();
                    $element->remove($employe);
                    $element->flush();

                    return $this->redirectToRoute('lister');

                    
    }
}
