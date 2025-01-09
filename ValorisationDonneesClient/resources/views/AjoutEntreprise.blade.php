<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ajout d'entreprise') }}
        </h2>
    </x-slot> 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-5">
            <div class="bg-white dark:bg-gray-800 min-h-44  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold  ml-44 mb-4 pl-40">Ajouter une Entreprise</h1>
                    
                    <label class="text-l" for="siren">Recherche via l'Api Société.com</label>
                    <input type="text" name="siren" placeholder="N° de siren " class="rounded-md min-w-96 border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-black" required>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
