<html>
    <head>
        <title>Face App</title>
        <style>

      #overlay, .overlay {
          position: absolute;margin-left:215;margin-top:95;
          top: 0;
          left: 0;
          }
          #video1{
          width: 480 !important;
          position: absolute;
          margin-left: 80;
          margin-top: 15;

}
#refimg
{
  width: 260;
    margin-top: -185;
    margin-left: 210;
  position: relative;
}
#btPic,#btre{
  background-color: #f4511e;
  border: none;
  color: white;
  padding: 13px 28px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.6;
  transition: 0.3s;
  display: inline-block;
  text-decoration: none;
  cursor: pointer;
}
#btPic,#btre
{
position:absolute;
margin-top:-174;
}
#btPic:hover {opacity: 1}
#btre:hover {opacity: 1}
        </style>
        <script type="text/javascript" src="js0/webcam.js"></script>
    </head>
    <body>
      <!--  <img src="img/input/vineeth1.JPG" id="refimg"  />-->
      <div id="camera"></div>
        <input type="button" value="Take a Snap" id="btPic" onclick="takeSnapShot();" style="display:block;"/>
          <input type="button" value="Reenrollment" id="btre" style="display:none;" onclick="reenroll()">
       <img  id="refimg"/>

        <canvas id="reflay" class="overlay"></canvas>

        <script src="js0/jquery-2.1.1.min.js"></script>
        <script src="js0/face-api.js"></script>
      <?php
         require('../../includes/dbconnection.php');
        $sql="select face from tbl_emp where login_id NOT IN (100)";
        $result=mysqli_query($con,$sql);
        $data=array();
        while($row=mysqli_fetch_array($result))
        {
            //$list[]=$row['user_dp'];
            $list[] = substr($row['user_dp'], 0, strpos($row['user_dp'], "."));
        }
         ?>
        <script>
        //$("#btPic").click(function()
        loadfacemodel= function(){
       const labels = <?php echo json_encode($list); ?>;
            $(document).ready(function(){
                loader1();
                async function face(){

                    const MODEL_URL = '/models'

                    await faceapi.loadSsdMobilenetv1Model(MODEL_URL)
                    await faceapi.loadFaceLandmarkModel(MODEL_URL)
                    await faceapi.loadFaceRecognitionModel(MODEL_URL)

                    const img= document.getElementById('refimg')
                    let fullFaceDescriptions = await faceapi.detectAllFaces(img).withFaceLandmarks().withFaceDescriptors()
                    const canvas = $('#reflay').get(0)
                    faceapi.matchDimensions(canvas, img)

                    fullFaceDescriptions = faceapi.resizeResults(fullFaceDescriptions, img)
                    faceapi.draw.drawDetections(canvas, fullFaceDescriptions)
                    // faceapi.draw.drawFaceLandmarks(canvas, fullFaceDescriptions)


                    var con = canvas.getContext("2d");
                    var imgr = new Image()
                    imgr.src = "/img/glass.png";

                    imgr.onload = () => {      con.drawImage(imgr, dx =  471.27335262298584, dy=366.8473286212282 - 4,dw =101.75236415863037,dh =40);
                    console.log(imgr.width)      };
                    //485.00318117886485,  421.0191735548258
                    console.log(fullFaceDescriptions[0].landmarks)


                  //  const labels = ['prof', 'rio', 'tokyo', 'berlin', 'nairobi','vineeth']
                  // const labels = ['vineeth','vineethface','WhatsApp','IMG_0011','20190331003104_IMG_9621','20190331025602_IMG_0156','IMG_1163']
                    const labeledFaceDescriptors = await Promise.all(
                        labels.map(async label => {
                            // fetch image data from urls and convert blob to HTMLImage element
                            const imgUrl = `img/${label}.jpg`
                            const img = await faceapi.fetchImage(imgUrl)

                            // detect the face with the highest score in the image and compute it's landmarks and face descriptor
                            const fullFaceDescription = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor()

                            if (!fullFaceDescription) {
                            throw new Error(`no faces detected for ${label}`)
                            }

                            const faceDescriptors = [fullFaceDescription.descriptor]


                            return new faceapi.LabeledFaceDescriptors(label, faceDescriptors)
                        })
                    );

                    const maxDescriptorDistance = 0.6
                    const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, maxDescriptorDistance)

                    const results = fullFaceDescriptions.map(fd => faceMatcher.findBestMatch(fd.descriptor))

                    results.forEach((bestMatch, i) => {
                        const box = fullFaceDescriptions[i].detection.box
                        const text = bestMatch.toString()
                        username=text;
                        const drawBox = new faceapi.draw.DrawBox(box, { label: text })
                        drawBox.draw(canvas)

                    })

                    console.log(img);
                    return getusername(username);
                }

                face()
            })
          }
        </script>
    </body>
    <script>
    // CAMERA SETTINGS.
    $("#btn-pass").click(function(){
    Webcam.set({
        width: 220,
        height: 190,
        image_format: 'jpg',
        jpeg_quality: 100
    });
    Webcam.attach('#camera');


    // SHOW THE SNAPSHOT.
    takeSnapShot = function () {
      if(!Webcam.loaded)
      {
        alert("Camera loading");
        return;
      }
        Webcam.snap(function (data_uri) {
            document.getElementById('refimg').src =data_uri;
                //'<img src="' + data_uri + '" width="70px" height="50px" />';
        });
        videooff();
        retake();
        loadfacemodel();
    }
  })
  function videooff()
  {
    document.getElementById("video1").style.display="none";
    document.getElementById("btPic").style.display="none";
    const video = document.querySelector('video');

// A video's MediaStream object is available through its srcObject attribute
const mediaStream = video.srcObject;

// Through the MediaStream, you can get the MediaStreamTracks with getTracks():
const tracks = mediaStream.getTracks();

// Tracks are returned as an array, so if you know you only have one, you can stop it with:
tracks[0].stop();

// Or stop all like so:
tracks.forEach(track => track.stop())
  }
  function retake()
  {
    document.getElementById("btre").style.display="block";
    document.getElementById("refimg").style.display="block";

  }
  function reenroll()
  {
      document.getElementById("refimg").style.display="none";
    //  enrollface();
  }
  $("#btre").click(function(){
  $("#btn-pass").click();
  document.getElementById("btre").style.display="none";
  document.getElementById("btPic").style.display="block";

});
</script>
</html>
