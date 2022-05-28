<x-admin-layout>
    <div class="flex justify-end p-2 mb-2">
        <a href="{{ route('admin.news.create') }}" class="px-4 py-2 bg-green-700 text-white hover:bg-green-500 rounded-md">Создать запись</a>
    </div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Название</th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Редактировать</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($posts as $post)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        {{ $post->title }}
                                    </div>
                                </td>
                                <td>
                                    <div class="flex justify-end">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('admin.news.edit', $post) }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Редактировать</a>
                                            <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST" action="{{ route('admin.posts.destroy', $post) }}" onsubmit="return confirm('Вы уверены?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">Удалить</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    {{ $posts->links('pagination::tailwind') }}
    <br>
</x-admin-layout>