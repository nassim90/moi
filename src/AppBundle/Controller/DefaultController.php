<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Url;
use AppBundle\Entity\Description;
use AppBundle\Form\UrlType;
use AppBundle\Form\ModifType;
use Symfony\Component\DomCrawler\Crawler;



class DefaultController extends Controller
{
    
public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('base.html.twig');
    }
    
 
public function formAction(Request $request)
    {
         $url = new Url();
         $form = $this->get('form.factory')->create(UrlType::class, $url);

    if ($request->isMethod('POST')){
        $form->handleRequest($request);
        
       
        if ($form->isValid()) {

        $url = $form->getData();
        $session = $request->getSession();
        $session->set('url', $url);

        return $this->redirectToRoute('title');
    }
        }
   return $this->render('base.html.twig', array(
        'form' => $form->createView(),
    ));
}


public function titleAction(Request $request)
    {
        $session = $request->getSession();
        $url = $session->get('url');
              
      
        $data = (string) $url;
        $data = file_get_contents($url);
        
        // print title
        $title = preg_match('/<title[^>]*>(.*?)<\/title>/ims', $data, $matches) ? $matches[1] : null;
        
       // print h1
        $h1= preg_match('/<h1[^>]*>(.*?)<\/h1>/ims', $data, $matches) ? $matches[1] : null;
        
         
         //print meta
         
        $tags ['description'] = get_meta_tags($url);
     
 
        //print img
      
          $img = preg_match('/(https?:\/\/.*\.(?:png|jpg))/i', $data, $matches) ? $matches[1] : null;
                 $alts = preg_match_all('/<img.*?alt="(.*?)"[^\>]+>/i', $data, $matches) ? $matches[1] : null;
                 
                 
        $form = $this->get('form.factory')->create(ModifType::class);

    if ($request->isMethod('POST')){
        $form->handleRequest($request);
        
       
        if ($form->isValid()) {

        $url = $form->setData();
        $session = $request->setSession();
        $session->set('url', $url);
        $session->set('description', $tags);
        $session->set('title', $title);
        
        
    }
        }
         

        return $this->render('result.html.twig', array(
            'url' => $url,
            'title' => $title,
            'h1' => $h1,
            'tags' => $tags,
            'alts' => $alts,
            'form' => $form->createView(),
      
            
        ));   
    }

}