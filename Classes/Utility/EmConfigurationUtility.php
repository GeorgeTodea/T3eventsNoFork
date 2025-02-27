<?php
namespace DWenzel\T3events\Utility;

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use DWenzel\T3events\Domain\Model\Dto\EmConfiguration;

/**
 * Class EmConfigurationUtility
 *
 * @package DWenzel\T3events\Utility
 */
class EmConfigurationUtility
{

    /**
     * Gets the settings from extension manager
     *
     * @return EmConfiguration
     * @throws \BadFunctionCallException
     */
    public static function getSettings(): EmConfiguration
    {
        $configuration = self::parseSettings();
        require_once ExtensionManagementUtility::extPath('t3events') . 'Classes/Domain/Model/Dto/EmConfiguration.php';
        return new EmConfiguration($configuration);
    }

    /**
     * Parse settings and return it as array
     *
     * @return array un-serialized settings from extension manager
     */
    public static function parseSettings()
    {
        return $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['t3events'] ?? [];
    }
}
