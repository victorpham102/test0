<?php
class functionClass {
    /**
     * Validate data post array
     *
     * @param $formData array
     * @param $error
     * @return $pass
     */
    function validateForm($formData, &$error){
        $pass = true;

        if (strlen($formData['first_name']) < 3 || strlen($formData['first_name']) > 20) {
            $error['firstname'] = 'First Name required from 3  to 20 length of string';
            $pass = false;
        }

        if (strlen($formData['last_name']) < 3 || strlen($formData['last_name']) > 20) {
            $error['lastname'] = 'Last Name required from 3  to 20 length of string';
            $pass = false;
        }

        if (strlen($formData['company_name']) < 3 || strlen($formData['company_name']) > 40) {
            $error['companyname'] = 'Company required from 3  to 40 length of string';
            $pass = false;
        }

        if (strlen($formData['phone_number']) < 9 || strlen($formData['phone_number']) > 13) {
            $error['phonenumber'] = 'Format Phone number invalid';
            $pass = false;
        }

        if (!filter_var($formData['email_address'], FILTER_VALIDATE_EMAIL)) {
            $error['emailaddress'] = 'Format Email address invalid';
            $pass = false;
        }

        return $pass;
    }

    /**
     * Validate email by api mailboxlayer
     *
     * @param $email
     * @return ResponseInterface
     */
    function validateMail($mail) {
        $access_key = '5a3015115381a1fe51466c1b7407c4f7';
        $urlRequest = "https://apilayer.net/api/check?access_key=".$access_key. "&email=" .$mail;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 0,
            CURLOPT_URL => $urlRequest,
            CURLOPT_USERAGENT => '',
            CURLOPT_SSL_VERIFYPEER => false
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $jsonResponse = json_decode($response);
        var_export($jsonResponse);die;
        //
    }

    /**
     * Create new image
     *
     * @param $width
     * @param $height
     * @return $imgSource new opject image
     */
    function createSourceImage($width, $height)
    {
        $imgSource = imagecreate($width, $height);

        //creat border for image
        $layerOne = imagecolorallocate($imgSource, 255, 255, 255); //color bggound
        $layerTwo = imagecolorallocate($imgSource, 0, 0, 0); //color font
        $this->ImageRectangleWithRoundedCorners($imgSource, 5, 5, $width - 5, $height - 5, 5, $layerTwo);
        $this->ImageRectangleWithRoundedCorners($imgSource, 6, 6, $width - 6, $height -6, 5, $layerOne);

        return $imgSource;
    }

    /**
     * Create border radius for image
     */
    function ImageRectangleWithRoundedCorners(&$im, $x1, $y1, $x2, $y2, $radius, $color) {
        // draw rectangle without corners
        imagefilledrectangle($im, $x1+$radius, $y1, $x2-$radius, $y2, $color);
        imagefilledrectangle($im, $x1, $y1+$radius, $x2, $y2-$radius, $color);
        // draw circled corners
        imagefilledellipse($im, $x1+$radius, $y1+$radius, $radius*2, $radius*2, $color);
        imagefilledellipse($im, $x2-$radius, $y1+$radius, $radius*2, $radius*2, $color);
        imagefilledellipse($im, $x1+$radius, $y2-$radius, $radius*2, $radius*2, $color);
        imagefilledellipse($im, $x2-$radius, $y2-$radius, $radius*2, $radius*2, $color);
    }

    /**
     * Insert fullname to image
     *
     * @param $imageSource resource image
     * @param $fontSize
     * @param $fontcolor
     * @param $fontNormal
     * @param $content  string convert
     * @@output text insert to image
     */
    function insertFullName($imageSource, $fontSize, $fontcolor, $fontNormal, $content)
    {
        imagettftext($imageSource, $fontSize, 0, 20, 40, $fontcolor, $fontNormal, $content);
    }

    /**
     * Insert Email to image
     *
     * @param $imageSource resource image
     * @param $height
     * @param $fontSize
     * @param $fontcolor
     * @param $fontNormal
     * @param $content
     * @@output text insert to image
     */
    function insertEmail($imageSource, $height, $fontSize, $fontcolor, $fontNormal, $content)
    {
        imagettftext($imageSource, $fontSize, 0, 20, $height - 25, $fontcolor, $fontNormal, $content);
    }

    /**
     * Insert Company to image
     *
     * @param $imgSource resource image
     * @param $fontSize
     * @param $font
     * @param $fontColor
     * @param $content
     * @@output text insert to image
     */
    function insertCompany($imgSource,$fontSize, $font, $fontColor, $content)
    {
        // THE IMAGE SIZE
        $width = imagesx($imgSource);
        $height = imagesy($imgSource);


        // THE TEXT SIZE
        $text_size = imagettfbbox($fontSize, 0, $font, $content);
        $text_width = max([$text_size[2], $text_size[4]]) - min([$text_size[0], $text_size[6]]);
        $text_height = max([$text_size[5], $text_size[7]]) - min([$text_size[1], $text_size[3]]);

        // CENTERING THE TEXT BLOCK
        $centerX = CEIL(($width - $text_width) / 2);
        $centerX = $centerX<0 ? 0 : $centerX;
        $centerY = CEIL(($height - $text_height) / 2);
        $centerY = $centerY<0 ? 0 : $centerY;
        imagettftext($imgSource, $fontSize, 0, $centerX, $centerY, $fontColor, $font, $content);
    }

    /**
     * Insert Phone Number to image
     *
     * @param $imgSource resource image
     * @param $fontSize
     * @param $font
     * @param $fontColor
     * @param $content
     * @@output text insert to image
     */
    function insertPhoneNumber($imgSource, $fontSize, $font, $fontColor, $content)
    {
        // THE IMAGE SIZE
        $width = imagesx($imgSource);
        $height = imagesy($imgSource);
        // THE TEXT SIZE
        $text_size = imagettfbbox($fontSize, 0, $font, $content);
        $text_width = max([$text_size[2], $text_size[4]]) - min([$text_size[0], $text_size[6]]);
        // Right THE TEXT BLOCK

        $x = ($width - $text_width) - 20;
        $y = $height - 25;
        imagettftext($imgSource, $fontSize, 0, $x, $y, $fontColor, $font, $content);
    }
}