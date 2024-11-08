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

    #[Description('PENDING')]
    const pending = 1;

    #[Description('APPROVED')]
    const approved = 2;

    #[Description('REVISION')]
    const revisi = 3;


}