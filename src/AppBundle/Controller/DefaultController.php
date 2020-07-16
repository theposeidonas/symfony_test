<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Doctrine\DBAL\Types\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $RAW_QUERY = 'SELECT * FROM product where id = 1;';

        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();

        $result = $statement->fetchAll();

        $defaultData = ['deger' => '20'];
        $form = $this->createFormBuilder($defaultData)
            ->add('deger', TextareaType::class)

            ->getForm();

        $form->handleRequest($request);


        if($form->isSubmitted()){
            $data= $form->getData();

            $query='UPDATE `product` SET `deger` = '.$data['deger'].' WHERE `product`.`id` = 1;';
            $statement = $em->getConnection()->prepare($query);
            $statement->execute();
            $RAW_QUERY = 'SELECT * FROM product where id = 1;';

            $statement = $em->getConnection()->prepare($RAW_QUERY);
            $statement->execute();

            $result = $statement->fetchAll();


        }
        return $this->render('default/index.html.twig', [
            'deger' => $result[0]['deger'],
        ]);

    }}

