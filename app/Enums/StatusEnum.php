<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Attributes\Description;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StatusEnum extends Enum
{

    #[Description('pending')]
    const pending = 0;

    #[Description('approved')]
    const approved = 1;

    #[Description('revisi')]
    const revisi = 2;


}