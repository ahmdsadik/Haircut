<?php

namespace App\Enums;

enum AppointmentStatus: int
{
    case SCHEDULED = 1;
    case IN_PROGRESS = 2;
    case COMPLETED = 3;
    case CANCELLED = 4;
}
