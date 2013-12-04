<?php
namespace Ticketing;

use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Platforms\AbstractPlatform;

/**
 * My custom datatype.
 */
class SeatNumberType extends StringType
{
    const SEATNUMBER = 'seatnumber'; // modify to match your type name

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new SeatNumber((int)$value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return (string)$value->getValue();
    }

    public function getName()
    {
        return self::SEATNUMBER;
    }
}
