<x-base-layout>
    <h1>Checkout</h1>

    <form action="{{ route('hub.create') }}">
        @csrf

        <label for="test">Test</label>
        <input type="text" name="test" id="test" class="field-input">

        <button type="submit">Submit</button>
    </form>
</x-base-layout>
