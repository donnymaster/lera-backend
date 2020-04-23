<?php

namespace App\Services;

class ServiceYoutube{

    private const API_URL = [
        'videos.list' => 'https://www.googleapis.com/youtube/v3/videos'
    ];

    public static function getStatusBroadcast($id_video){

        $info = self::getVideoInfo($id_video);

        if($info == false) { return false; } // удалено или скрыто

        // $video_info = [
        //     'statusBroadcast' => $info->snippet->liveBroadcastContent,
        //     'videoCover' => $info->snippet->thumbnails->maxres->url,
        //     'privacyStatus' => $info->status->privacyStatus
        // ];

        return $info->snippet->liveBroadcastContent;
    }

    public static function getCoverVideo($id_video){

        $info = self::getVideoInfo($id_video);

        if($info == false) { return false; } // удалено или скрыто

        return $info->snippet->thumbnails->maxres->url;

    }

    public static function getVideoInfo($vId, $part = ['id', 'snippet', 'contentDetails', 'player', 'statistics', 'status'])
    {
        $API_URL = self::API_URL['videos.list'];
        $params = [
            'id' => is_array($vId) ? implode(',', $vId) : $vId,
            'key' => self::get_key(),
            'part' => implode(', ', $part),
        ];

        $apiData = self::api_get($API_URL, $params);

        if (is_array($vId)) {
            return self::decodeMultiple($apiData);
        }

        return self::decodeSingle($apiData);
    }

    private static function get_key(){

        return env('YOUTUBE_API_KEY');

    }


    private static function api_get($url, $params)
    {
        //set the youtube key
        $params['key'] = self::get_key();

        //boilerplates for CURL
        $tuCurl = curl_init();
        curl_setopt($tuCurl, CURLOPT_URL, $url . (strpos($url, '?') === false ? '?' : '') . http_build_query($params));
        if (strpos($url, 'https') === false) {
            curl_setopt($tuCurl, CURLOPT_PORT, 80);
        } else {
            curl_setopt($tuCurl, CURLOPT_PORT, 443);
        }

        curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, 1);
        $tuData = curl_exec($tuCurl);
        if (curl_errno($tuCurl)) {
            throw new \Exception('Curl Error : ' . curl_error($tuCurl));
        }

        return $tuData;
    }

    private static function decodeSingle(&$apiData)
    {
        $resObj = json_decode($apiData);
        if (isset($resObj->error)) {
            $msg = "Error " . $resObj->error->code . " " . $resObj->error->message;
            if (isset($resObj->error->errors[0])) {
                $msg .= " : " . $resObj->error->errors[0]->reason;
            }

            throw new \Exception($msg);
        } else {
            $itemsArray = $resObj->items;
            if (!is_array($itemsArray) || count($itemsArray) == 0) {
                return false;
            } else {
                return $itemsArray[0];
            }
        }
    }

    private static function decodeMultiple(&$apiData)
    {
        $resObj = json_decode($apiData);
        if (isset($resObj->error)) {
            $msg = "Error " . $resObj->error->code . " " . $resObj->error->message;
            if (isset($resObj->error->errors[0])) {
                $msg .= " : " . $resObj->error->errors[0]->reason;
            }

            throw new \Exception($msg);
        } else {
            $itemsArray = $resObj->items;
            if (!is_array($itemsArray)) {
                return false;
            } else {
                return $itemsArray;
            }
        }
    }


}
