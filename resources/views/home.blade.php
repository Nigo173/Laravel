<x-layout>

    <h1>Home Here</h1>

    @auth

    <h1>Login11</h1>
    @endauth

    @guest
        <h1>Guest</h1>
    @endguest
</x-layout>
