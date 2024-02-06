<?php
declare(strict_types = 1);

namespace Liuweiliang\LwlDingTalk\Basic;


use Illuminate\Support\Facades\Cache;

/**
 * @projectName ding_talk
 * @className DingTalkToken
 *
 * @createdBy 刘伟亮
 * @createDate 2024/1/13 13:25:29
 * @createVersion
 * @createDescription
 */
class DingTalkToken extends AbstractBasic
{
    use MakeInstance;

    /**
     * @projectName ding_talk
     * @functionName getToken
     * @param string|null $appKey 应用key
     * @param string|null $appSecret Password
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/13 13:22:21
     * @createVersion 1.0.0
     * @createDescription 获取token
     *
     * @updatedBy
     * @updateDate 2024/1/13 13:22:21
     * @updateVersion
     * @updateDescription
     *
     * @return array|null
     *
     */
    public function getToken (?string $appKey = '',?string $appSecret = ''): ?array
    {
        try {
            if (!$result = Cache::tags (['ding_talk_token'])->get('token')){
                $result = \LwlClientApi::get ($this->baseUrl . 'gettoken')
                    ->query (['appkey' => $appKey, 'appsecret' => $appSecret])
                    ->run ()
                    ->getData ();
                Cache::tags (['ding_talk_token'])->put ('token', $result, now ()->addSeconds ($result['expires_in']));
            }
            return match ($result['errcode']) {
                0=>[$result,'','','token'=>$result['access_token']],
                default=>[null,null,$result['errmsg']],
            };
        }catch (\Exception $exception){
           abort (5001,$exception->getMessage ());
        }
    }
}
