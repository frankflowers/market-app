{{--VERIFICAR SI HAY UN ELEMENTO DE BREADCRUMB--}}

@if(count($breadcrumbs))
    {{--margin bottom--}}
    <nav class="mb-2 block"> 
        <ol class= "flex flex-wrap text-slate-700 text-sm">
        
     {{--Recorrer elementos de breadcrumb--}}
    @foreach ($breadcrumbs as $item)
    <li class="flex items-center">
       
     {{--itmerida/ campus poniente/ dsc/edificio h/h8--}}
        
     {{--si No es el primer elemento, ponle separador antes--}}
    @unless($loop->first)
    <span class="px-2 text-gray-400"></span>

    @endunless

    {{--si es el ultimo elemento, no es link--}}
    @isset($item['href'])
        <a href="{{ $item['href'] }}" class="opacity-60 hover:opacity-100 transition">
            {{ $item['name'] }}
        </a>

    @else
    {{ $item['name'] }}

    @endisset




    </li>
    @endforeach
        </ol>
        {{--el ultimo elemento en negritas--}}
        @if(count($breadcrumbs)>1 )
        <h6 class="font-bold mt-2">
            {{ end($breadcrumbs)['name'] }}


        </h6>
        @endif

</nav>

@endif