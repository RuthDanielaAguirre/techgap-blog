# Componentes del Blog TechGap

Este documento describe todos los componentes disponibles después de la modularización del archivo `home.blade.php`.

## 📦 Componentes del Blog (`components/blog/`)

### 🏠 Componentes de la página principal

#### `<x-blog.home-hero />`
Hero section principal con gradiente y botones de acción.
```blade
<x-blog.home-hero />
<!-- O con parámetros personalizados -->
<x-blog.home-hero 
    title="Título personalizado" 
    subtitle="Subtítulo personalizado" />
```

#### `<x-blog.categories-grid :categories="$categories" />`
Grid de categorías con iconos y conteo de posts.
```blade
<x-blog.categories-grid :categories="$categories" />
```

### 📝 Componentes de Posts

#### `<x-blog.post-card :post="$post" />`
Tarjeta de post mejorada con múltiples variantes.
```blade
<x-blog.post-card :post="$post" />
<x-blog.post-card :post="$post" variant="compact" />
<x-blog.post-card :post="$post" variant="featured" />
```

#### `<x-blog.featured-post-card :post="$post" />`
Tarjeta especial para posts destacados con imagen de categoría.
```blade
<x-blog.featured-post-card :post="$post" />
```

#### `<x-blog.latest-post-card :post="$post" />`
Tarjeta compacta para últimos posts.
```blade
<x-blog.latest-post-card :post="$post" />
```

#### `<x-blog.popular-post-item :post="$post" />`
Item compacto para sidebar de posts populares.
```blade
<x-blog.popular-post-item :post="$post" />
```

### 👤 Componentes de Usuario

#### `<x-blog.user-avatar :user="$user" />`
Avatar de usuario con diferentes tamaños y fallback a iniciales.
```blade
<x-blog.user-avatar :user="$user" />
<x-blog.user-avatar :user="$user" size="xs" />
<x-blog.user-avatar :user="$user" size="sm" />
<x-blog.user-avatar :user="$user" size="md" />
<x-blog.user-avatar :user="$user" size="lg" />
<x-blog.user-avatar :user="$user" size="xl" />
```

### 🏷️ Componentes de Etiquetas

#### `<x-blog.category-badge :category="$category" />`
Badge de categoría con color e icono.
```blade
<x-blog.category-badge :category="$category" />
<x-blog.category-badge :category="$category" size="xs" />
<x-blog.category-badge :category="$category" size="sm" />
<x-blog.category-badge :category="$category" size="md" />
<x-blog.category-badge :category="$category" size="lg" />
```

#### `<x-blog.tag-badge :tag="$tag" />`
Badge de tag con color.
```blade
<x-blog.tag-badge :tag="$tag" />
<x-blog.tag-badge :tag="$tag" size="xs" />
```

### 📞 Componentes de CTA y Sidebars

#### `<x-blog.cta-box />`
Caja de llamada a la acción con feed de actividad.
```blade
<x-blog.cta-box />
<!-- Con parámetros personalizados -->
<x-blog.cta-box 
    title="Título personalizado" 
    description="Descripción personalizada" />
```

#### `<x-blog.popular-posts-sidebar :popularPosts="$popularPosts" />`
Sidebar con posts más populares.
```blade
<x-blog.popular-posts-sidebar :popularPosts="$popularPosts" />
```

#### `<x-blog.activity-feed />`
Feed de actividad con usuarios y acciones.
```blade
<x-blog.activity-feed />
<!-- Con datos personalizados -->
<x-blog.activity-feed :activities="$activities" />
```

## 🎨 Componentes de UI (`components/ui/`)

### 🔧 Componentes de Utilidad

#### `<x-ui.section />`
Wrapper para secciones con título y enlace opcional.
```blade
<x-ui.section title="Mi Sección">
    <p>Contenido de la sección</p>
</x-ui.section>

<x-ui.section 
    title="Posts" 
    :link="route('posts.index')"
    linkText="Ver todos"
    bgClass="bg-gray-50">
    <!-- Contenido -->
</x-ui.section>
```

#### `<x-ui.icon name="icon-name" />`
Iconos SVG predefinidos.
```blade
<x-ui.icon name="eye" />
<x-ui.icon name="arrow-right" />
<x-ui.icon name="user" />
<x-ui.icon name="heart" />
<x-ui.icon name="bookmark" />
<x-ui.icon name="chat" />
<x-ui.icon name="eye" class="w-4 h-4" />
```

### 📋 Componentes existentes mejorados
- `<x-ui.badge />` - Ya existía, se mantiene
- `<x-ui.button />` - Ya existía, se mantiene  
- `<x-ui.card />` - Ya existía, se mantiene
- `<x-ui.input />` - Ya existía, se mantiene
- `<x-ui.select />` - Ya existía, se mantiene

## 🔄 Migración del home.blade.php

### Antes (268 líneas)
```blade
@extends('layouts.app')
@section('content')
<!-- Todo el código HTML repetitivo aquí -->
@endsection
```

### Después (35 líneas)
```blade
@extends('layouts.app')
@section('content')
<x-blog.home-hero />
<x-blog.categories-grid :categories="$categories" />

@if($featuredPosts->isNotEmpty())
<x-ui.section title="🌟 Posts Destacados">
    <div class="grid md:grid-cols-3 gap-8">
        @foreach($featuredPosts as $post)
            <x-blog.featured-post-card :post="$post" />
        @endforeach
    </div>
</x-ui.section>
@endif

<x-ui.section 
    title="📚 Últimos Artículos" 
    :link="route('posts.index')"
    linkText="Ver todos"
    bgClass="bg-gray-50">
    <div class="grid md:grid-cols-3 gap-6">
        @foreach($latestPosts as $post)
            <x-blog.latest-post-card :post="$post" />
        @endforeach
    </div>
    <div class="mt-8">
        {{ $latestPosts->links() }}
    </div>
</x-ui.section>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="grid lg:grid-cols-3 gap-8">
        <x-blog.cta-box />
        <x-blog.popular-posts-sidebar :popularPosts="$popularPosts" />
    </div>
</div>
@endsection
```

## ✅ Beneficios de la modularización

1. **Reutilización**: Los componentes pueden usarse en otras vistas
2. **Mantenimiento**: Más fácil de mantener y actualizar
3. **Legibilidad**: Código más limpio y fácil de entender
4. **Consistencia**: Diseño consistente en toda la aplicación
5. **Testing**: Cada componente puede probarse individualmente
6. **Flexibilidad**: Parámetros permiten personalización

## 📁 Estructura de archivos creados

```
resources/views/components/
├── blog/
│   ├── activity-feed.blade.php
│   ├── categories-grid.blade.php
│   ├── category-badge.blade.php
│   ├── cta-box.blade.php
│   ├── featured-post-card.blade.php
│   ├── hero.blade.php (existía)
│   ├── home-hero.blade.php (nuevo)
│   ├── latest-post-card.blade.php
│   ├── popular-post-item.blade.php
│   ├── popular-posts-sidebar.blade.php
│   ├── post-card.blade.php (mejorado)
│   ├── tag-badge.blade.php
│   └── user-avatar.blade.php
└── ui/
    ├── badge.blade.php (existía)
    ├── button.blade.php (existía)
    ├── card.blade.php (existía)
    ├── icon.blade.php (nuevo)
    ├── input.blade.php (existía)
    ├── section.blade.php (nuevo)
    └── select.blade.php (existía)
```