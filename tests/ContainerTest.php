<?php

namespace Like\NomeDaLib\Tests;

use Illuminate\Container\Psr11\Container;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

class NomeDaLibTest extends TestCase {
	public function testInstance() {
		$this->assertInstanceOf(ContainerInterface::class, Container::getInstance());
	}
}
