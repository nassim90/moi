<?php
// src/AppBundle/Service/Title.php

namespace AppBundle\Service;

use AppBundle\Entity\Description;
use AppBundle\Entity\Url;
use Symfony\Component\Templating\EngineInterface;


class Title
{  

 public function getTitle($url) {
     
        
        $description = preg_match('/<title[^>]*>(.*?)<\/title>/ims', $data, $matches) ? $matches[1] : null;
        return $title;
       
         $description->setTitle($title);
         
        
        }
   
 

    
}