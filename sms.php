<?php

      public function send_sms($toNumber, $message ) {

          $sid = 'YOUR_TWILIO_ACCOUNT_SID';
          $authToken = 'YOUR_TWILIO_AUTH_TOKEN';
          $twilioNumber = 'YOUR_TWILIO_PHONE_NUMBER';
          
          
          $data = [
              'From' => $twilioNumber,
              'To' => $toNumber,
              'Body' => $message
          ];

          $url = "https://api.twilio.com/2010-04-01/Accounts/$sid/Messages.json";
          
          // Initialize cURL
          $ch = curl_init($url);
          
          // Set cURL options
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
          curl_setopt($ch, CURLOPT_USERPWD, "$sid:$authToken");
          
          // Execute cURL and fetch response
          $response = curl_exec($ch);
          
          // Check for errors
          if ($response === false) {
              echo "cURL Error: " . curl_error($ch);
          } else {
              echo "Message sent successfully!";
          }
          
          // Close cURL session
          curl_close($ch);
        
          return $response;
      }
?>
