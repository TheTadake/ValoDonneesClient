<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ajouter une entreprise') }}
        </h2>
        <script>
            function recherche(){
                var siren = document.getElementsByName('siren')[0].value;
                var url = "https://entreprise.data.gouv.fr/api/sirene/v3/etablissements/" + siren;
                fetch(url)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                });
            }
        </script>
    </x-slot> 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-5">
            <div class="bg-white dark:bg-gray-800 min-h-44  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold  text-center mb-4 ">Ajouter une Entreprise</h1>
                    <div class="flex items-center space-x-4 justify-center ">
                        <div class="flex-col">
                            <label class="text-l" for="siren">Recherche via l'Api Société.com</label><br/>
                            <input type="text" id="siren" name="siren" placeholder="N° de siren " class="rounded-md min-w-96 border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-black" required>
                        </div>
                        <input type="button" onclick="" value="Rechercher" class="px-4 mt-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
