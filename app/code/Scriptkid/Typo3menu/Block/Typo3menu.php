<?php

namespace Scriptkid\Typo3menu\Block;

class Typo3menu extends \Magento\Framework\View\Element\Template
{
  /* magic function to make templating easier */
  public function getMenu()
  {

    $html = $this->parseJson($this->getJson(), 'nav navbar-nav');
    return $html;

  }

  /* loop over our JSON to generate the HTML */
  private function parseJson($json, $class = 'nav')
  {

    $data = json_decode($json);
    /* level 0 */
    $html = '<ul class="'. $class .'">';
    foreach($data->children as $child)
    {
      if($child->children)
      {
        $html .= $this->generateListItem($child, 0, true);
      } else {
        $html .= $this->generateListItem($child, 0, false);
      }
    }
    $html .= '</ul>';
    return $html;
  }

  /* curl our JSON */
  private function getJson()
  {
    $target = '';
    $cUrl = curl_init();
    curl_setopt($cUrl, CURLOPT_URL, $target);
    curl_setopt($cUrl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($cUrl, CURLOPT_CONNECTTIMEOUT, 5);
    $data = curl_exec($cUrl);
    curl_close($cUrl);
    $data = explode('navigation-json" type="text/json">', $data);
    $data = $data[1];
    $data = explode('</script>', $data);
    $data = $data[0];

    return $data;
  }

  /* generate a LI Element */
  /* i am deeply ashamed, but client sucks and management is pretty much clueless */
  private function generateListItem($node, $level, $haschildren)
  {
    $listitem = '<li id="id-' . $node->id . '">';
      $listitem .= '<a href="'. $node->url .'" title="'. $node->title .'" >'. $node->title .'</a>';
      if($haschildren && $node->id == 2)
      {
        $navblocks = false;
        $listitem .= '<div class="navigation-panel width-container">';
            $headline = false;
            $iterator = 0;
            foreach($node->children as $child)
            {
              $iterator++;
              if($child->children)
              {
                $headline = true;
                $navblocks[$child->id] = $child->children;
              }
              if($iterator === 1 && $headline)
              {
                $listitem .= '<ul class="nav navigation-headline">';
              } else if($iterator === 1 && $headline === false)
              {
                $listitem .= '<ul class="nav navigation-block" data-navblock-id="'. $child->id .'">';
              }
              $listitem .= $this->generateNavHeadline($child);
            }
          $listitem .= '</ul>';

          if(count($navblocks) > 0)
          {
            foreach($navblocks as $navblockId => $navblock)
            {
              $listitem .= $this->generateNavblock($navblock, $navblockId);
            }
          }
        $listitem .= '</div>';
      } else if($haschildren && $node->id != 2)
      {
        $navblocks = false;
        $listitem .= '<div class="navigation-panel width-container">';
            $listitem .= '<ul class="nav navigation-block" data-navblock-id="'. $child->id .'">';
            foreach($node->children as $child)
            {
              if($child->children)
              {
                $navblocks[$child->id] = $child->children;
              }
              $listitem .= $this->generateNavHeadline($child);
            }
          $listitem .= '</ul>';
        $listitem .= '</div>';
      }
    $listitem .= '</li>';
    return $listitem;
  }

  private function generateNavHeadline($node)
  {
    $navHeadline = '<li>';
      $navHeadline .= '<a href="'. $node->url. '" title="'. $node->title .'" data-navblock-link="'. $node->id .'">'. $node->title .'</a>';
    $navHeadline .= '</li>';
    return $navHeadline;
  }

  private function generateNavblock($navblock, $navblockId)
  {
    $navblockHtml .= '<ul class="nav navigation-block" data-navblock-id="'. $navblockId .'">';
      foreach($navblock as $child)
      {
        $navblockHtml .= $this->generateNavblockLink($child);
      }
    $navblockHtml .= '</ul>';

    return $navblockHtml;
  }

  private function generateNavblockLink($node)
  {
    $listitem = '<li>';
    $listitem .= '<a href="'. $node->url .'" title="'. $node->title .'"><span class="navigation-subtitle">'. $node->subtitle .'</span><span class="navigation-title">'. $node->title .'</span></a>';
    $listitem .= '</li>';
    return $listitem;
  }

}
