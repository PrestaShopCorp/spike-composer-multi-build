<?php

namespace Sbidault\ComposerMultiBuild\Infrastructure\HttpClient\Guzzle7\Exceptions;

use Http\Client\Exception;

final class UnexpectedValueException extends \UnexpectedValueException implements Exception
{
}
