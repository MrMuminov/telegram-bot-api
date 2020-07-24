<?php


namespace mrmuminov\tgbot;

/**
 * Class BaseBot
 * @author Bahriddin Mo'minov
 * @link darkshadeuz@gmail.com
 * @package mrmuminov\tgbot
 */
class BaseBot
{
    /**
     * @const string parse mode
     */
    const PARSE_HTML = "html";
    /**
     * @const string parse mode
     */
    const PARSE_MARKDOWN = "markdown";

    /**
     * @var string API TOKEN
     */
    private static $token;
    /**
     * @var mixed get updates
     */
    public static $update;

    /**
     * TgBot constructor.
     * @param mixed $token BOT API TOKEN
     */
    public function __construct( $token )
    {
        self::setToken($token);
        self::setUpdate(json_decode(file_get_contents("php://input")));
        return parent::__construct();
    }

    /**
     * @param array $options
     * @param string $method
     * @return mixed
     */
    protected static function request($options, $method = 'sendMessage')
    {
        $url = "https://api.telegram.org/bot".self::$token."/".$method;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$options);
        $response = curl_exec($ch);
        if (curl_error($ch)) {
            return  curl_error($ch);
        }
        return json_decode($response);
    }

    /**
     * @return mixed
     */
    public static function getToken()
    {
        return self::$token;
    }

    /**
     * @param boolean $token
     */
    public static function setToken($token)
    {
        return self::$token = $token;
    }

    /**
     * @return mixed
     */
    public static function getUpdate()
    {
        return self::$update;
    }

    /**
     * @param boolean $update
     */
    public static function setUpdate(mixed $update)
    {
        return self::$update = $update;
    }
}