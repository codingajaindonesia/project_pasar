<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendInvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $transaction;

    /**
     * Create a new message instance.
     */
    public function __construct($transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        if ($this->transaction->status == 'paid') {
            return $this->subject('Lunas Invoice #' . $this->transaction->invoice )
            ->view('emails.invoice_paid')
            ->with([
                'transaction' => $this->transaction,
            ]);
        }else{
            return $this->subject('Tagihan Invoice #' . $this->transaction->invoice )
            ->view('emails.invoice_unpaid')
            ->with([
                'transaction' => $this->transaction,
            ]);
        }
     
    }
}