<?php

namespace OrcaServices;

use \Exception;

/**
 * App Version Utility for CakePHP 2.x Applications
 *
 * Provides a function to get the application version number from VERSION.txt.
 */
class AppVersion {

	/**
	 * Get the app version specified in VERSION.txt
	 *
	 * @return string The app version.
	 * @throws Exception If version file was not found.
	 */
	public static function get() {
		$versionFile = APP . 'Config' . DS . 'VERSION.txt';
		if (!is_file($versionFile)) {
			throw new Exception(sprintf('Version file not found at "%s".', $versionFile));
		}

		$version = file($versionFile);
		$version = trim(array_pop($version));

		return $version;
	}

}