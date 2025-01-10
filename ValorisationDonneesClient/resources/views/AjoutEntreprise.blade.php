<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ajouter une entreprise') }}
        </h2>
        <script>
            async function recherche() {
                try {
                    var siren = document.getElementsByName('siren')[0].value;
                    console.log("SIREN recherché:", siren);
                    
                    var url = "https://api.societe.com/api/v1/entreprise/"+siren+"/infoslegales";
                    console.log("URL appelée:", url);

                    const myHeaders = new Headers();
                    myHeaders.append("Accept", "application/json");
                    myHeaders.append("X-Authorization", "");

                    const requestOptions = {
                        method: "GET",
                        headers: myHeaders,
                        redirect: "follow",
                        mode: 'no-cors'
                    };

                    const response = await fetch(url, requestOptions);
                    
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    
                    const result = await response.json();
                    console.log("Réponse brute:", result);

                    if (!result || !result.infoslegales) {
                        throw new Error('Données invalides reçues de l\'API');
                    }

                    // Remplissage des données entreprise
                    const fields = {
                        'siren_form': 'siren',
                        'nomEntr': 'denoinsee',
                        'codenaf': 'nafinsee',
                        'libelleNaf': 'naflibinsee',
                        'statutRcs': 'statut_rcs',
                        'numRcs': 'numero_rcs',
                        'siret': 'siretsiege',
                        'nic': 'nicsiege',
                        'ville': 'villeinsee',
                        'pays': 'paysrcs',
                        'codePays': 'code_pays',
                        'adresse': 'voieadressageinsee'
                    };

                    for (const [field, apiKey] of Object.entries(fields)) {
                        const value = result.infoslegales[apiKey] || '';
                        document.getElementById(field).value = value;
                    }

                    // Checkboxes
                    document.getElementById('siege').checked = true;
                    document.getElementById('active').checked = true;

                    // Copie des codes NAF pour l'établissement
                    document.getElementById('etab_codenaf').value = result.infoslegales.nafinsee || '';
                    document.getElementById('etab_libelleNaf').value = result.infoslegales.naflibinsee || '';

                    console.log("Formulaire rempli avec succès");
                } catch (error) {
                    console.error("Erreur détaillée:", error);
                    alert(`Erreur lors de la recherche: ${error.message}\nVérifiez le numéro SIREN et réessayez.`);
                }
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
                        <input type="button" onclick=recherche() value="Rechercher" class="px-4 mt-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600"/>
                
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-semibold mb-4">Formulaire d'ajout d'entreprise et établissement</h2>
                    <form method="POST" action="{{ route('entreprise.store') }}">
                        @csrf
                        <div class="mb-6">
                            <h3 class="text-lg font-medium mb-4">Informations de l'entreprise</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="siren_form" class="block text-sm font-medium">SIREN</label>
                                    <input type="text" id="siren_form" name="siren" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-black" >
                                </div>
                                <div>
                                    <label for="nomEntr" class="block text-sm font-medium">Nom Entreprise</label>
                                    <input type="text" id="nomEntr" name="nomEntr" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-black">
                                </div>
                                
                                <div>
                                    <label for="nom" class="block text-sm font-medium">Nom</label>
                                    <input type="text" id="nom" name="nom" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-black">
                                </div>
                                <div>
                                    <label for="prenom" class="block text-sm font-medium">Prénom</label>
                                    <input type="text" id="prenom" name="prenom" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-black">
                                </div>
                                <div>
                                    <label for="codenaf" class="block text-sm font-medium">Code NAF</label>
                                    <input type="text" id="codenaf" name="codenaf" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-black">
                                </div>
                                <div>
                                    <label for="libelleNaf" class="block text-sm font-medium">Libellé NAF</label>
                                    <input type="text" id="libelleNaf" name="libelleNaf" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-black">
                                </div>
                                <div>
                                    <label for="statutRcs" class="block text-sm font-medium">Statut RCS</label>
                                    <input type="text" id="statutRcs" name="statutRcs" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-black">
                                </div>
                                <div>
                                    <label for="numRcs" class="block text-sm font-medium">Numéro RCS</label>
                                    <input type="text" id="numRcs" name="numRcs" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-black">
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-lg font-medium mb-4">Informations de l'établissement</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="siret" class="block text-sm font-medium">SIRET</label>
                                    <input type="text" id="siret" name="siret" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-black" >
                                </div>
                                <div>
                                    <label for="nic" class="block text-sm font-medium">NIC</label>
                                    <input type="text" id="nic" name="nic" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-black">
                                </div>
                                <div>
                                    <label for="ville" class="block text-sm font-medium">Ville</label>
                                    <input type="text" id="ville" name="ville" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-black">
                                </div>
                                <div>
                                    <label for="pays" class="block text-sm font-medium">Pays</label>
                                    <input type="text" id="pays" name="pays" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-black">
                                </div>
                                <div>
                                    <label for="codePays" class="block text-sm font-medium">Code Pays</label>
                                    <input type="text" id="codePays" name="codePays" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-black">
                                </div>
                                <div class="flex space-x-4">
                                    <div>
                                        <label for="siege" class="block text-sm font-medium">Siège social</label>
                                        <input type="checkbox" id="siege" name="siege" class="mt-2">
                                    </div>
                                    <div>
                                        <label for="active" class="block text-sm font-medium">Actif</label>
                                        <input type="checkbox" id="active" name="active" class="mt-2">
                                    </div>
                                </div>
                                <div>
                                    <label for="etab_codenaf" class="block text-sm font-medium">Code NAF</label>
                                    <input type="text" id="etab_codenaf" name="etab_codenaf" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-black">
                                </div>
                                <div>
                                    <label for="etab_libelleNaf" class="block text-sm font-medium">Libellé NAF</label>
                                    <input type="text" id="etab_libelleNaf" name="etab_libelleNaf" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-black">
                                </div>
                                <div class="col-span-2">
                                    <label for="adresse" class="block text-sm font-medium">Adresse</label>
                                    <textarea id="adresse" name="adresse" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-black"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                Enregistrer l'entreprise et l'établissement
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
