@include('header')
<nav class="p-4 navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}">Панель управления</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('logout')  }}">Выйти из аккаунта</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('my-contacts') }}">Мои контакты</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="row p-4">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Контакт</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach ( $contacts as $contact )
                <tr>
                    <th scope="row">{{ $contact['id'] }}</th>
                    <td>{{ $contact['name'] }}</td>
                    <td>{{ $contact['phone'] }}</td>
                    <td>
                        @if ( array_search($contact['id'], $favoriteContacts) === false)
                            <a href="{{ url("/take-contact/$contact[id]") }}" class="btn btn-success">Добавить в избранное</a>
                        @else
                            <a href="{{ url("/delete-contact/$contact[id]") }}" class="btn btn-danger">Удалить из избранного</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>

@include('addContact')
@include('footer')

