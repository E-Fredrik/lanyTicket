<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="x-apple-disable-message-reformatting">
        <title>LANY | Registration confirmation</title>
    </head>
    @php
        $unitPrice = $registration->ticket_type === 'premium' ? 148 : 88;
        $ticketTotal = $unitPrice * $registration->quantity;
        $bookingReference = sprintf('LNY-%06d', $registration->id);
        $ticketLabel = ucfirst($registration->ticket_type);
    @endphp
    <body style="margin:0; padding:0; background-color:#f3f2ee; font-family:Arial, Helvetica, sans-serif; color:#171a2d;">
        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f3f2ee; padding:32px 12px;">
            <tr>
                <td align="center">
                    <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="width:100%; max-width:600px; background-color:#ffffff; border:1px solid #dedee3;">

                        {{-- Header --}}
                        <tr>
                            <td style="background-color:#171a2d; padding:28px 32px;">
                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td style="font-family:Georgia, 'Times New Roman', serif; font-size:26px; color:#ffffff;">
                                            LANY<span style="color:#ff8178;">.</span>
                                        </td>
                                        <td align="right" style="font-size:12px; letter-spacing:1px; text-transform:uppercase; color:#c9b9ff;">
                                            Registration confirmation
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        {{-- Title and greeting --}}
                        <tr>
                            <td style="padding:32px 32px 8px 32px;">
                                <p style="margin:0 0 8px 0; font-size:12px; letter-spacing:1px; text-transform:uppercase; color:#66697b;">Booking confirmed</p>
                                <h1 style="margin:0 0 16px 0; font-family:Georgia, 'Times New Roman', serif; font-size:28px; font-weight:normal; color:#171a2d;">
                                    Thank you, {{ $registration->full_name }}.
                                </h1>
                                <p style="margin:0; font-size:15px; line-height:1.6; color:#171a2d;">
                                    Your tickets for LANY live in Singapore are reserved. Please keep this email as your confirmation and present your booking reference at the venue.
                                </p>
                            </td>
                        </tr>

                        {{-- Booking reference --}}
                        <tr>
                            <td style="padding:24px 32px 0 32px;">
                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border:1px dashed #171a2d; background-color:#fbfaf7;">
                                    <tr>
                                        <td align="center" style="padding:18px;">
                                            <p style="margin:0 0 6px 0; font-size:11px; letter-spacing:1px; text-transform:uppercase; color:#66697b;">Booking reference</p>
                                            <p style="margin:0; font-family:'Courier New', Courier, monospace; font-size:22px; font-weight:bold; letter-spacing:2px; color:#171a2d;">{{ $bookingReference }}</p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        {{-- Booking details --}}
                        <tr>
                            <td style="padding:28px 32px 8px 32px;">
                                <p style="margin:0 0 12px 0; font-size:13px; letter-spacing:1px; text-transform:uppercase; color:#66697b;">Booking details</p>
                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="font-size:15px; border-collapse:collapse;">
                                    <tr>
                                        <td style="padding:12px 0; border-bottom:1px solid #dedee3; color:#66697b; width:40%;">Booked by</td>
                                        <td style="padding:12px 0; border-bottom:1px solid #dedee3; font-weight:bold; text-align:right;">{{ $registration->full_name }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:12px 0; border-bottom:1px solid #dedee3; color:#66697b;">Email</td>
                                        <td style="padding:12px 0; border-bottom:1px solid #dedee3; text-align:right; word-break:break-all;">{{ $registration->email }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:12px 0; border-bottom:1px solid #dedee3; color:#66697b;">Ticket type</td>
                                        <td style="padding:12px 0; border-bottom:1px solid #dedee3; text-align:right;">{{ $ticketLabel }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:12px 0; border-bottom:1px solid #dedee3; color:#66697b;">Quantity</td>
                                        <td style="padding:12px 0; border-bottom:1px solid #dedee3; text-align:right;">{{ $registration->quantity }} {{ Str::plural('ticket', $registration->quantity) }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:12px 0; color:#66697b;">Total</td>
                                        <td style="padding:12px 0; text-align:right; font-weight:bold;">SGD {{ number_format($ticketTotal) }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        {{-- Event details --}}
                        <tr>
                            <td style="padding:24px 32px 8px 32px;">
                                <p style="margin:0 0 12px 0; font-size:13px; letter-spacing:1px; text-transform:uppercase; color:#66697b;">Event</p>
                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="font-size:15px;">
                                    <tr>
                                        <td style="padding:6px 0; color:#66697b; width:40%;">Venue</td>
                                        <td style="padding:6px 0; text-align:right;">Indoor Stadium, Singapore</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:6px 0; color:#66697b;">Date</td>
                                        <td style="padding:6px 0; text-align:right;">Saturday, 17 October 2026</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:6px 0; color:#66697b;">Doors open</td>
                                        <td style="padding:6px 0; text-align:right;">6:30 PM</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        {{-- Notes --}}
                        <tr>
                            <td style="padding:24px 32px 32px 32px;">
                                <p style="margin:0; font-size:13px; line-height:1.6; color:#66697b;">
                                    This is an automated confirmation. Please do not reply to this email. Tickets are non-transferable unless stated otherwise. Keep this email for your records.
                                </p>
                            </td>
                        </tr>

                        {{-- Footer --}}
                        <tr>
                            <td style="background-color:#fbfaf7; border-top:1px solid #dedee3; padding:18px 32px; font-size:12px; color:#66697b; text-align:center;">
                                LANY World Tour &middot; Singapore &middot; All ages welcome
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
