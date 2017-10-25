<?php
/**
 * HttpErrorPages HTML Generator
 */

require_once 'image.php';

// default config file
$configFilename = 'config.ini';

// config file specified ?
if (isset($argv[1])){
    if (is_file($argv[1])){
        echo 'Using Config File "', $argv[1], '"', PHP_EOL;
        $configFilename = $argv[1];
    }else{
        echo 'Error: Config File "', $argv[1], '" not found - Using default one', PHP_EOL;
    }
}else{
    echo 'Using Default Config File "', $configFilename, '"', PHP_EOL;
}

// load config
$config = parse_ini_file($configFilename, false);

//default language
$language = 'fr_FR';

if (isset($argv[2])) {
    $language = $argv[2];
}

//Internationalization
switch($language) {
    case 'pt_BR':
        $pages = require('pages-pt_BR.php');
        break;
    case 'en_US':
        $pages = require('pages-en_US.php');
        break;
      break;
    case 'fr_FR':
        $pages = require('pages-fr_FR.php');
        break;
    default:
        $pages = require('pages-en_US.php');
        break;      
}

@mkdir($config['output_dir'], 0777, true);

// store pages as json data
file_put_contents($config['output_dir'].DIRECTORY_SEPARATOR.'pages.json', json_encode($pages));

// load inline css
$css = trim(file_get_contents('assets/Layout.css'));



// load base64 logo
if ($config['logo']) {
  $logo300 = resizeImage($config['logo'], 400, 400);
  $v_logoMimeType = 'image/png';
  $v_logoBase64 = base64_encode($logo300);
  $v_logoAlt = $config['logo_alt'];
  $v_logoTitle = $config['logo_title'];
}
$v_radix = $config['title'];

// js template page
$pages['{{code}}'] = array(
    'title' => '{{title}}',
    'message' => '{{message}}',
    'footer' => '{{footer}}'
);

// generate each error page
foreach ($pages as $code => $page){
    echo 'Generating Page ', $page['title'], ' (', $code, ')..', PHP_EOL;

    // assign variables
    $v_code = $code;
    $v_title = nl2br(htmlspecialchars($page['title']));
    $v_message = nl2br(htmlspecialchars($page['message']));
    $v_footer = (isset($config['footer']) ? $config['footer'] : '');
    $v_emoji = isset($page['emoji']) ? $page['emoji'] : '😰';
    if (@$page['global'] && @$page['permanent']) {
      $v_common = $config['common'] . $config['calamity'];
    } elseif (@$page['permanent']) {
      $v_common = $config['common'] . $config['permanent'];
    } else {
      $v_common = $config['common'] . $config['temporary'];
    }

    // render template
    ob_start();
    require('template.phtml');
    $errorpage = ob_get_clean();

    // generate output filename
    $filename = sprintf($config['scheme'], $v_code);

    // store template
    if (is_dir($config['output_dir'])){
        file_put_contents($config['output_dir'] . $filename, $errorpage);
    }else{
        echo 'Error: Output dir "', $config['output_dir'], '" not found', PHP_EOL;
    }
}