<x-layouts.app title="FI | HOME" meta-description="Descrición del Home" header="FINSTAGRAM">
    @section('titulo')
        ADMINISTRAR CUENTAS DE USUARIO
    @endsection

    <body class="bg-gray-100 p-10">
        <div class="max-w-screen-xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                        <tr>
                            <th scope="col" class="text-center px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                #
                            </th>
                            <th scope="col" class="text-center px-6 py-3">
                                NOMBRE
                            </th>
                            <th scope="col" class="text-center px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                EMAIL
                            </th>
                            <th scope="col" class="text-center px-6 py-3">
                                ELIMINAR
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @if ($user->role_id != 1)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <th scope="row"
                                        class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $user->name }}
                                    </td>
                                    <td
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('users.destroy', $user) }}" method="POST">
                                            @method('DELETE')
                                            @csrf

                                            <div class="text-center">
                                                <button
                                                    class="bg-red-400 hover:bg-red-600 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                                                    type="submit">
                                                    <i class="fas fa-trash"></i> Eliminar
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</x-layouts.app>
