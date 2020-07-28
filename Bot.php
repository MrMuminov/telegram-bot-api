<?php


namespace mrmuminov\tgbot;

/**
 * Class Bot
 * @author Bahriddin Mo'minov
 * @link darkshadeuz@gmail.com
 * @package mrmuminov\tgbot
 */
class Bot extends BaseBot
{

    /**
     * @param $url string
     * @param null $certificate new CURLFile("pathOfFile/file.crt")
     * @param null $max_connections
     * @param bool $allowed_updates
     * @return mixed
     */
    public static function setWebhook($url, $certificate = null, $max_connections = null, $allowed_updates = false)
    {
        return self::request([
            'url' => $url,
            'certificate' => $certificate,
            'max_connections' => $max_connections,
            'allowed_updates' => $allowed_updates,
        ], "setWebhook");
    }

    /**
     * @return mixed
     */
    public static function deleteWebhook()
    {
        return self::request([], "deleteWebhook");
    }

    /**
     * @param string|integer $chat_id
     * @param string $text
     * @param string $parse_mode
     * @param bool $disable_web_page_preview
     * @param bool $disable_notification
     * @param integer $reply_to_message_id
     * @param keyboard\Keyboard $reply_markup
     */
    public static function sendMessage($chat_id, $text, $parse_mode = null, $disable_web_page_preview = false, $disable_notification = false, $reply_to_message_id = null, keyboard\Keyboard $reply_markup = null)
    {
        return self::request([
            'chat_id' => $chat_id,
            'text' => $text,
            'parse_mode' => $parse_mode,
            'disable_web_page_preview' => $disable_web_page_preview,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup,
        ], "sendMessage");
    }

    /**
     * @param string|integer $chat_id
     * @param string $from_chat_id
     * @param integer $message_id
     * @param bool $disable_notification
     */
    public static function forwardMessage($chat_id, $from_chat_id, $message_id, $disable_notification = false)
    {
        return self::request([
            'chat_id' => $chat_id,
            'from_chat_id' => $from_chat_id,
            'message_id' => $message_id,
            'disable_notification' => $disable_notification,
        ], "forwardMessage");
    }


    /**
     * @param $chat_id
     * @param $photo
     * @param null $caption
     * @param null $parse_mode
     * @param bool $disable_notification
     * @param null $reply_to_message_id
     * @param keyboard\Keyboard|null $reply_markup
     * @return mixed
     */
    public static function sendPhoto($chat_id, $photo, $caption = null, $parse_mode = null, $disable_notification = false, $reply_to_message_id = null, keyboard\Keyboard $reply_markup = null)
    {
        return self::request([
            'chat_id' => $chat_id,
            'photo' => $photo,
            'caption' => $caption,
            'parse_mode' => $parse_mode,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup,
        ], "sendPhoto");
    }


}