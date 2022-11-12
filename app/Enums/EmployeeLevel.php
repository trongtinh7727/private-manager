<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class EmployeeLevel extends Enum
{
    public const Supper_Admin = 0;
    public const Admin = 1;
    public const Mod = 2;
}
