<x-app-layout>
    <section id="contact-us" class="container">
        <h1 class="py-3 text-lg">Создать новую запись!</h1>
        @include('includes.flash-message')
        <!-- Contact Form -->
        <div>
            <form action="{{ route('admin.news.store') }}" class="flex flex-col" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Title -->
                <x-label for="title"><span>Заголовок</span></x-label>
                <x-input type="text" id="title" name="title" value="{{ old('title') }}" />
                @error('title')
                {{-- The $attributeValue field is/must be $validationRule --}}
                <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                @enderror
                <!-- Image -->
                <x-label for="img_prev" class="pt-5"><span>Изображение</span></x-label>
                <input type="file" id="img_prev" name="img_prev" />
                @error('image')
                <x-label for="image" class="pt-5"><span>Изображение</span></x-label>
                <input type="file" id="image" name="image" />
                @error('image')
                {{-- The $attributeValue field is/must be $validationRule --}}
                <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                @enderror

                <!-- Drop down -->
                <x-label for="categories" class="pt-5"><span>Выберите категорию:</span></x-label>
                <select name="category_id" class="form-select appearance-none
                        block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white 
                        bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded
                        transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 
                        focus:outline-none" id="categories">
                    <option selected disabled>Выберите категорию</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                {{-- The $attributeValue field is/must be $validationRule --}}
                <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                @enderror

                <!-- Body-->
                <x-label for="body" class="pt-5"><span>Контент</span></x-label>
                <textarea id="body" name="body">{{ old('body') }}</textarea>
                @error('body')
                {{-- The $attributeValue field is/must be $validationRule --}}
                <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                @enderror
                <!-- Button -->
                <div class="pt-5 w-auto">
                    <x-button type="submit" class="float-right">Создать</x-button>
                </div>
            </form>
        </div>

    </section>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('body');
    </script>
</x-app-layout>