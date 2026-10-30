<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Reserve your tickets for LANY live in Singapore.">
        <title>LANY | ticket reservation</title>

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body>
        <main class="ticket-page">
            <section class="event-panel" aria-labelledby="event-title">
                <nav class="site-nav" aria-label="Main navigation">
                    <a class="wordmark" href="/" aria-label="LANY home">LANY<span>.</span></a>
                    <span class="nav-note">live / 2025</span>
                </nav>

                <div class="event-content">
                    <p class="eyebrow">LANY's world tour</p>
                    <h1 id="event-title">a beautiful<br><em>blur</em> of a night.</h1>
                    <p class="event-intro">One night of soft lights, loud hearts, and the songs that stay with you.</p>

                    <div class="event-details" aria-label="Event details">
                        <div>
                            <span class="detail-label">Singapore</span>
                            <strong>Indoor Stadium</strong>
                        </div>
                        <div>
                            <span class="detail-label">Saturday, 17 October 2026</span>
                            <strong>Doors open 6:30 PM</strong>
                        </div>
                    </div>
                </div>

                <div class="panel-footer">
                    <span>Presented by LANY</span>
                    <span aria-hidden="true">✦</span>
                    <span>All ages welcome</span>
                </div>
            </section>

            <section class="form-panel" aria-labelledby="form-title">
                <div class="form-heading">
                    <p class="eyebrow">Your night starts here</p>
                    <h2 id="form-title">Reserve tickets</h2>
                    <p>Choose your seats and leave your details below. This is a frontend demo, so no payment will be processed.</p>
                </div>

                <form action="{{ route('registrations.store') }}" method="post">
                    @csrf

                    <fieldset class="ticket-options">
                        <legend>Choose your ticket</legend>
                        <div class="ticket-grid">
                            <label class="ticket-card">
                                <input type="radio" name="ticket_type" value="standard" checked>
                                <span class="ticket-card-content">
                                    <span class="ticket-name">Standard</span>
                                    <span class="ticket-description">General admission</span>
                                    <strong>$88 <small>SGD</small></strong>
                                </span>
                                <span class="radio-mark" aria-hidden="true"></span>
                            </label>
                            <label class="ticket-card">
                                <input type="radio" name="ticket_type" value="premium">
                                <span class="ticket-card-content">
                                    <span class="ticket-name">Premium</span>
                                    <span class="ticket-description">Priority entry + merch</span>
                                    <strong>$148 <small>SGD</small></strong>
                                </span>
                                <span class="radio-mark" aria-hidden="true"></span>
                            </label>
                        </div>
                    </fieldset>

                    <div class="form-row">
                        <div class="field-group">
                            <label for="quantity">Quantity</label>
                            <select id="quantity" name="quantity">
                                <option value="1">1 ticket</option>
                                <option value="2">2 tickets</option>
                                <option value="3">3 tickets</option>
                                <option value="4">4 tickets</option>
                            </select>
                        </div>
                        <div class="field-group">
                            <label for="email">Email address</label>
                            <input id="email" name="email" type="email" placeholder="you@example.com" autocomplete="email" required>
                        </div>
                    </div>

                    <div class="field-group">
                        <label for="full-name">Full name</label>
                        <input id="full-name" name="full_name" type="text" placeholder="Your name" autocomplete="name" required>
                    </div>

                    <label class="check-row">
                        <input type="checkbox" name="updates" value="yes">
                        <span class="check-box" aria-hidden="true"></span>
                        <span>Keep me posted about LANY shows and releases.</span>
                    </label>

                    <button type="submit">
                        <span>Continue to review</span>
                        <span class="button-arrow" aria-hidden="true">↗</span>
                    </button>
                    <p class="form-footnote">By continuing, you agree to the event terms and privacy policy.</p>
                </form>
            </section>
        </main>
    </body>
</html>
