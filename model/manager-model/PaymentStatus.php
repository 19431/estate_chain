<?php
/**
 * Created by PhpStorm.
 * User: ooni1
 * Date: 4/4/2018
 * Time: 2:16 AM
 */
//enum class for restricting payment status options
class PaymentStatus extends SplEnum {
    const __default = self::pending;
    const success = 1;
    const pending = 2;
    const failed = 3;
    const cancelled = 4;

}