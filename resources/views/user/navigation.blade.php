<div class="bg-blue-lighter min-h-xs h-64 overflow-hidden">
  @if( isset($user->background))
    <img class="w-full" src="/storage/{{ $user->background }}" alt="background-user">
  @else
    <img class="w-full" src="https://tailwindcss.com/img/card-top.jpg" alt="background-user">
  @endif
</div>
<nav class="h-12 bg-white shadow">
  <div class="container mx-auto h-12 flex items-center">
    <div class="w-1/4">
      <a href="/dashboard" class="rounded-full h-16 w-16 flex items-center justify-center ml-4 text-dark no-underline">
        @if( isset($user->background))
          <img class=" rounded-full" src="/storage/{{ $user->avatar }}" alt="avatar">
        @else
          <svg class="bg-blue-light rounded-full fill-current text-blue-darker" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z"/></svg>
        @endif
      </a>
    </div>
    <div class="w-5/6">
      <ul class="p-0 flex items-center">
        <a href="/user/{{ $user->id }}-{{ $user->name }}/replies" class="flex flex-col {{ request()->is('/dashboard') ? 'border-b-2 border-blue-dark' : '' }} py-1 px-3 no-underline hover:bg-blue-lightest">
          <p class="text-blue-darker font-bold">Messages</p>
          <span class="text-blue-dark font-bold text-sm text-center mt-1">{{ $user->replies->count() }}</span>
        </a>
        <a href="/user/{{ $user->id }}-{{ $user->name }}/threads" class="flex flex-col hover:bg-blue-lightest py-1 px-3 no-underline">
          <p class="text-blue-darker font-bold">Sujets</p>
          <span class="text-blue-dark font-bold text-sm text-center mt-1">{{ $user->threads->count() }}</span>
        </a>
      </ul>
    </div>
    @if(auth()->check())
    <div class="w-6/6">
      <ul class="p-0 flex items-center">
        @if (auth()->user()->role === 1)
            @if ($user->isModerator())
              <form method="post" action="/user/{{ $user->id }}-{{ $user->name }}/action/role/member" class="flex flex-colpy-1 px-3 no-underline">
                @csrf
                {{ method_field('put') }}
                <button class="text-blue-darker font-bold text-xss hover:text-blue-light">Enlever les droits modéraeur</button>
              </form>
            @elseif(auth()->user()->id == $user->id)
              {{-- Nothing --}}
            @else
              <form method="post" action="/user/{{ $user->id }}-{{ $user->name }}/action/role/moderator" class="flex flex-colpy-1 px-3 no-underline">
                @csrf
                {{ method_field('put') }}
                <button class="text-blue-darker font-bold text-xss hover:text-blue-light">Promouvoir modérateur</button>
              </form>
            @endif
        @endif
        <form method="post" action="/user/{{ $user->id }}-{{ $user->name }}/favorite" class="flex flex-colpy-1 px-3 no-underline">
          @csrf
          @if (auth()->user()->hasFollowUser($user))
            {{ method_field('delete') }}
            <button class="text-blue-darker font-bold text-xss hover:text-blue-light">Ne plus suivre</button>
          @else
            <button class="text-blue-darker font-bold text-xss hover:text-blue-light">Suivre</button>
          @endif
        </form>
      </ul>
    </div>
    @endif
  </div>
</nav>