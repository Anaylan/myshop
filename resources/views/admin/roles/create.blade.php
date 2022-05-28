<x-admin-layout>
  <div class="flex p-2">
    <a href="{{ route('admin.roles.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Страница роли</a>
  </div>
  <div class="flex flex-col">
    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
      <form method="POST" action="{{ route('admin.roles.store') }}">
        @csrf
        <div class="sm:col-span-6">
          <label for="name" class="block text-sm font-medium text-gray-700"> Название роли </label>
          <div class="mt-1">
            <input type="text" id="name" name="name" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
          </div>
          @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="sm:col-span-6 pt-5">
          <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Создать</button>
        </div>
      </form>
    </div>
  </div>
</x-admin-layout>