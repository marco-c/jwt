<?php
/**
 * This file is part of Lcobucci\JWT, a simple library to handle JWT and JWS
 *
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

declare(strict_types=1);

namespace Lcobucci\JWT\Validation;

use Lcobucci\JWT\Validation\Constraint\GreaterOrEqualsTo;
use Lcobucci\JWT\Validation\Constraint\LesserOrEqualsTo;

/**
 * @author Luís Otávio Cobucci Oblonczyk <lcobucci@gmail.com>
 *
 * @since 4.0.0
 */
final class ValidatorBuilder
{
    /**
     * @var Constraint[]
     */
    private $constraints;

    public function __construct(int $currentTime = null)
    {
        $currentTime = $currentTime ?: time();

        $this->constraints = [
            'exp' => new GreaterOrEqualsTo($currentTime),
            'iat' => new LesserOrEqualsTo($currentTime)
        ];

        $this->constraints['nbf'] = $this->constraints['iat'];
    }

    public function assertThat(string $claim, Constraint $constraint)
    {
        $this->constraints[$claim] = $constraint;
    }

    public function getValidator(): Validator
    {
        return new Validator($this->constraints);
    }
}
