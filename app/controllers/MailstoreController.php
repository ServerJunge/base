<?php

    use Carbon\Carbon;

class MailstoreController extends \BaseController {

public function SetUserPassword()
    {
    $uri = 'https://mailarchiv.computech-ob.de:8474/api/invoke/SetUserPassword';
    $response = Httpful::post($uri)             

        ->authenticateWith('admin', 'RemoteCT12$') 
        ->addHeader('Content-Type', 'application/x-www-form-urlencoded')
        ->body(array(
            'instanceID' => 'computechgmbh',
            'userName' => 'dominik geimer',
            'password' => 'hallo'
            ))
        ->sendsType(\Httpful\Mime::FORM)
        ->send();  
        dd($response->body->statusCode);
    }

public function GetInstances()
    {
    $uri = 'https://mailarchiv.computech-ob.de:8474/api/invoke/GetInstances';
    $response = Httpful::post($uri)             

        ->authenticateWith('admin', 'RemoteCT12$') 
        ->addHeader('Content-Type', 'application/x-www-form-urlencoded')
        ->body(array(
            'instanceFilter' => '*',
            ))
        ->sendsType(\Httpful\Mime::FORM)
        ->send();  
// Number of Costumers

       // dd($response->body);
 
       $results = $response->body->result;

          $numberCostumers = count($response->body->result);





$uri = 'https://mailarchiv.computech-ob.de:8474/api/invoke/GetInstanceStatistics';
    $response = Httpful::post($uri)             

        ->authenticateWith('admin', 'RemoteCT12$') 
        ->addHeader('Content-Type', 'application/x-www-form-urlencoded')
        ->body(array(
            'instanceID' => 'computechgmbh',
            ))
        ->sendsType(\Httpful\Mime::FORM)
        ->send();  
       $numberOfMessages = $response->body->result->numberOfMessages;

        $totalSizeMB = $response->body->result->totalSizeMB;



 $uri = 'https://mailarchiv.computech-ob.de:8474/api/invoke/GetUsers';
    $response = Httpful::post($uri)             

        ->authenticateWith('admin', 'RemoteCT12$') 
        ->body(array(
            'instanceID' => 'computechgmbh'
            ))
        ->addHeader('Content-Type', 'application/x-www-form-urlencoded')
        ->sendsType(\Httpful\Mime::FORM)
        ->send();  

        $numberOfUsers = count($response->body->result);







        return View::make('dashboard', compact('numberCostumers', 'results', 'totalSizeMB', 'numberOfMessages', 'numberOfUsers'));



    }

public function GetInstanceStatistics()
    {
    $uri = 'https://mailarchiv.computech-ob.de:8474/api/invoke/GetInstanceStatistics';
    $response = Httpful::post($uri)             

        ->authenticateWith('admin', 'RemoteCT12$') 
        ->addHeader('Content-Type', 'application/x-www-form-urlencoded')
        ->body(array(
            'instanceID' => 'computechgmbh',
            ))
        ->sendsType(\Httpful\Mime::FORM)
        ->send();  
        dd($response->body);
    }

public function GetServiceStatus()
    {
    $uri = 'https://mailarchiv.computech-ob.de:8474/api/invoke/GetServiceStatus';
    $response = Httpful::post($uri)             

        ->authenticateWith('admin', 'RemoteCT12$') 
        ->addHeader('Content-Type', 'application/x-www-form-urlencoded')
        ->sendsType(\Httpful\Mime::FORM)
        ->send();  
        dd($response->body);
    }

public function GetUserInfo()
    {
    $uri = 'https://mailarchiv.computech-ob.de:8474/api/invoke/GetUserInfo';
    $response = Httpful::post($uri)             

        ->authenticateWith('admin', 'RemoteCT12$') 
        ->addHeader('Content-Type', 'application/x-www-form-urlencoded')
        ->body(array(
            'instanceID' => 'computechgmbh',
            'userName' => 'dominik geimer'
            ))
        ->sendsType(\Httpful\Mime::FORM)
        ->send();  
        dd($response->body);
    }

public function GetEnvironmentInfo()
    {
    $uri = 'https://mailarchiv.computech-ob.de:8474/api/invoke/GetEnvironmentInfo';
    $response = Httpful::post($uri)             

        ->authenticateWith('admin', 'RemoteCT12$') 
        ->addHeader('Content-Type', 'application/x-www-form-urlencoded')
        ->sendsType(\Httpful\Mime::FORM)
        ->send();  
        dd($response->body);
    }

public function GetStores()
    {
    $uri = 'https://mailarchiv.computech-ob.de:8474/api/invoke/GetEnvironmentInfo';
    $response = Httpful::post($uri)             

        ->authenticateWith('admin', 'RemoteCT12$') 
        ->addHeader('Content-Type', 'application/x-www-form-urlencoded')
        ->sendsType(\Httpful\Mime::FORM)
        ->send();  
        dd($response->body);
    }

//WORKER RESULTS
public function GetWorkerResults()
    {

        $howOldAmI = Carbon::createFromDate(1985, 7, 12)->age;
        $lastWeek = Carbon::now()->subWeek()->toRfc2822String();
        // $lastWeek = Carbon::now()->subWeek();

       dd($howOldAmI);

    $uri = 'https://mailarchiv.computech-ob.de:8474/api/invoke/GetWorkerResults';
    $response = Httpful::post($uri)             

        ->authenticateWith('admin', 'RemoteCT12$') 
        ->addHeader('Content-Type', 'application/x-www-form-urlencoded')
        ->body(array(
            'instanceID' => 'computechgmbh',
            'fromIncluding' => 'Sat, 01 Nov 2014 15:35:48 +0000',
            'toExcluding' => 'Sat, 25 Oct 2014 15:37:39 +0000',
            'timeZoneID' => 'utc'
            ))
        ->sendsType(\Httpful\Mime::FORM)
        ->send();  
        dd($response->body);
    }

//WORKER RESULTS
public function GetInstanceProcessLiveStatistics()
    {

    $uri = 'https://mailarchiv.computech-ob.de:8474/api/invoke/GetInstanceProcessLiveStatistics';
    $response = Httpful::post($uri)             

        ->authenticateWith('admin', 'RemoteCT12$') 
        ->addHeader('Content-Type', 'application/x-www-form-urlencoded')
        ->body(array(
            'instanceID' => 'computechgmbh'
            ))
        ->sendsType(\Httpful\Mime::FORM)
        ->send();  
        dd($response->body);
    }

public function GetUsers()
    {
    $uri = 'https://mailarchiv.computech-ob.de:8474/api/invoke/GetUsers';
    $response = Httpful::post($uri)             

        ->authenticateWith('admin', 'RemoteCT12$') 
        ->body(array(
            'instanceID' => 'computechgmbh'
            ))
        ->addHeader('Content-Type', 'application/x-www-form-urlencoded')
        ->sendsType(\Httpful\Mime::FORM)
        ->send();  

        $numberOfUsers = count($response->body->result);
        return $numberOfUsers;
    }
}