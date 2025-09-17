<?php
define('DOT', '.');
require_once(DOT . "/bootstrap.php");

$Route = new Apps\Route;

//Home page//
$Route->add('/', function () {

    $Core = new Apps\Core;
    $Template = new Apps\Template;
    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");
    $rootpage = $Core->getSiteInfo('defaultlandingpage');
    $PageInfo = $Core->PageInfo($rootpage);
    $Template->assign("PageInfo", $PageInfo);
    $Template->assign("title", $PageInfo->title);

    $Template->assign("PageParts", $Core->PageWebParts($PageInfo->pageid));

    $Template->assign("Sliders", $Core->Sliders());


    $Template->assign("haspage", false);
    $Template->assign("menukey", "home");
    $Template->render("home");
}, 'GET');


$Route->add('/pages/{shortname}', function ($shortname) {

    $Core = new Apps\Core;
    $Template = new Apps\Template;
    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");
    $PageInfo = $Core->PageInfo($shortname);
    $Template->assign("PageInfo", $PageInfo);
    $Template->assign("title", $PageInfo->title);
    $PageParts = $Core->PageWebParts($PageInfo->pageid);
    $Template->assign("PageParts", $PageParts);
    $Template->assign("haspage", true);
    $Template->assign("menukey", $shortname);

    if ($PageInfo->pagestyle == "services") {
        $Galleries = $Core->ServiceGalleries();
        $Template->assign("Galleries", $Galleries);
        $Template->render("services");
    } elseif ($PageInfo->pagestyle == "project") {
        $Galleries = $Core->ProjectGalleries();
        $Template->assign("Galleries", $Galleries);
        $Template->render("projects");
    } elseif ($PageInfo->pagestyle == "gallery") {
        $Galleries = $Core->Galleries();
        $Template->assign("Galleries", $Galleries);
        $Template->render("gallery");
    } else {
        $Template->render("page");
    }
}, 'GET');



$Route->add('/village/{village}/set', function ($village) {

    $Core = new Apps\Core;
    $Template = new Apps\Template;

    $Core->setSiteInfo("default_village",$village);

    $Template->redirect("/");

}, 'GET');

// Generate sitemap.xml
$Route->add('/sitemap.xml', function () {
    $Core = new Apps\Core;
    
    header('Content-Type: application/xml; charset=utf-8');
    echo $Core->generateSitemap();
    
}, 'GET');

include_once "_public/admin.php";


$Route->run('/');
