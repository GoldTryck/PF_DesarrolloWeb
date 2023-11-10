<x-layouts.app
    title="FI | ABOUT"
    meta-description="Descrición del Home"
    header="SOBRE NOSOTROS">
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-screen-xl mx-auto">
        <h1 class="text-3xl font-semibold text-center mb-8">Equipo de Desarrollo</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
            <!-- Desarrollador 1 -->
            <div class="bg-white rounded-lg shadow-md p-4">
                <img src="{{asset('img/Hector.png')}}" alt="img Desarrollador 1" class="w-32 h-32 rounded-full mx-auto mb-4">

                <h2 class="text-xl font-semibold">Hector Larios</h2>
                <p class="text-gray-600">
                    
                    Hello, I'm Hector, a 24-year-old student pursuing a degree in computer science at the National Autonomous University of Mexico. I'm passionate about continuously expanding my knowledge in the field of information technology, with a particular focus on data analysis and machine learning. BackEnd</p>
            </div>

            <!-- Desarrollador 2 -->
            <div class="bg-white rounded-lg shadow-md p-4">
                <img src="{{asset('img/frank.jpeg')}}" alt="img Desarrollador 1" class="w-32 h-32 rounded-full mx-auto mb-4">
                <h2 class="text-xl font-semibold">Francisco Ortega</h2>
                <p class="text-gray-600">I am a computer engineering student at the faculty of engineering at the national autonomous university of Mexico. I´m 23 years old, 🔭 I’m currently working on my dreams, my personal and professional growth. FrontEnd </p>
            </div>
        </div>
    </div>
</body>
</html>


</x-layouts.app>