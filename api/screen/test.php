<?php
use HeadlessChromium\BrowserFactory;

$browserFactory = new BrowserFactory();

// starts headless chrome
$browser = $browserFactory->createBrowser();

// creates a new page and navigate to an url
$page = $browser->createPage();
$page->navigate('https://www.youtube.com/')->waitForNavigation();

// get page title
$pageTitle = $page->evaluate('document.title')->getReturnValue();

// screenshot - Say "Cheese"! 😄
$page->screenshot()->saveToFile('/foo/bar.png');

// bye
$browser->close();