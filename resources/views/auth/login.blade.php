<x-layout>
    <h1 class="title">Login</h1>
    <div class="mx-auto max-w-screen-sm card">
        <form action="{{route('login')}}" method="post">
            @csrf
           
            <div class="mb-4">
                <label for="email">Email</label>
                <input type="text" name="email" value="{{old('email')}}" class="input">
                @error('email')
                <p class="error">
                    {{$message}}
                </p>
                @enderror
            </div>
            <div class="mb-8">
                <label for="password">Password</label>
                <input type="password" name="password" class="input">
                @error('password')
                <p class="error">
                    {{$message}}
                </p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="checkbox" class="inline-flex ">
                    <input type="checkbox" id="checkbox" class="mr-2">
                    Remember me
                  </label>
            </div>
            @error('failed')
                <p class="error">
                    {{$message}}
                </p>
                @enderror
            <button class="primary-btn">Login</button>
        </form>
    </div>
</x-layout>
