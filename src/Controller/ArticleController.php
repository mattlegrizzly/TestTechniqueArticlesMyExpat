<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

   

    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        ini_set("allow_url_fopen", 1);

        $json = file_get_contents('https://newsapi.org/v1/sources?apiKey=0f844dde3ed649f49f2e722c92a5888e');
        $sources = json_decode($json, true);
        $count = count($sources['sources']);
        return $this->render('blog/index.html.twig',[
            'sources' => $sources['sources'],
            'count' => $count
        ] );
        
    }

    /**
     * @Route("/source/{id}", name="source_show")
     */

    public function show($id){
        ini_set("allow_url_fopen", 1);

        $json = file_get_contents('https://newsapi.org/v1/articles?source='.$id.'&apiKey=0f844dde3ed649f49f2e722c92a5888e');
        $sources = json_decode($json, true);
        $count = count($sources['articles']);
        return $this->render('blog/sourceshow.html.twig',[
            'sources' => $sources['articles'],
            'count' => $count
        ] );
    }
}
