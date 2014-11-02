<?php

    use Carbon\Carbon;

class MailstoreController extends \BaseController {

public function dashboard()
    {
    // request all instances
        $uri = 'https://mailarchiv.computech-ob.de:8474/api/invoke/GetInstances';
        $response = Httpful::post($uri)             

            ->authenticateWith('admin', 'RemoteCT12$') 
            ->addHeader('Content-Type', 'application/x-www-form-urlencoded')
            ->body(array(
                'instanceFilter' => '*',
            ))
        ->sendsType(\Httpful\Mime::FORM)
        ->send();  
    // save the response
       $results = $response->body->result;
    // Count the number of costumer
        $numberOfCostumers = count($response->body->result);

    // requests the statistics for one instance
        $uri = 'https://mailarchiv.computech-ob.de:8474/api/invoke/GetInstanceStatistics';
        $response = Httpful::post($uri)             

            ->authenticateWith('admin', 'RemoteCT12$') 
            ->addHeader('Content-Type', 'application/x-www-form-urlencoded')
            ->body(array(
                'instanceID' => 'computechgmbh',
            ))
        ->sendsType(\Httpful\Mime::FORM)
        ->send();  
    // when the response is empty set default values
        if (empty($response->body->result->numberOfMessages)) {
            $numberOfMessages = '-';
            $totalSizeMB = '-';
        }
    // if it is not empty use the values
        else {
            // Number of messages for one instance
            $numberOfMessages = $response->body->result->numberOfMessages;
            // Total Size of one instance
            $totalSizeMB = $response->body->result->totalSizeMB;
        }
        
    // request all users for one instance    
        $uri = 'https://mailarchiv.computech-ob.de:8474/api/invoke/GetUsers';
        $response = Httpful::post($uri)             

            ->authenticateWith('admin', 'RemoteCT12$') 
            ->body(array(
                'instanceID' => 'computechgmbh'
                ))
            ->addHeader('Content-Type', 'application/x-www-form-urlencoded')
            ->sendsType(\Httpful\Mime::FORM)
            ->send();  
    // Count the number of users for one instance
        $numberOfUsers = count($response->body->result);

    // Return the View with the values
        return View::make('dashboard', compact('numberOfCostumers', 'results', 'totalSizeMB', 'numberOfMessages', 'numberOfUsers'));
    }
}