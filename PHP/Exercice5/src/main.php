<?php

require_once __DIR__.'/DimensionalMath/Distance/DistanceCalculation.php';
require_once __DIR__.'/DimensionalMath/Vector/AngleCalculation.php';

use function Distance\threeDimensionDistance;
use function Angle\getVectorAngle;

$distance = threeDimensionDistance(
    [1, 1, 1],
    [2, 2, 2]
);

$angle = getvectorAngle([1, 6], [3, 12]);
