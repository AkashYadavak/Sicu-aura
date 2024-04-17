<?php

    // Check if the imageData parameter is set

    if(isset($_POST['imageData']))
    {
        // Get the base64-encoded image data from the request

        $imageData = $_POST['imageData'];

        // Remove the "data:image/jpeg;base64," prefix

        $imageData = str_replace("data:image/jpeg;base64,", '', $imageData);

        // Decode the base64-encoded image data

        $decodedImage = base64_decode($imageData);

        // Specify the directory where images will be stored

        $uploadDir = './client_data';

        // Create the directory if it doesn't exist

        if(!file_exists($uploadDir))
        {
            if(!mkdir($uploadDir))
            {
               return "Directory not Created."; 
            }

        }

        // Specify the filename for the uploaded image

        $filename = $uploadDir . '/captured_image.jpg';

        // Save the decoded image data to a file

        if(file_put_contents($filename, $decodedImage))
        {
            // Image saved successfully
            echo 'Image saved successfully';
        } 
        else
        {
            // Error in saving image
            echo 'Failed to save image on server';
        }
    } 
    else
    {
        // imageData parameter not found
        http_response_code(400);
    }

?>