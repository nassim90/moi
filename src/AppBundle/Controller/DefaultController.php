<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Url;
use AppBundle\Entity\Description;
use AppBundle\Form\UrlType;
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
       
        
        preg_match_all('/<img[^>]+>/i',$data, $crawler); 
       
        $img = json_encode($crawler);
        
       foreach( $crawler[0] as $img){
            preg_match_all('/(alt)=("[^"]*")/i',$img, $alt_img[]);
           
       }
     

    
        return $this->render('result.html.twig', array(
            'url' => $url,
            'title' => $title,
            'h1' => $h1,
            'tags' => $tags,
            'img' => $img,
           
           
      
        ));   
    }

}