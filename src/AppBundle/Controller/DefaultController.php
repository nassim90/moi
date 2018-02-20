<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Url;
use AppBundle\Entity\Description;
use AppBundle\Form\FirstType;
use AppBundle\Form\ModifType;
use Symfony\Component\DomCrawler\Crawler;
use Knp\Snappy\Pdf;
use Dompdf\Dompdf;



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
         $form = $this->get('form.factory')->create(FirstType::class, $url);

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
                 
        // create a new form   
        $description = new Description();        
        $form = $this->get('form.factory')->create(ModifType::class, $description);

    if ($request->isMethod('POST')){
        $form->handleRequest($request);
 
        if ($form->isValid()) {

        $description = $form->getData();
        $session = $request->getSession();
        $session->set('description', $description); 
        $session = $request->getSession();
        $description = $session->get('description');
        
        $tags= $description->getDescription();
        $title= $description->getTitle();
        $url= $description->getUrl();
        
       
       
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

 public function pdfAction()
    {
  
$dompdf = new DOMPDF();  //if you use namespaces you may use new \DOMPDF()
$dompdf->loadHtmlFile('http://www.google.com');
$dompdf->render();
$dompdf->stream("sample.pdf", array("Attachment"=>0));


return $this->render('pdf.html.twig', array(
            'dompdf' => $dompdf,
            
            
        ));   

    } 
      
}