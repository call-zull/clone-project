<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Attributes\Description;
use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class RoleEnum extends Enum
{
    #[Description('mentor')]
    const mentor = "mentor";

    #[Description('admin')]
    const admin = "admin";

    #[Description('dosen')]
    const dosen = "dosen";

    #[Description('mahasiswa')]
    const mahasiswa = "mahasiswa";
}
