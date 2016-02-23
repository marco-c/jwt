<?php
/**
 * This file is part of Lcobucci\JWT, a simple library to handle JWT and JWS
 *
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

declare(strict_types=1);

namespace Lcobucci\JWT;

use Lcobucci\JWT\Validation\Result;

/**
 * @author Luís Otávio Cobucci Oblonczyk <lcobucci@gmail.com>
 * @author Danny Dörfel <danny.dorfel@gmail.com>
 * @author Marco Piveta <ocramius@gmail.com>
 * @author Henrique Moody <henriquemoody@gmail.com>
 *
 * @since 4.0.0
 */
interface Validator
{
    public function validate(Token $token): Result;
}
