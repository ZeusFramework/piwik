<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */

namespace Piwik\Updates;

use Piwik\Config;
use Piwik\Piwik;
use Piwik\Updates;

/**
 */
class Updates_1_1 extends Updates
{
    static function update()
    {
        $config = Config::getInstance();

        $rootLogin = $config->superuser['login'];
        try {
            // throws an exception if invalid
            Piwik::checkValidLoginString($rootLogin);
        } catch (\Exception $e) {
            throw new \Exception('Superuser login name "' . $rootLogin . '" is no longer a valid format. '
                . $e->getMessage()
                . ' Edit your config/config.ini.php to change it.');
        }
    }
}
