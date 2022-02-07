<?php

namespace Author\WpPluginStarter\Core\Container\Exception;

use Exception;
use Author\WpPluginStarter\Core\Container\NotFoundExceptionInterface;

class DependencyHasNoDefaultValueException extends Exception implements NotFoundExceptionInterface {
}
