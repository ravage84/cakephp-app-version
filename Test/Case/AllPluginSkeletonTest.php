<?php

/**
 * All AppVersion plugin tests
 */
class AppVersionTest extends CakeTestCase {

	/**
	 * Suite define the tests for this plugin
	 *
	 * @return CakeTestSuite A test suite to execute.
	 */
	public static function suite() {
		$suite = new CakeTestSuite('All PLUGIN_NAME test');

		$path = CakePlugin::path('AppVersion') . 'Test' . DS . 'Case' . DS;
		$suite->addTestDirectoryRecursive($path);

		return $suite;
	}

}
