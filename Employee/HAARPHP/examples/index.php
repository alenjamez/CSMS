<?php require dirname(__FILE__).'/feature_detection.php'; 
    
?>
<!DOCTYPE html>
<html>

<head>
    <title>HAAR Feature Detection with PHP GD</title>
    <link rel="stylesheet" type="text/css" href="css.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
</head>

<body>

    <h1>Attendance</h1>

    <?php if ($error) echo "<p id='error'>$error</p>"; ?>

    <form method='POST' id='imgForm' enctype='multipart/form-data'>
        <label for='img_upload'>Image File: </label>
        <div class="row">
            <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
            </div>
            <div class="col-md-6">
                <div id="results"></div>
            </div>
        </div>
        <input type='submit' value="Upload and Detect" name='upload_form_submitted'>
    </form>

    <h2>Original Image</h2>
    <?php echo $origImageHtml; ?>

    <h2>Detected Features ( <?php echo $numFeatures; ?> )</h2>
    <ul style="list-style-type:none">
    <?php foreach ($detectedImagesHtml as $img) { ?>
        <li><?php echo $img; ?></li>
    <?php } ?>
    </ul>

    <script language="JavaScript">
    Webcam.set({
        width: 350,
        height: 350,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
    </script>

</body>

</html>