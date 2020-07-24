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
     * @param string|integer $chat_id
     * @param string $text
     * @param string $parse_mode
     * @param bool $disable_web_page_preview
     * @param bool $disable_notification
     * @param bool $reply_to_message_id
     * @param bool $reply_markup
     */
    public static function sendMessage($chat_id, $text, $parse_mode = "", $disable_web_page_preview = false, $disable_notification = false, $reply_to_message_id = false, $reply_markup = false)
    {
        self::request([
            'chat_id' => $chat_id,
            'text' => $text,
            'parse_mode' => $parse_mode,
            'disable_web_page_preview' => $disable_web_page_preview,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup,
        ]);
    }
}