<x-admin-layout>
    <div class="p-6 bg-white border-b border-gray-200 flex-col flex">
        <h1 class="text-lg text-gray-700">Панель управления</h1>

        <p class="text-lg text-gray-700">Имя: {{Auth::user()->name}}</p>
        <p class="text-lg text-gray-700">
            Роль:
            @role('admin')
            Администратор
            @endrole
            @role('user')
            Как вы сюда попали
            @endrole
        </p>
        <p class="text-lg text-gray-700">
            Права доступа:
        </p>
    </div>
</x-admin-layout>