<x-guest-layout>
    <dl>
        <dt>{{ $product->name }}</dt>
        <dd>{{ $product->category->name }}</dd>
        <dd>{{ $product->price }}</dd>
        <dd>{{ $product->detail }}</dd>
    </dl>
</x-guest-layout>
