<?php namespace RancherizePhp73;

use Rancherize\Blueprint\Infrastructure\Service\Maker\PhpFpm\AlpineDebugImageBuilder;
use Rancherize\Blueprint\Infrastructure\Service\Maker\PhpFpm\PhpFpmMaker;
use Rancherize\Plugin\Provider;
use Rancherize\Plugin\ProviderTrait;
use RancherizePhp56\PhpVersion\Php56;

/**
 * Class Php56Provider
 * @package RancherizePhp56
 */
class Php56Provider implements Provider {

	use ProviderTrait;

	/**
	 */
	public function register() {
		$this->container[Php56::class] = function($c) {
			return new Php56( $c[AlpineDebugImageBuilder::class] );
		};
	}

	/**
	 */
	public function boot() {
		/**
		 * @var PhpFpmMaker $fpmMaker
		 */
		$fpmMaker = $this->container[PhpFpmMaker::class];

		$fpmMaker->addVersion( $this->container[Php56::class] );
	}
}