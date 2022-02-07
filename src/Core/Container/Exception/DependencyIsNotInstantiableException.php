<?php

namespace Author\WpPluginStarter\Core\Container\Exception;

use Exception;
use Author\WpPluginStarter\Core\Container\ContainerExceptionInterface;

class DependencyIsNotInstantiableException extends Exception implements ContainerExceptionInterface {
}
