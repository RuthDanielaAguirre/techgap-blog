@props(['categories' => [], 'posts' => null])

<section class="mb-6">
  <form method="GET" action="/" class="flex flex-col md:flex-row gap-3 md:items-center">
    <x-ui.input
      name="search"
      :value="request('search')"
      placeholder="Buscar: bootcamp, Python, UX, LLM..."
    />

    <x-ui.select name="category" class="md:w-64">
      <option value="">Todas las categorías</option>
      @foreach($categories ?? [] as $category)
        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
          {{ $category->name }}
        </option>
      @endforeach
    </x-ui.select>

    <x-ui.button type="submit">Filtrar</x-ui.button>

    @if(request('search') || request('category'))
      <x-ui.button variant="secondary" as="a" href="/">Limpiar</x-ui.button>
    @endif
  </form>

  @if($posts)
    <div class="text-xs text-slate-500 mt-3 flex flex-wrap gap-2 items-center">
      <span>Mostrando <span class="text-slate-900">{{ $posts->count() }}</span> de <span class="text-slate-900">{{ $posts->total() }}</span></span>

      @if(request('search'))
        <x-ui.badge tone="cyan">"{{ request('search') }}"</x-ui.badge>
      @endif

      @if(request('category'))
        <x-ui.badge tone="fuchsia">Categoría aplicada</x-ui.badge>
      @endif
    </div>
  @endif
</section>
