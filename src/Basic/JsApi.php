<?php
declare(strict_types = 1);

namespace Liuweiliang\LwlDingTalk\Basic;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

/**
 * @projectName ding_talk
 * @className JsApiTicket
 *
 * @createdBy 刘伟亮
 * @createDate 2024/1/15 13:49:39
 * @createVersion 1.0.0
 * @createDescription  JsApi 票证
 */
class JsApi extends AbstractBasic
{
    use MakeInstance;

    /**
     * @projectName ding_talk
     * @functionName ticket
     *
     * @createdBy 刘伟亮
     * @createDate 2024/1/15 13:50:21
     * @createVersion 1.0.0
     * @createDescription 票证
     *
     * @updatedBy
     * @updateDate 2024/1/15 13:50:21
     * @updateVersion
     * @updateDescription
     *
     * @return array|null
     *
     */
    public function ticket (): ?array
    {
        try {
            if (!$result = Cache::tags (['ding_talk_ticket'])->get ('ticket')) {
                $result = \LwlClientApi::GET ($this->baseUrl.'get_jsapi_ticket?access_token='.Arr::get (DingTalkToken::instance ()->getToken ('dingofdfx7owhnlwnqye', 'cHskw8uF7lCbJWeeL4w4iZXnuBGVxfZO4GpYhKWMPTRTMmwo5l279YE724FNvLrE'), 'token'))
                    ->json ([])
                    ->run ()
                    ->getData ();
                Cache::tags (['ding_talk_ticket'])->put ('ticket', $result, now ()->addSeconds ($result['expires_in']));
            }

        } catch (\Exception $exception) {
            dd($exception);
        }
        return match ($result['errcode']) {
            0 => [$result, '', '', 'ticket' => $result['ticket']],
            default => [null, null, $result['errmsg']],
        };
    }
}
