<x-layouts.app title="FI | HOME" meta-description="Descripción del Home" header="FINSTAGRAM">
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body class="bg-blue-100 flex items-center justify-center h-screen">
        <div class="md:flex md:justify-center md:gap-10 md:items-center">
            <div class="md:w-6/12 max-w-lg bg-white p-8 rounded shadow-md">
                <h1 class="text-3xl font-semibold mb-4">Bienvenido a Finstagram</h1>
                <p class="text-gray-600 mb-6 font-bold">Finstagram es una red social única y exclusiva de una universidad que se ha convertido en un espacio virtual para que los estudiantes compartan momentos especiales de sus vidas a través de fotografías. Esta plataforma está diseñada específicamente para la comunidad universitaria, lo que la convierte en un lugar donde los estudiantes pueden conectarse, interactuar y mantenerse al tanto de lo que está sucediendo en el campus y en sus vidas.
                </p>
            </div>
            <div class="md:w-6/12 p-5 md:order-first">
                <img src="{{asset('img/finstagram_logo.png')}}" alt="img registro usuario" class="rounded-lg">
            </div>
        </div>
    </body>
    </html>
</x-layouts.app>
