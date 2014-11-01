<?php

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
        dd($response->body);
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
}