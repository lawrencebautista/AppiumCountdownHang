<?php
// require_once "vendor/autoload.php";
define("APP_PATH", realpath(dirname(__FILE__).'/countdown.apk'));
if (!APP_PATH) {
	die("App did not exist!");
}
require_once('PHPUnit/Extensions/AppiumTestCase.php');
class ContextTests extends PHPUnit_Extensions_AppiumTestCase
{

	public function testFindText()
	{
		$el = $this->byAndroidUIAutomator('new UiSelector().text("Find this text!")');
		$this->assertNotNull($el);
		$this->assertEquals('PHPUnit_Extensions_AppiumTestCase_Element', get_class($el));

		$el = $this->byAndroidUIAutomator('new UiSelector().text("And this")');
		$this->assertNotNull($el);
		$this->assertEquals('PHPUnit_Extensions_AppiumTestCase_Element', get_class($el));

		$el = $this->byAndroidUIAutomator('new UiSelector().text("this too!")');
		$this->assertNotNull($el);
		$this->assertEquals('PHPUnit_Extensions_AppiumTestCase_Element', get_class($el));
	}

	public static $browsers = array(
		array(
			'local' => true,
			'port' => 4723,
			'browserName' => '',
			'desiredCapabilities' => array(
				'app' => APP_PATH,
				'platformName' => 'Android',
				'platformVersion' => '4.4',
				'deviceName' => 'Android Emulator'
			)
		)
	);
}
