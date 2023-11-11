<x-layouts.app title="FI | ADMIN" meta-description="Vista de gestion de categorias" header="FINSTAGRAM">

    @section('titulo')
        ADMINISTRAR CATEGORIAS
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
                                CATEGORIA
                            </th>
                            <th scope="col" class="text-center px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                ACCION
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row"
                                class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                0
                            </th>
                            <td class="px-6 py-4">
                                --
                            </td>
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                <a type="button"
                                    class="text-center bg-green-400 hover:bg-green-600 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                                    href="{{ route('categories.create') }}">AGREGAR</a>

                            </td>
                        </tr>
                        @foreach ($categories as $category)
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row"
                                    class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                    {{ $loop->iteration }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $category->category }}
                                </td>
                                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST">
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
                        @endforeach
                    </tbody>
                </table>

            </div>
    </body>


</x-layouts.app>
