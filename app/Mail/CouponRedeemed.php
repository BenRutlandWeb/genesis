<?php

namespace App\Mail;

use App\Models\Coupon;
use Genesis\Mail\Mailable;

/**
 * Bulid an email
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class CouponRedeemed extends Mailable
{
    /**
     * The coupon that was redeemed
     *
     * @var \App\Models\Coupon
     */
    public $coupon;

    /**
     * Create a new message instance.
     *
     * @param \App\Models\Coupon $coupon
     *
     * @return void
     */
    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }

    /**
     * Build the message.
     *
     * @return \Genesis\Mail\Mailable
     */
    public function build(): Mailable
    {
        return $this->subject("{$this->coupon->title} coupon redeemed")
            ->view('emails.coupon.redeemed');
    }
}
