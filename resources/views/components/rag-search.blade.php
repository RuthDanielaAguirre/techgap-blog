<div 
    x-data="{
        query: '',
        results: [],
        loading: false,
        showResults: false,
        
        async search() {
            if (this.query.length < 3) {
                this.results = [];
                this.showResults = false;
                return;
            }
            
            this.loading = true;
            
            try {
                const response = await fetch(`/api/rag/search?q=${encodeURIComponent(this.query)}&limit=5`);
                const data = await response.json();
                
                this.results = data.success ? data.data.results : [];
                this.showResults = true;
                this.loading = false;
            } catch (error) {
                console.error('Search error:', error);
                this.results = [];
                this.loading = false;
            }
        }
    }"
    class="relative"
>
    <!-- Search Input -->
    <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i class="ph ph-magnifying-glass text-gray-400 text-lg"></i>
        </div>
        
        <input 
            x-model="query"
            @input.debounce.300ms="search()"
            @focus="showResults = query.length >= 3 && results.length > 0"
            @blur.debounce.150ms="showResults = false"
            type="text" 
            placeholder="Buscar artículos..." 
            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-techgap-500 focus:border-transparent transition"
        >
        
        <!-- Loading Indicator -->
        <div x-show="loading" class="absolute inset-y-0 right-0 pr-3 flex items-center">
            <div class="animate-spin h-4 w-4 border-2 border-techgap-500 border-t-transparent rounded-full"></div>
        </div>
    </div>
    
    <!-- Search Results Dropdown -->
    <div 
        x-show="showResults && results.length > 0"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute top-full left-0 right-0 mt-2 bg-white border border-gray-200 rounded-xl shadow-lg z-50 max-h-96 overflow-y-auto"
    >
        <div class="p-2">
            <template x-for="result in results" :key="result.id">
                <a 
                    :href="`/post/${result.slug}`"
                    @mousedown.prevent="window.location.href = `/post/${result.slug}`"
                    class="block p-3 rounded-lg hover:bg-gray-50 transition group"
                >
                    <div class="flex items-start space-x-3">
                        <!-- Category Badge -->
                        <div class="flex-shrink-0">
                            <span 
                                class="inline-flex items-center px-2 py-1 rounded-md text-xs font-medium bg-techgap-100 text-techgap-800"
                                x-text="result.category || 'Sin categoría'"
                            ></span>
                        </div>
                        
                        <div class="flex-1 min-w-0">
                            <!-- Title -->
                            <p 
                                class="text-sm font-semibold text-gray-900 group-hover:text-techgap-600 transition"
                                x-text="result.title"
                            ></p>
                            
                            <!-- Excerpt -->
                            <p 
                                class="text-xs text-gray-500 mt-1 line-clamp-2"
                                x-text="result.excerpt"
                            ></p>
                            
                            <!-- Metadata -->
                            <div class="flex items-center mt-2 text-xs text-gray-400">
                                <span x-text="result.author"></span>
                                <span class="mx-2">•</span>
                                <span x-text="new Date(result.published_at).toLocaleDateString('es-ES')"></span>
                                <span class="mx-2">•</span>
                                <span class="text-techgap-500 font-medium" x-text="`${Math.round(result.relevance_score * 100)}% relevante`"></span>
                            </div>
                        </div>
                    </div>
                </a>
            </template>
        </div>
        
        <!-- View All Results -->
        <div class="border-t border-gray-100 p-3">
            <a 
                :href="`/posts?search=${encodeURIComponent(query)}`"
                class="block text-center text-sm text-techgap-600 hover:text-techgap-700 font-medium transition"
            >
                Ver todos los resultados →
            </a>
        </div>
    </div>
</div>