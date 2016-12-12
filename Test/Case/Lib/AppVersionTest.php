<?php

use OrcaServices\AppVersion;

/**
 * AppVersion Tests
 *
 * @coversDefaultClass OrcaServices\AppVersion
 */
class AppVersionTest extends CakeTestCase {

	/**
	 * Tests the get method
	 *
	 * @return void
	 * @covers ::get
	 */
	public function testGet() {
		$versionFile = APP . 'Config' . DS . 'VERSION.txt';
		$version = file($versionFile);
		$expected = trim(array_pop($version));
		$result = AppVersion::get();
		$this->assertSame($expected, $result);
	}

	/**
	 * Tests the get method
	 *
	 * @return void
	 * @covers ::get
	 */
	public function testGetNotExisting() {
		App::uses('File', 'Utility');

		$versionFile = APP . 'Config' . DS . 'VERSION.txt';
		$versionFileTemp = $versionFile . '_TEMP';
		$expectedMessage = sprintf('Version file not found at "%s".', $versionFile);

		rename($versionFile, $versionFileTemp);

		try {
			AppVersion::get();
		} catch(Exception $e) {
			$this->assertSame($expectedMessage, $e->getMessage());
		}

		rename($versionFileTemp, $versionFile);
	}
}