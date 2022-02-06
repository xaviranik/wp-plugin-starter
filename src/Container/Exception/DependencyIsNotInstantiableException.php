<?php

namespace Author\WpPluginStarter\Container\Exception;

use Author\WpPluginStarter\Container\ContainerExceptionInterface;
use Exception;

class DependencyIsNotInstantiableException extends Exception implements ContainerExceptionInterface {
}
