<div>
    <div class="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="section-heading text-center">
                        <h6>| Contact Us</h6>
                        <h2>Get In Touch With Our Agents</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8" style="margin-bottom: 3em;">
                    <form id="contact-form" wire:submit.prevent="create">
                        <div class="row">
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="name">Name</label>
                                    <input type="text" id="name" wire:model="user.name" placeholder="Your Name..." required>

                                </fieldset>
                                @error('user.name') <span class="text-xs text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="name">Last Name</label>
                                    <input type="text" id="last-name" wire:model="user.last_name" placeholder="Your Last Name..." required>

                                </fieldset>
                                @error('user.last_name') <span class="text-xs text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="email">Email Address</label>
                                    <input type="text" id="email" wire:model="user.email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..." required="">
                                </fieldset>
                                @error('user.email') <span class="text-xs text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="password">Password</label>
                                    <input type="password" id="password" wire:model="user.password"  placeholder="Password...">
                                </fieldset>
                                @error('user.password') <span class="text-xs text-danger">{{ $message }}</span> @enderror
                            </div>
                            {{-- QR --}}
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="title">Title</label>
                                    <input type="text" wire:model="hub.title" id="title" placeholder="Your title">
                                </fieldset>
                                @error('hub.title') <span class="text-xs text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="description">Description</label>
                                    <input type="text" wire:model="hub.description" id="description" placeholder="Your description">
                                </fieldset>
                                @error('hub.description') <span class="text-xs text-danger">{{ $message }}</span> @enderror

                            </div>

                            {{-- Location --}}
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="country">Country</label>
                                    <input type="text" wire:model="user.country" id="country" placeholder="Your country">
                                </fieldset>
                                @error('user.country') <span class="text-xs text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="state">State</label>
                                    <input type="text" wire:model="user.state" id="state" placeholder="Your state">
                                </fieldset>
                                @error('user.state') <span class="text-xs text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="city">City</label>
                                    <input type="text" wire:model="user.city" id="city" placeholder="Your city">
                                </fieldset>
                                @error('user.city') <span class="text-xs text-danger">{{ $message }}</span> @enderror
                            </div>

                            {{-- Submit --}}
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="orange-button">Send Message</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(!empty($qrCodes))
    @foreach ($qrCodes as $qr)
    {{ $qr }}
    @endforeach
    @endif


</div>
