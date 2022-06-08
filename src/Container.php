<?php

namespace Illuminate\Container\Psr11;

use Illuminate\Container\Container as IlluminateContainer;
use Psr\Container\ContainerInterface;
use ReflectionClass;

class Container extends IlluminateContainer implements ContainerInterface {

	/**
	 * @inheritDoc
	 */
	public function get($id) {
		return $this->make($id);
	}

	/**
	 * @inheritDoc
	 */
	public function has($id) {
		return $this->bound($id);
	}

	/**
	 * Checks if the included version implements the interface, if it does not return an implemented instance.
	 *
	 * @return IlluminateContainer
	 */
	public static function getInstance() {
		if (self::isPsr11()) {
			return IlluminateContainer::getInstance();
		}

		if (is_null(static::$instance)) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	/**
	 * Checks if the included version implements the interface.
	 *
	 * @return boolean
	 */
	private static function isPsr11() {
		$reflect = new ReflectionClass(IlluminateContainer::class);
		return $reflect->implementsInterface(ContainerInterface::class);
	}
}
