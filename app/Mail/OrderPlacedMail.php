<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderPlacedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order information.
     */
    public array $order;

    /**
     * Flag whether email is for customer or admin.
     */
    public bool $isCustomer;

    /**
     * Create a new message instance.
     */
    public function __construct(array $order, bool $isCustomer = false)
    {
        $this->order = $order;
        $this->isCustomer = $isCustomer;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = $this->isCustomer
            ? 'Order Confirmation - ' . $this->order['order_number'] . ' | ' . config('site.name', 'LuxeHair by Aisha')
            : 'New Order Received - ' . $this->order['order_number'];

        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.order-placed',
            with: [
                'order' => $this->order,
                'isCustomer' => $this->isCustomer,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}