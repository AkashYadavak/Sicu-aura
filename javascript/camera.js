

document.addEventListener('DOMContentLoaded', () => {
    
    const video = document.getElementById('video');
    const cameraPlaceholder = document.getElementById('camera-placeholder');
    const captureBtn = document.getElementById('capture-btn');



  // Function to start capturing video from the webcam

  async function startVideo()
  {
        try{
            // Access the user's webcam
            const stream = await navigator.mediaDevices.getUserMedia({video: true});

            // set the video stream as the source for the video element

            video.srcObject = stream;

            //show the video element and hide the camera placeholder
            
            video.style.display = 'block';
            cameraPlaceholder.style.display = 'none';
        }

        catch(err){
            //Handle errors
            // alert('Error accessing the webcam:', err);
            console.error('Error accessing the webcam:', err);
        }
  }


//   Function to capture a picture from the video stream

  function takePicture(){
    const canvas = document.createElement('canvas');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;

    const context = canvas.getContext('2d');
    context.drawImage(video, 0, 0, canvas.width, canvas.height);

    //Converting canvas content to a data URL representing a JPEG image

    const dataURL  = canvas.toDataURL('image/jpeg');

    //Send the image data to a PHP script using fetch

    fetch('./test.php',{
        method: 'POST',
        headers: {
            'content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'imageData=' + encodeURIComponent(dataURL)

    })
    .then(response => {
        if(response.ok)
        {
            window.location.reload();
            
        }else{
            throw new Error('Failed to save image on server');
        }
    })
    .catch(error=>{
        console.error('Error:', error);
    });

    location.href = "takepic.html";

  }

 // Call the startVideo function to initiate webcam access

startVideo();

document.getElementById('capture-btn').addEventListener('click', takePicture);

});





