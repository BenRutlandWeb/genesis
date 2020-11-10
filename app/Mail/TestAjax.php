<?php

namespace App\Mail;

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
class TestAjax extends Mailable
{
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return \Genesis\Mail\Mailable
     */
    public function build(): Mailable
    {
        return $this->subject('test ajax')->view('emails.message');
    }
}
