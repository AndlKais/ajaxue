<?php

require "./vendor/autoload.php";

use HTL3R\Flags\Flags\TriangleFlag;
use HTL3R\Flags\Flags\RectangleFlag;
use HTL3R\Flags\Flags\Flag;

$flag[] = new RectangleFlag("Octocat-Land", 24.5, 2.0, 0.5, "#FFC8AB");
$flag[] = new TriangleFlag("Trioochs-Land", 14.8, 6.0, 3.2, "#F8C87B");
$flag[] = new TriangleFlag("Eingiraffe-Land", 26.1, 3.3, 7.2, "#A6C97B");



foreach ($flag as $flags) {
    $myflag[] = [
        "name" => $flags->getName(),
        "price" => $flags->getPrice(),
        "width" => $flags->getWidth(),
        "height" => $flags->getHeight(),
        "color" => $flags->getColor(),
    ];
}

if(isset($_GET['typ']) && !empty($_GET["typ"]) && $_GET['typ'] == "json"){
    header('Content-Type: application/json');
    echo json_encode($myflag);
}else {


    $view = new \TYPO3Fluid\Fluid\View\TemplateView();

    $paths = $view->getTemplatePaths();


    $paths->setTemplatePathAndFilename(__DIR__ . '/templates/flags.html');

    $view->assignMultiple(
        array(
            "Flags" => $myflag
        )
    );

    // Rendering the View: plain old rendering of single file, no bells and whistles.
    $output = $view->render();


    echo $output;
}