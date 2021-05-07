<?php
$file=$_GET['file'];
$lid=$_GET['logid'];
error_reporting(E_ALL);
set_time_limit(0);

define('ABSPATH', dirname(dirname(__FILE__)));

global $error, $origImageHtml, $numFeatures, $detectedImagesHtml, $haarcascade_frontalface_alt;

require(ABSPATH.'/cascades/haarcascade_frontalface_alt.php');
require(ABSPATH.'/src/HaarDetector.php');


/* ------------------------------------------------
| UPLOAD FORM - validate form and handle submission
-------------------------------------------------- */
$error = false;
$origImageHtml = '';
$detectedImagesHtml = array();
$numFeatures = 0;
$uploadedImage = false;

$fileExt=1;
        $uploadedImage = "../bio/".$file;
        $origImage = imagecreatefromjpeg($uploadedImage);

    // detect face/feature
    $faceDetector = new HaarDetector($haarcascade_frontalface_alt);
    // cannyPruning sometimes depends on the image scaling, small image scaling seems to make canny pruning fail (if doCannyPruning is true)
    // optionally different canny thresholds can be set to overcome this limitation
    $found = $faceDetector
                /* normalise image to some standard dimensions eg. 150 px width so that detection parameters below remain relatively standard as well */
                ->image($origImage, 150 / imagesx($origImage))
                ->cannyThreshold(array('low'=>80, 'high'=>200))
                ->detect(1, 1.1 /*1.25*/, 0.12 /*0.2*/, 1, 0.2, false)
            ;

    // if detected
    if ($found)
    {
        $numFeatures = count($faceDetector->objects);
        // create feature images from original image
        $detectedImages = array_map(function($feature) use($origImage) {
            $detectedImage = imagecreatetruecolor($feature->width, $feature->height);
            imagecopy($detectedImage, $origImage, 0, 0, $feature->x, $feature->y, $feature->width, $feature->height);
            return $detectedImage;
        }, $faceDetector->objects);

                ob_start();
                imagejpeg($origImage);
                $origImageHtml='<img src="data:image/jpeg;base64,' . base64_encode(ob_get_clean()) . '" />';

                $detectedImagesHtml = array_map(function($detectedImage){
                    ob_start();
                    imagejpeg($detectedImage);
                    return '<img src="data:image/jpeg;base64,' . base64_encode(ob_get_clean()) . '" />';
                }, $detectedImages);
    }
    else
    {
        header("location:../../att.php?msg=* Face not Found");
    }
?>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="css.css" />
    </head>
    <body>
    <h2>Original Image</h2>
    <?php echo $origImageHtml; ?>

    <h2>Detected Features ( <?php echo $numFeatures; ?> )</h2>
    <ul style="list-style-type:none">
    <?php foreach ($detectedImagesHtml as $img) { ?>
        <li><?php echo $img; ?></li>
    <?php } ?>
    </ul>

</body>

</html>
