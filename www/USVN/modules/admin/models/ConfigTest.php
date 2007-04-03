<?php
/**
 * Model for configuration pages
 *
 * @author Team USVN <contact@usvn.info>
 * @link http://www.usvn.info
 * @license http://www.cecill.info/licences/Licence_CeCILL_V2-en.txt CeCILL V2
 * @copyright Copyright 2007, Team USVN
 * @since 0.5
 * @package admin
 * @subpackage config
 *
 * This software has been written at EPITECH <http://www.epitech.net>
 * EPITECH, European Institute of Technology, Paris - FRANCE -
 * This project has been realised as part of
 * end of studies project.
 *
 * $Id$
 */

// Call USVN_modules_admin_models_ConfigTest::main() if this source file is executed directly.
if (!defined("PHPUnit_MAIN_METHOD")) {
    define("PHPUnit_MAIN_METHOD", "USVN_modules_admin_models_ConfigTest::main");
}

require_once "PHPUnit/Framework/TestCase.php";
require_once "PHPUnit/Framework/TestSuite.php";

require_once 'www/USVN/autoload.php';

/**
 * Test class for USVN_modules_admin_models_Config.
 * Generated by PHPUnit_Util_Skeleton on 2007-03-26 at 17:42:45.
 */
class USVN_modules_admin_models_ConfigTest extends USVN_Test_Test {
    /**
     * Runs the test methods of this class.
     *
     * @access public
     * @static
     */
    public static function main() {
        require_once "PHPUnit/TextUI/TestRunner.php";

        $suite  = new PHPUnit_Framework_TestSuite("USVN_modules_admin_models_ConfigTest");
        $result = PHPUnit_TextUI_TestRunner::run($suite);
    }

	public function setUp()
	{
		define(USVN_CONFIG_FILE, 'tests/config.ini');
		define(USVN_CONFIG_SECTION, 'general');
		file_put_contents(USVN_CONFIG_FILE, "
		[general]
translation.locale = \"en_US\"
		");
	}

    public function testSetLanguage()
	{
		USVN_modules_admin_models_Config::setLanguage('fr_FR');
		$config = new USVN_Config(USVN_CONFIG_FILE, USVN_CONFIG_SECTION);
		$this->assertEquals($config->translation->locale, 'fr_FR');
    }

    public function testSetLanguageInvalid()
	{
		$ok = false;
		try
		{
			USVN_modules_admin_models_Config::setLanguage('tutu');
		}
		catch (Exception $e)
		{
			$ok = true;
		}
		$this->assertTrue($ok);
		$config = new USVN_Config(USVN_CONFIG_FILE, USVN_CONFIG_SECTION);
		$this->assertEquals($config->translation->locale, 'en_US');
    }
}

// Call USVN_modules_admin_models_ConfigTest::main() if this source file is executed directly.
if (PHPUnit_MAIN_METHOD == "USVN_modules_admin_models_ConfigTest::main") {
    USVN_modules_admin_models_ConfigTest::main();
}
?>
