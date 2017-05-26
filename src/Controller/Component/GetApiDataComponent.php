<?php
namespace App\Controller\Component;
use App\Controller\Component\AppComponent;
/**
 * SimpleCrudComponent
 * @author hirosawa
 */
class GetApiDataComponent extends AppComponent
{
    /**
     * getApi
     * APIでのデータ取得メソッド
     * @author hirosawa
     * @param string|null $modelClass
     */
    public function getApi($uri)
    {
        $reqPrefs['http']['method'] = 'GET';
        $reqPrefs['http']['header'] = 'X-Auth-Token:663fbdf2eec84e6bb576da538004ada4';
        $stream_context = stream_context_create($reqPrefs);
        $response = file_get_contents($uri, false, $stream_context);
        $apiData = json_decode($response);

        return $apiData;
    }

}