@include('header')
<div class="container">
    <div class="row">
        <div class="card col-12">
            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <div class="card-header col-12">
                    <h1 class="display-2 text-center">Авторизация</h1>
                </div>
                <div class="card-body col-12 flex-column d-flex justify-content-center">
                    <div class="col-12">
                        @error('email')
                        <p class="error">{{ $message }}</p>
                        @enderror
                        <label for="exampleInputEmail1">E-mail:</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@mail.com">
                    </div>
                    <div class="form-group">
                        @error('password')
                        <p class="error">{{ $message }}</p>
                        @enderror
                        <label for="password">Пароль</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="*******">
                    </div>
                </div>
        </div>
        <div class="card-footer d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Войти</button>
            <a href="{{ url('signup') }}" class="btn btn-success">Зарегистрироваться</a>
        </div>
        </form>
    </div>
</div>

</div>
</div>
@include('footer')