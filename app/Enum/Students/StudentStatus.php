<?php

namespace App\Enum\Students;

use BenSampo\Enum\Enum;

final class StudentStatus extends Enum
{
  const Active = '1';
  const Inactive = '2';
  const Pending = '3';

  // public static function getListStatus(): array
  // {
  //   return [
  //     ['label' =>  'Active', 'value' => self::Active],
  //     ['label' =>  'Inactive', 'value' => self::Inactive],
  //     ['label' =>  'Pending', 'value' => self::Pending],
  //   ];
  // }
}
