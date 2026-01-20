<div class="col-span-full text-center py-12">
  <p class="text-gray-500 text-lg mb-4">No se encontraron artículos</p>
  @if(request('search') || request('category'))
    <a href="/" class="text-cyan-700 hover:text-cyan-900 font-medium">
      Ver todos →
    </a>
  @endif
</div>
