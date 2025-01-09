<x-app-layout> 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Informations et Commentaires') }}
        </h2>
    </x-slot> 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-5">
            <div class="bg-white dark:bg-gray-800 min-h-44  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="text-center text-2xl font-semibold   mb-4 ">{{$entreprise->nomEntr}}</h1>
                        <table>
                                <tr>
                                    <td class="text-xl pl-24 py-5">Siret : {{$etablissement->siret}}</td>
                                </tr>
                                <tr>
                                    <td class="text-xl pl-24 py-5">Siren : {{$etablissement->siren}}</td> 
                                    <td class="text-xl pl-10 py-5">Nic : {{$etablissement->nic}}</td>  
                                </tr>
                                <tr>
                                    <td class="text-xl pl-24 py-5">Adresse : {{$etablissement->adresse}}</td>
                                    <td class="text-xl pl-10 py-5">Ville : {{$etablissement->ville}}</td>
                                    <td class="text-xl py-5">Pays : {{$etablissement->pays}}</td>
                                </tr>
                                @if($etablissement->active==true)
                                    <tr>
                                        <td class="text-xl pl-24 py-5">Etablissement actif</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td class="text-xl pl-24 py-5">Etablissement inactif</td>
                                    </tr>
                                @endif
                                @if($etablissement->siege==true)
                                    <tr>
                                        <td class="text-xl pl-24 py-5">Etablissement siège</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td class="text-xl pl-24 py-5">Etablissement secondaire</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td class="text-xl pl-24 py-5">Code NAF : {{$etablissement->codenaf}}</td>
                                    <td class="text-xl py-5">Libellé NAF :<br/> {{$etablissement->libelleNaf}}</td>
                                </tr>

                        </table>
                            
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-5">
            <div class="bg-white dark:bg-gray-800 min-h-44  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 h-full">
                    <h1 class="text-red-500 pl-20 text-2xl font-semibold   mb-4 ">Commentaires</h1>
                    <div class="border-b-4 ">
                        <form action="{{route('comments.store')}}" method="post">
                            @csrf
                            <div class="flex justify-between items-center p-6">
                                <input type="hidden" name="siret" value="{{ $etablissement->siret }}">
                                <textarea name="texte" class="w-full min-h-20 h-fit px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:outline-none focus:border-red-500 focus:ring focus:ring-red-200 dark:bg-gray-800 dark:text-gray-100" placeholder="Votre commentaire" ></textarea>
                                <button class="ml-1 px-4 py-2 bg-red-500 text-white rounded-lg shadow hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-200">Envoyer</button>
                            </div>
                        </form>
                    </div>

                    @foreach ($etablissement->commentaires as $comment)
                        <div class="flex my-2">
                            @if($comment->user->name == Auth::user()->name)
                                <h2 class="font-semibold text-xl text-blue-500 leading-tight mr-auto ml-1">
                            @else
                                <h2 class="font-semibold text-xl text-white leading-tight mr-auto ml-1">
                            @endif

                                {{ $comment->user->name }}
                            </h2>
                    
                        </div>
                        <div class="p-6 text-gray-900 dark:text-gray-100 border-2 border-gray-200 mb-1 rounded-md" >
                            <p class="text-gray-700 dark:text-gray-300">{{ $comment->texte }}</p>
                        </div>
                                       
                    @endforeach
                </div>
            </div>
        </div>


    </div>

</x-app-layout>