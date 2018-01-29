<?php

require "./vendor/autoload.php";


use HTL3R\Flags\Flags\TriangleFlag;
use HTL3R\Flags\Flags\RectangleFlag;
use HTL3R\Flags\Flags\Flag;

$flag = new RectangleFlag("Octocat-Land", 24.5, 2.0, 0.5, "#FFC8AB");
$flag2 = new TriangleFlag("Trioochs-Land", 14.8, 6.0, 3.2, "#F8C87B");
$flag3 = new TriangleFlag("Eingiraffe-Land", 26.1, 3.3, 7.2, "#A6C97B");



echo $flag;
echo $flag2;
echo $flag3;


$view = new \TYPO3Fluid\Fluid\View\TemplateView();

$paths = $view->getTemplatePaths();

// Assigning the template path and filename to be rendered. Doing this overrides
    // resolving normally done by the TemplatePaths and directly renders this file.
$paths->setTemplatePathAndFilename(__DIR__ . 'index.html');

$view->assignMultiple($valuesArray);

    // Rendering the View: plain old rendering of single file, no bells and whistles.
$output = $view->render();

return $output;