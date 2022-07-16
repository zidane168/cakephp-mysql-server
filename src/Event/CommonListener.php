<?php 

namespace App\Event;

use Cake\Event\EventListenerInterface;
use Cake\Log\Log;

class CommonListener implements EventListenerInterface
{
    public function implementedEvents(): array
    {
        return [
            'Model.Common.writeCMSLog'              => 'writeCMSLog',
            'Model.Common.writeAPILog'              => 'writeAPILog',
        ];
    }

    public function writeCMSLog($event, $level, $data) {

        switch ($level) {
            case 'info':
                Log::info('info log: ' . json_encode($data), ['scope' => 'cms']);
                break;

            case 'warning':
                Log::warning('warning log: ' . json_encode($data), ['scope' => 'cms']);
                break;

            case 'error':
                Log::error('error log: ' . json_encode($data), ['scope' => 'cms']);
                break;         
                
            case 'alert':
                Log::alert('alert log: ' . json_encode($data), ['scope' => 'cms']);
                break;

            case 'emergency':
                Log::emergency('emergency log: ' . json_encode($data), ['scope' => 'cms']);
                break;

            case 'critical':
                Log::critical('critical log: ' . json_encode($data), ['scope' => 'cms']);
                break;

            case 'notice':
                Log::notice('notice log: ' . json_encode($data), ['scope' => 'cms']);
                break;

            case 'debug':
                Log::debug('debug log: ' . json_encode($data), ['scope' => 'cms']);
                break;

        }
    }

    public function writeAPILog($event, $level, $url, $request, $response, $data) {

        $information = 'url: ' . json_encode($url) . " | request: " . json_encode($request) . " | response: " . json_encode($response) . " | data: " . json_encode($data);
        $scope = "api";
        switch ($level) {
            case 'info':
                Log::info($information, ['scope' => $scope]);
                break;

            case 'warning':
                Log::warning($information, ['scope' => $scope]);
                break;

            case 'error':
                Log::warning($information, ['scope' => $scope]);
                break;         
                
            case 'alert':
                Log::alert($information, ['scope' => $scope]);
                break;

            case 'emergency':
                Log::emergency($information, ['scope' => $scope]);
                break;

            case 'critical':
                Log::critical($information, ['scope' => $scope]);
                break;

            case 'notice':
                Log::notice($information, ['scope' => $scope]);
                break;

            case 'debug':
                Log::debug($information, ['scope' => $scope]);
                break;

        }
    }
}