<h1>Здравствуйте, {{ Auth::user()->name }}!</h1>
<h2>Ваши данные:</h2>
<ul>
    <li><strong>Имя:</strong> {{ Auth::user()->name }}</li>
    <li><strong>Email:</strong> {{ Auth::user()->email }}</li>
    <li><strong>Дата регистрации:</strong> {{ Auth::user()->created_at->format('d.m.Y H:i') }}</li>
</ul>
{{--<forms method="POST" action="{{ route('logout') }}">--}}
{{--    @csrf--}}
{{--    <button type="submit">Выйти</button>--}}
{{--</forms>--}}
