<?php

    namespace App\Mail;

    use Illuminate\Mail\Mailable;

    class ContactMail extends Mailable
    {
        public $data;

        /**
         * Create a new message instance.
         *
         * @param $data
         */
        public function __construct($data)
        {
            $this->data = $data;
        }

        public function build(): ContactMail
        {
            return $this->from('zbogoevski@gmail.com')->markdown('emails.contact');
        }
    }