<?php
     require_once 'plugins/functions.class.php';
     $imgWidth = 400;
     $imgHeight = 250;
     $fontSize = 12;
     $fontNormal = 'plugins/fonts/Lato-Regular.ttf';
     $fontBold = 'plugins/fonts/Lato-Bold.ttf';
     define('DIR_DOWNLOAD', 'download/');

     $formData = $_POST;
     $error = array();
     $response = array();

     $myDesign = new functionClass();

     if ($myDesign->validateForm($formData, $error)) {
         //create new image
         $imageSource = $myDesign->createSourceImage($imgWidth, $imgHeight);
         $fontColor = imagecolorallocate($imageSource, 0, 0, 0); //color font

         //insert Fullname to card
         $fullname = $formData['first_name'] .' '.$formData['last_name'];
         $myDesign->insertFullName($imageSource,$fontSize, $fontColor, $fontNormal, $fullname);

         //insert company to card
         $companyText = $formData['company_name'];
         $myDesign->insertCompany($imageSource, $fontSize, $fontBold, $fontColor, strtoupper($companyText));

         //insert email to card
         $emailAddress = $formData['email_address'];
         $myDesign->insertEmail($imageSource, $imgHeight, $fontSize, $fontColor, $fontNormal, $emailAddress);

         //insert phone to card
         $phoneNumber = $formData['phone_number'];
         $myDesign->insertPhoneNumber($imageSource, $fontSize, $fontNormal, $fontColor, $phoneNumber);

         header("Content-Type: image/png");
         imagepng($imageSource, DIR_DOWNLOAD .$phoneNumber.'.png');
         imagedestroy($imageSource);
         $response['src'] = DIR_DOWNLOAD .$phoneNumber.'.png';
         $response['status'] = true;

         $response = array(
             'status' => true,
             'src' => DIR_DOWNLOAD .$phoneNumber.'.png'
         );
     } else {
         $response = array(
             'status' => false,
             'error' => $error
         );
     }

    echo json_encode($response);
?>