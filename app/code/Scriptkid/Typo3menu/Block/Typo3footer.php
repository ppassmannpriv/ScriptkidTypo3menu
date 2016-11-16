<?php

namespace Scriptkid\Typo3menu\Block;

class Typo3footer extends \Magento\Framework\View\Element\Template
{
  /* magic function to make templating easier */
  public function getFootermenu($key)
  {
    $html = '';
    $json = $this->getJson($key);
    $html .= $this->parseJson($json, 'nav');

    return $html;

  }

  /* loop over our JSON to generate the HTML */
  private function parseJson($json, $class = 'nav')
  {
    $return = '<ul class="'. $class .'">';
    $data = json_decode($json);
    /* level 0 */
    foreach($data->children as $node)
    {
      $return .= $this->generateLink($node);
    }

    $return .= '</ul>';

    return $return;
  }

  private function generateLink($node)
  {
    $link = '<li><a href="'. $node->url .'" title="'. $node->title .'">'. $node->title .'</a></li>';
    return $link;
  }

  /* curl our JSON */
  private function getJson($key)
  {
    $return = array();
    $target = '';
    $cUrl = curl_init();

    curl_setopt($cUrl, CURLOPT_URL, $target);
    curl_setopt($cUrl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($cUrl, CURLOPT_CONNECTTIMEOUT, 5);
    $data = curl_exec($cUrl);
    curl_close($cUrl);

    $dom = new \DomDocument;
    $dom->loadHTML($data);
    $doc = $dom->getElementById('footer-json-1');

    $return['footer-json-1'] = $dom->getElementById('footer-json-1')->nodeValue;
    $return['footer-json-2'] = $dom->getElementById('footer-json-2')->nodeValue;
    $return['footer-json-3'] = $dom->getElementById('footer-json-3')->nodeValue;


    return $return[$key];
  }


}
