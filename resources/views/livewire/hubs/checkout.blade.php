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
                                    <label for="email">Email Address</label>
                                    <input type="text" id="email" wire:model="user.email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..." required="">
                                </fieldset>
                                @error('user.email') <span class="text-xs text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-lg-6">
                                <a href="{{ url('paypal') }}" class="bg-white border rounded text-blue-500 hover:text-blue-800 font-semibold py-2 px-4">PayPal</a>
                            </div>

                            {{-- Submit --}}
                            <div class="col-lg-12 center">
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

    @if(!empty($qrCode))
    {{ $qrCode }}
    @endif


</div>
