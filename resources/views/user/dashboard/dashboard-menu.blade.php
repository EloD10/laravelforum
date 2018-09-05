<div class="bg-blue-lighter min-h-xs h-64 overflow-hidden">
  @if( isset(auth()->user()->background))
    <img class="w-full" src="/storage/{{ auth()->user()->background }}" alt="background-user">
  @else
    <img class="w-full" src="https://tailwindcss.com/img/card-top.jpg" alt="background-user">
  @endif
</div>
<nav class="h-12 bg-white shadow">
  <div class="container mx-auto h-12 flex items-center">
    <div class="w-1/4">
      <a href="/user/{{ auth()->user()->id }}-{{ auth()->user()->name }}" class="rounded-full h-16 w-16 flex items-center justify-center ml-4 text-dark no-underline">
        @if( isset(auth()->user()->avatar))
          <img class=" rounded-full" src="/storage/{{ auth()->user()->avatar }}" alt="avatar">
        @else
          <svg class="bg-blue-light rounded-full fill-current text-blue-darker" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z"/></svg>
        @endif
      </a>
    </div>
    <div class="w-5/6">
      <ul class="p-0 flex items-center">
        <a href="/notifications" class="flex flex-col border-b-2 border-blue-dark py-1 px-3 no-underline hover:bg-blue-lightest">
          <p class="text-blue-darker font-bold text-center">Activités</p>
          <span class="text-blue-dark font-bold text-sm text-center mt-1">Aucune notifications</span>
        </a>
        <a href="/wall-message/new" class="flex flex-col py-1 px-3 no-underline hover:bg-blue-lightest">
          <p class="text-blue-darker font-bold text-center ml-2 p-2">Ajouter un message d'humeur</p>
        </a>
      </ul>
    </div>
    <div class="w-6/6">
      <ul class="p-0 flex items-center">
        <a href="/parameters" class="flex flex-colpy-1 px-3 no-underline">
          <p class="text-blue-darker font-bold text-xss hover:text-blue-light">Paramètres</p>
        </a>
        <a href="/logout" class="flex flex-col py-1 px-3 no-underline">
          <p class="text-blue-darker font-bold text-xss hover:text-blue-light">Déconnexion </p>
        </a>
      </ul>
    </div>
  </div>
</nav>