<?php

namespace Author\WpPluginStarter\Container\Exception;

use Exception;
use Author\WpPluginStarter\Container\NotFoundExceptionInterface;

class DependencyHasNoDefaultValueException extends Exception implements NotFoundExceptionInterface {
}
