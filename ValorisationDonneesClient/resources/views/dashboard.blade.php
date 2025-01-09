<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Recherche Entreprise') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 min-h-44  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="text-2xl font-semibold  ml-44 mb-4 pl-40">Rechercher une entreprise</h1>
                    <form method="GET" action="{{ route('search') }}" class="flex items-center space-x-4 justify-center ">
                        @csrf
                        <div class="flex ">
                            <input type="text" 
                                   name="recherche" 
                                   placeholder="Entrer un siret, un siren ou un nom d'entreprise" 
                                   class="rounded-md min-w-96 border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-black" 
                                   required
                                   title="Veuillez entrer au moins un identifiant ou un nom d'entreprise">
                        </div>
                        
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            Rechercher
                        </button>
                    </form>
                </div>
            </div>
            @if(isset ($vide) && $vide==false)
            
                <div class="bg-white dark:bg-gray-800 min-h-44  overflow-hidden shadow-sm sm:rounded-lg mt-10">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <div class="grid grid-cols-3 gap-4">
                            
                             
                                
                            
                            
                                @foreach($entreprise as $ent)
                                
                                    @foreach($etablissement as $etab)
                                        <div class="bg-gray-100 dark:bg-gray-700 min-h-64   p-4 rounded-lg shadow">
                                            <h3 class="text-lg font-semibold mb-2">{{ $ent->nomEntr }}</h3>
                                            <p class="text-sm ml-1 mb-1"><span class="font-medium">SIRET:</span> {{$etab->siret}} </p>
                                            <p class="text-sm ml-1 mb-1"><span class="font-medium">SIREN:</span> {{$etab->siren}}</p>
                                            <p class="text-sm ml-1 mb-1"><span class="font-medium">Adresse:</span> {{$etab->adresse}}</p>
                                    
                                        </div>
                                    @endforeach
                                @endforeach
                            
                            
                            
                        </div>
                    </div>
                </div>
            @elseif(isset ($vide) && $vide==true)
                <div class="bg-white dark:bg-gray-800 min-h-32  overflow-hidden shadow-sm sm:rounded-lg mt-10">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="text-2xl text-center font-semibold   mb-4 ">Aucun résultat trouvé</h1>
                    </div>
                </div>  
            @endif

        </div>
    </div>
</x-app-layout>
