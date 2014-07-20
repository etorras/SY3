<?php

namespace SY\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class WebController extends Controller
{
    public function indexAction()
    {
        return $this->render('SYWebBundle:Web:index.html.twig');
    }

    public function loadWebAjaxAction()
    {
        $request = $this->get('request');
        $url=$request->request->get('url');

        if('' != $url){
            $html = $this->getHTML($url);
            $return=array("responseCode" => 200, "html" => $html);
        }
        else{
            $return=["responseCode" => 400, "html" => "Error"];
        }

        return new Response(json_encode($return), 200, ['Content-Type'=>'application/json']);
    }

    private function getHTML($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}
