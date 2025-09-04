<?php
include('db.inc.php');
include('pversions.inc.php');
$i = 1;
$nav_query = $mysqli->query("SELECT nav_ID, nav_name FROM navigation ORDER BY nav_pos");
$navArray = [];
while ($nav = $nav_query->fetch_array()) {
  $navItem = ['id' => $nav['nav_ID']];
  $navItem['title'] = utf8_encode($nav['nav_name']);
  $itemContent = [];
  $sub_query = $mysqli->query("SELECT sub_name, sub_link, sub_id FROM subnavigation WHERE sub_kat='" . $nav['nav_ID'] . "' AND sub_active='1' ORDER BY sub_pos");
  while ($sub = $sub_query->fetch_array()) {
    $subNavItem = ['title' => utf8_encode($sub['sub_name'])];
    $subNavItem['id'] = $sub['nav_ID'];
    if ($sub['sub_link'] != NULL) {
      $subNavItem['link'] = $sub['sub_link'];
    }
    $itemContent[] = $subNavItem;
  }
  $navItem['content'] = $itemContent;
  $navArray[] = $navItem;
}

$contentArray = [];

$kasten_query = $mysqli->query("SELECT * FROM homepage WHERE hp_active = '1' AND hp_size<>0 ORDER BY hp_pos ASC");
while ($kasten = $kasten_query->fetch_array()) {

  $contentItem = ['id' => $kasten['hp_ID'], 'width' => $kasten['hp_size']];
  if ($kasten['hp_video'] == 0) {
    if ($kasten['hp_link'] == NULL) {
      $contentItem['link'] = "article.php?a=" . $kasten['hp_ID'];
    } else {
      $contentItem['link'] = $kasten['hp_link'];
    }
    $contentItem['image'] = $_PATHS['articleimages'] . $kasten['hp_ID'] . "front.jpg";
    $contentItem['imageAlt'] = "Artikel #" . $kasten['hp_ID'];

    $contentItem['text'] = str_replace(["\n", "\r"], '', $kasten['hp_teaser']);
  } else {
    $contentItem['width'] = 2;
    if (!strpos($kasten['hp_link'], 'youtube')) {

      $contentItem['link'] = $_PATHS['videos'] . $kasten['hp_link'];
      $contentItem['image'] = $_PATHS['articleimages'] . $kasten['hp_ID'] . "front.jpg";

      $contentItem['text'] = $kasten['hp_teaser'];
    } else {
      if (strpos($kasten['hp_teaser'], ':youtubeFeed:') !== false) {
        /*
          API usage allows 100 calls per day, let's not until cached
        try {
            $channelID = 'UCVHw-42jBXE9DIizJmEK6aQ';
            $apiKey = '';
            $url = 'https://www.googleapis.com/youtube/v3/search?part=snippet%2Cid&channelId=' . $channelID . '&maxResults=1&order=date&key=' . $apiKey;
            //Get the results from the url above and store them in a variable.
            $data = @file_get_contents($url);
            $aYoutubeResponse = json_decode($data);

            $videoURL = $aYoutubeResponse->items[0]->id->videoId;

            //if a video was found
            if ($videoURL) {
                $contentItem['embed'] = true;
                $contentItem['link'] = 'https://www.youtube-nocookie.com/embed/' . $videoURL;
                $contentItem['text'] = substr($kasten['hp_teaser'], 13);
            }
        } catch (Exception $ex) {
            $videoURL = null;
        }
        */
      }
      if (!$videoURL) {
        $contentItem['embed'] = true;
        $contentItem['link'] = $kasten['hp_link'];
        $contentItem['text'] = $kasten['hp_teaser'];
      }
    }
  }
  $contentArray[] = $contentItem;
}

$sidebarArray = [];

//Sidebarkästen    
$sbkasten_query = $mysqli->query("SELECT sb_text, sb_id FROM sidebar ORDER BY sb_pos ASC");
$sbkasten_query->fetch_array();
while ($sbkasten = $sbkasten_query->fetch_array()) {
  $sidebarItemContent = '';
  $content = trim($sbkasten['sb_text']);
  if ((substr($content, 0, 4) === "<!--") && (substr($content, -3) === "-->")) {
    continue;
  }


  if ($content == "[pflegetiere]") {
    $sidebarItemContent = '<strong>Wir suchen ein Zuhause:</strong>
        <ul class="slideshow">';
    $durchgang = 1;
    $pflegeresult = $mysqli->query("SELECT tier_ID,tier_NAME FROM tiere2 WHERE tier_STATUS='0'");
    while ($pflege = $pflegeresult->fetch_array()) {

      if (file_exists($_PATHS['animalimages'] . $pflege['tier_NAME'] . "sb.jpg")) {
        $sidebarItemContent .= '
                <li ' . ($durchgang == 1 ? 'class="show"' : '') . '>
                    <a href="tier.php?tier= ' . $pflege['tier_ID'] . '"><img
                            src="' . $_PATHS['animalimages'] . $pflege['tier_NAME'] . 'sb.jpg" width="190" height="150"
                            alt="' . $pflege['tier_NAME'] . '" title="' . $pflege['tier_NAME'] . '" /></a>
                </li>';
        $durchgang++;
      }
    };

    $sidebarItemContent .= '</ul>';
  } elseif ($content == "[patentiere]") {
    $sidebarItemContent = "<strong>Wir suchen einen Paten:</strong>";
    $patenresult = $mysqli->query("SELECT tier_ID,tier_NAME FROM tiere2 WHERE tier_STATUS='0' AND tier_PATE='1'");
    $nums = $patenresult->num_rows;

    if ($nums > 1) {
      $rand = rand(0, $nums - 1);
      $patenresult2 = $mysqli->query("SELECT tier_ID,tier_NAME FROM tiere2 WHERE tier_STATUS='0' AND tier_PATE='1' LIMIT " . $rand . ",2");
      $name1 = $patenresult2->fetch_array();
      $name1 = $name1['tier_NAME'];
      $name2 = $patenresult2->fetch_array();
      $name2 = $name2['tier_NAME'];

      $sidebarItemContent .= '<a href="site.php?site=52"><img src="' . $_PATHS['animalimages'] . $name1 . 'sb.jpg" width="190"
                    height="150" title="Wir suchen einen Paten" alt="Wir suchen einen Paten"
                    onmouseover="this.src=\'' . $_PATHS['animalimages'] . $name2 . 'sb.jpg\';"
                    onmouseout="this.src=\'' . $_PATHS['animalimages'] . $name1 . 'sb.jpg\';" /></a>';
    } elseif ($nums === 1) {
      $paten = $patenresult->fetch_array();
      $sidebarItemContent .= '<a href="site.php?site=52"><img src="' . $_PATHS['animalimages'] . $paten['tier_NAME'] . 'sb.jpg"
                    width="190" height="150" title="' . $paten['tier_NAME'] . '" alt="Wir suchen einen Paten" /></a>';
    } else {
      $sidebarItemContent .= '<a href="site.php?site=52">Wir suchen einen Paten</a>';
    };
  } else {
    $sidebarItemContent = str_replace(["\n", "\r"], '', utf8_encode($content));
  }
  $sidebarArray[] = ['content' => $sidebarItemContent, 'id' => $sbkasten['sb_id']];
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode([
  'navigation' => $navArray,
  'content' => $contentArray,
  'sidebar' => $sidebarArray
]);
