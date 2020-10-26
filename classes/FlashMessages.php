<?php


class FlashMessages
{
    public static function displayAllMessages()
    {
        if (isset($_SESSION["flash_messages"])) {
            foreach ($_SESSION["flash_messages"] as $key => $flash_message) {
                $level = $flash_message["level"];
                $message = $flash_message["message"];

                echo '<div class="flashMessage ' . $level . '">
                        <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>
                        ' . $message . '
            </div>';

                unset($_SESSION["flash_messages"][$key]);

            }
        }
    }

    public static function containsError(): bool
    {
        foreach ($_SESSION["flash_messages"] as $key => $flash_message) {
            if ($key == "error") {
                return true;
            }
        }

        return false;
    }

    public static function info($text)
    {
        self::addMessage("info", $text);
    }

    public static function error($text)
    {
        self::addMessage("error", $text);
    }

    public static function warning($text)
    {
        self::addMessage("warning", $text);
    }


    public static function success($text)
    {
        self::addMessage("success", $text);
    }

    private static function addMessage($type, $text)
    {
        if (empty($_SESSION["flash_messages"])) {
            $_SESSION["flash_messages"] = array();
        }

        array_push($_SESSION["flash_messages"], array("level" => $type, "message" => $text));
    }
}