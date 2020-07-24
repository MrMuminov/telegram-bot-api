<?php


namespace mrmuminov\tgbot\keyboard;

/**
 * Class Keyboard
 * @author Bahriddin Mo'minov
 * @link darkshadeuz@gmail.com
 * @package mrmuminov\tgbot\keyboard
 */
class Keyboard
{
    /**
     * @var mixed $keyboard
     */
    public static $keyboard;
    /**
     * @var bool $resize_keyboard
     */
    public static $resize_keyboard;
    /**
     * @var bool $one_time_keyboard
     */
    public static $one_time_keyboard;
    /**
     * @var bool $selective
     */
    public static $selective;

    /**
     * Keyboard constructor.
     * @param mixed $keyboard
     * @param bool $resize_keyboard
     * @param bool $one_time_keyboard
     * @param bool $selective
     */
    public function __construct($keyboard, $resize_keyboard = false, $one_time_keyboard = false, $selective = false)
    {
        self::$keyboard = $keyboard;
        self::$resize_keyboard = $resize_keyboard;
        self::$one_time_keyboard = $one_time_keyboard;
        self::$selective = $selective;
    }

    /**
     * ```
     * $key = [
     *      [["This first Button, row first"], ["This second Button, row first"]]
     *      [["This first Button, row second"]]
     * ];
     * Keyboard::keyboard($key);
     * ```
     * @return string json encoded string returned
     */
    public static function keyboard($keyboards = null){
        if (is_null($keyboards)) {
            $keyboards = self::$keyboard;
        } else {
            $keyboards = self::$keyboard;
        }
        $result = [
            'keyboard' => [],
            'resize_keyboard' => self::$resize_keyboard,
            'one_time_keyboard' => self::$one_time_keyboard,
            'selective' => self::$selective,
        ];
        foreach ( $keyboards as $subkeys ) {
            $tmp = [];
            foreach ($subkeys as $key){
                $tmp[] = ['text' => $key];
            }
            $result['keyboard'][] = $tmp;
        }
        return json_encode($result);
    }

    /**
     * ```
     * $key = [
     *      [['call_data_1_1' => "This first Button, row first"], ['call_data_1_2' => "This second Button, row first"]]
     *      [['call_data_2_1' => "This first Button, row second"], ['call_data_2_2' => "This second Button, row second"]]
     *      [['url' => ["My Github.com profile", "https://github.com/MrMuminov"]]]
     * ];
     * Keyboard::inline($key);
     * ```
     * @return string json encoded string returned
     */
    public static function inline($keyboards = null){
        if (is_null($keyboards)) {
            $keyboards = self::$keyboard;
        } else {
            $keyboards = self::$keyboard;
        }
        $result = [
            'inline_keyboard' => [],
        ];
        foreach ( $keyboards as $subkeys ) {
            $tmp = [];
            foreach ($subkeys as $key => $value){
                if ($key === "url") {
                    $tmp[] = ['text' => $value[0], 'callback_data' => $value[1]];
                } else {
                    $tmp[] = ['text' => $value, 'callback_data' => $key];
                }
            }
            $result['inline_keyboard'][] = $tmp;
        }
        return json_encode($result);
    }

    /**
     * @return mixed
     */
    public static function getKeyboard()
    {
        return self::$keyboard;
    }

    /**
     * @param mixed $keyboard
     */
    public static function setKeyboard($keyboard)
    {
        self::$keyboard = $keyboard;
    }

    /**
     * @return bool
     */
    public static function isResizeKeyboard()
    {
        return self::$resize_keyboard;
    }

    /**
     * @param bool $resize_keyboard
     */
    public static function setResizeKeyboard($resize_keyboard)
    {
        self::$resize_keyboard = $resize_keyboard;
    }

    /**
     * @return bool
     */
    public static function isOneTimeKeyboard()
    {
        return self::$one_time_keyboard;
    }

    /**
     * @param bool $one_time_keyboard
     */
    public static function setOneTimeKeyboard($one_time_keyboard)
    {
        self::$one_time_keyboard = $one_time_keyboard;
    }

    /**
     * @return bool
     */
    public static function isSelective()
    {
        return self::$selective;
    }

    /**
     * @param bool $selective
     */
    public static function setSelective($selective)
    {
        self::$selective = $selective;
    }
}