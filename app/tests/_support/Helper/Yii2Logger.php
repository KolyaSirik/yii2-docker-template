<?php
namespace Helper;

use Codeception\Util\Debug;
use Psr\Log\LogLevel;
use yii\db\Exception;
use yii\log\Logger;

class Yii2Logger extends Logger
{
    public function init()
    {
        // overridden to prevent register_shutdown_function
    }

    public function log($level, $message, array $context = array())
//    public function log($message, $level, $category = 'application')
    {
        if (!in_array($level, [
            LogLevel::INFO,
            LogLevel::WARNING,
            LogLevel::ERROR,
        ])) {
            return;
        }

        if (!isset($context['category'])) {
            $context['category'] = 'application';
        }

        if (strpos($context['category'], 'yii\db\Command')===0) {
            return; // don't log queries
        }

        // https://github.com/Codeception/Codeception/issues/3696
        if ($message instanceof Exception) {
            $message = $message->__toString();
        }

        Debug::debug("[{$context['category']}] " .  \yii\helpers\VarDumper::export($message));
    }
}
