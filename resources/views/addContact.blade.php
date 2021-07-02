<div class="container">
    <div class="row">
        <div class="card col-12">
            <form action="{{ url('/add-contact') }}" method="POST">
                @csrf
                <div class="card-header col-12">
                    <h1 class="display-2 text-center">Добавить контакт</h1>
                </div>
                <div class="card-body col-12 flex-column d-flex justify-content-center">
                    @if( session('success') )
                        <p class="success">{{ session('success') }}</p>
                    @endif
                    <div class="col-12">
                        @error('name')
                        <p class="error">{{ $message }}</p>
                        @enderror
                        <label for="name">Имя:</label>
                        <input name="name" type="name" class="form-control" id="name" aria-describedby="emailHelp">
                    </div>
                    <div>
                        @error('phone')
                        <p class="error">{{ $message }}</p>
                        @enderror
                        <label for="phone">Телефон:</label>
                        <input name="phone" type="text" class="form-control" id="phone">
                    </div>
                </div>
        </div>
        <div class="card-footer d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Добавить</button>
        </div>
        </form>
    </div>
</div>

</div>
</div>