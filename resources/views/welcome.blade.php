<x-layouts.app>
    @auth
        Main page for auth {{ auth()->user()->username }} ::: {{ auth()->user()->email }}
    @endauth

    @guest
        Main page for quest
    @endguest
</x-layouts.app>
