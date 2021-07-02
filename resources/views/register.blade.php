@include('header')
    <div class="container">
        <div class="row">
                <div class="card col-12">
                    <form action="{{ url('/signup') }}" method="POST">
                        @csrf
                            <div class="card-header col-12">
                                <h1 class="display-2 text-center">Регистрация</h1>
                            </div>
                            <div class="card-body col-12 flex-column d-flex justify-content-center">
                                <div class="col-12">
                                    @error('email')
                                    <p class="error">{{ $message }}</p>
                                    @enderror
                                    <label for="exampleInputEmail1">E-mail:</label>
                                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@mail.com">
                                </div>
                                <div>
                                    @error('first_name')
                                    <p class="error">{{ $message }}</p>
                                    @enderror
                                    <label for="first_name">Ваше имя:</label>
                                    <input name="first_name" type="text" class="form-control" id="first_name">
                                </div>
                                <div class="form-group">
                                    @error('last_name')
                                    <p class="error">{{ $message }}</p>
                                    @enderror
                                    <label for="last_name">Ваше имя:</label>
                                    <input name="last_name" type="text" class="form-control" id="last_name">
                                </div>
                                <div class="form-group">
                                    @error('password')
                                    <p class="error">{{ $message }}</p>
                                    @enderror
                                    <label for="password">Пароль</label>
                                    <input name="password" type="password" class="form-control" id="password" placeholder="*******">
                                </div>
                                <div class="form-group">
                                    @error('password_confirmed')
                                    <p class="error">{{ $message }}</p>
                                    @enderror
                                    <label for="password_confirmed">Повторите пароль:</label>
                                    <input name="password_confirmation" type="password" class="form-control" id="password_confirmed" placeholder="*******">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@include('footer')