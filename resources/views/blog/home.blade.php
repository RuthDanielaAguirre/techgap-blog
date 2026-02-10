@extends('layouts.app')

@section('content')

{{-- Hero --}}
<section style="background: linear-gradient(180deg, #0F172A, #020617);" class="py-32">

    <canvas id="hero-canvas" class="absolute inset-0 w-full h-full"></canvas>

    <div class="max-w-4xl mx-auto px-6 text-center">
        <h1 class="text-5xl font-bold text-white mb-6">
            Aprende tecnología sin sentirte perdido
        </h1>

        <p class="text-lg text-gray-400 mb-10">
            Explicaciones claras sobre desarrollo, redes y conceptos técnicos,
            pensadas para quienes están empezando.
        </p>

        <div class="flex justify-center gap-4">
            <a
                style="background:#1BBF9B; color:#020617"
                class="px-8 py-3 rounded-xl font-medium hover:opacity-90 transition"
            >
                Explorar artículos
            </a>

            <a
                style="border:1px solid #374151; color:#CBD5E1"
                class="px-8 py-3 rounded-xl bg-white/5 transition"
            >
                Crear cuenta
            </a>
        </div>
    </div>
</section>

<script>
    const canvas = document.getElementById("hero-canvas");
    const ctx = canvas.getContext("2d");

    let width, height;
    let nodes = [];
    const NODE_COUNT = 45;
    const MAX_DISTANCE = 150;

    function resize() {
        width = canvas.offsetWidth;
        height = canvas.offsetHeight;
        canvas.width = width;
        canvas.height = height;
    }
    resize();
    window.addEventListener("resize", resize);

    function createNodes() {
        nodes = [];
        for (let i = 0; i < NODE_COUNT; i++) {
            nodes.push({
                x: Math.random() * width,
                y: Math.random() * height,
                vx: (Math.random() - 0.5) * 0.4,
                vy: (Math.random() - 0.5) * 0.4
            });
        }
    }
    createNodes();

    function draw() {
        ctx.clearRect(0, 0, width, height);

        // Draw lines
        for (let i = 0; i < NODE_COUNT; i++) {
            for (let j = i + 1; j < NODE_COUNT; j++) {
                const dx = nodes[i].x - nodes[j].x;
                const dy = nodes[i].y - nodes[j].y;
                const dist = Math.sqrt(dx * dx + dy * dy);

                if (dist < MAX_DISTANCE) {
                    ctx.strokeStyle = `rgba(27,191,155, ${1 - dist / MAX_DISTANCE})`;
                    ctx.lineWidth = 1;
                    ctx.beginPath();
                    ctx.moveTo(nodes[i].x, nodes[i].y);
                    ctx.lineTo(nodes[j].x, nodes[j].y);
                    ctx.stroke();
                }
            }
        }

        // Draw nodes
        for (let node of nodes) {
            ctx.fillStyle = "rgba(27,191,155,0.9)";
            ctx.beginPath();
            ctx.arc(node.x, node.y, 3, 0, Math.PI * 2);
            ctx.fill();

            node.x += node.vx;
            node.y += node.vy;

            if (node.x < 0 || node.x > width) node.vx *= -1;
            if (node.y < 0 || node.y > height) node.vy *= -1;
        }

        requestAnimationFrame(draw);
    }

    draw();
</script>

{{-- Categorias --}}
<section style="background:#020617;" class="pt-0 pb-32">
    <div class="max-w-7xl mx-auto px-6">

        <div class="mb-10 max-w-2xl">
            <h2 class="text-3xl font-bold text-white mb-3">
                Explora por áreas
            </h2>
            <p class="text-gray-400">
                Empieza por el tema que más te interese y avanza a tu ritmo.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
            @foreach($categories as $category)
                <a
                    href="{{ route('posts.category', $category->slug) }}"
                    class="relative p-6 rounded-lg transition hover:scale-[1.03]"
                    style="background:linear-gradient(145deg, #0F172A, #1A2337)"
                >

                    <span
                        class="absolute top-0 left-0 w-full h-0.75 rounded-t-lg"
                        style="background:{{ $category->color }}"
                    ></span>

                    <div
                        class="text-3xl mb-6"
                        style="color:{{ $category->color }}"
                    >
                        {{ $category->icon }}
                    </div>

                    <h3 class="text-sm font-semibold text-gray-100 mb-1">
                        {{ $category->name }}
                    </h3>

                    <p class="text-xs text-gray-400">
                        {{ $category->posts_count }} artículos
                    </p>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- Post destacados --}}
@if($featuredPosts->isNotEmpty())
<section style="background:#F8FAFC">
    <div class="max-w-7xl mx-auto px-6 py-24">

        <div class="mb-12">
            <h2 class="text-3xl font-bold text-[#020617] mb-2">
                Posts destacados
            </h2>
            <p class="text-gray-600">
                Lecturas recomendadas para empezar con buen pie.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-10">
            @foreach($featuredPosts as $post)
                <article class="backdrop-blur-sm bg-white/80 border p-6 transition-all duration-300 hover:bg-white/90 hover:shadow-md" style="background:#FFFFFF;border-color:#E5E7EB">
                    <span
                        class="text-xs font-semibold"
                        style="color:{{ $post->category->color }}"
                    >
                        {{ $post->category->name }}
                    </span>

                    <h3 class="text-xl font-semibold mt-3 mb-3 text-[#020617]">
                        {{ $post->title }}
                    </h3>

                    <p class="text-sm text-gray-600 mb-6">
                        {{ Str::limit($post->excerpt, 120) }}
                    </p>

                    <div class="text-xs text-gray-500 flex justify-between">
                        <span>{{ $post->author->name ?? 'TechGap' }}</span>
                        <span>{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                </article>
            @endforeach
        </div>

    </div>
</section>
@endif

{{-- Latest & Sidebar --}}
<section style="background:#FFFFFF">
    <div class="max-w-7xl mx-auto px-6 py-24">
        <div class="grid lg:grid-cols-3 gap-12">

            {{-- Últimos artículos --}}
            <div class="lg:col-span-2">
                <h2 class="text-3xl font-bold text-[#020617] mb-10">
                    Últimos artículos
                </h2>

                <div class="grid md:grid-cols-2 gap-8">
                    @foreach($latestPosts as $post)
                        <article class="border p-5 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-black/10" style="border-color:#E5E7EB">
                            <span
                                class="text-xs font-medium"
                                style="color:{{ $post->category->color }}"
                            >
                                {{ $post->category->name }}
                            </span>

                            <h4 class="text-base font-semibold mt-2 mb-2 text-[#020617]">
                                <a href="{{ route('posts.show', $post->slug) }}" class="transition-opacity duration-200 group-hover:opacity-80">
                                    {{ $post->title }}
                                </a>
                            </h4>

                            <p class="text-sm text-gray-600 mb-4">
                                {{ Str::limit($post->excerpt, 90) }}
                            </p>

                            <span class="text-xs text-gray-500">
                                {{ $post->created_at->format('d M Y') }}
                            </span>
                        </article>
                    @endforeach
                </div>
            </div>

            {{-- Sidebar --}}
            <aside>
                <div class="border p-6" style="border-color:#E5E7EB">
                    <h4 class="text-lg font-semibold text-[#020617] mb-4">
                        Artículos populares
                    </h4>

                    <ul class="space-y-4">
                        @foreach($popularPosts as $post)
                            <li>
                                <a href="{{ route('posts.show', $post->slug) }}" class="text-sm font-medium text-gray-700 hover:text-[#1BBF9B] transition-opacity duration-200 group-hover:opacity-80">
                                    {{ $post->title }}
                                </a>
                                <div class="text-xs text-gray-500">
                                    {{ $post->views }} visitas
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </aside>

        </div>
    </div>
</section>

{{-- CTA --}}
<section style="background:#0F172A" class="py-20">
    <div class="max-w-4xl mx-auto px-6">

        <div class="bg-white/5 border border-white/10 rounded-2xl p-10 backdrop-blur-sm">

            <h3 class="text-3xl font-bold text-white mb-4">
                ¿Quieres ser escritor en TechGap?
            </h3>

            <p class="text-gray-400 mb-8">
                Comparte tu experiencia, ayuda a otros y construye tu reputación como creador de contenido técnico.
            </p>

            @auth
                @if(auth()->user()->isSubscriber())
                    <a href="#"
                       class="inline-block px-6 py-3 rounded-xl font-medium text-sm transition
                              bg-white/10 text-gray-200 border border-white/20
                              hover:bg-white/20 hover:border-white/30 hover:text-white">
                        Solicitar ser Escritor
                    </a>
                @endif
            @else
                <a href="{{ route('register') }}"
                   class="inline-block px-6 py-3 rounded-xl font-medium text-sm transition
                          bg-white/10 text-gray-200 border border-white/20
                          hover:bg-white/20 hover:border-white/30 hover:text-white">
                    Crear Cuenta Gratis
                </a>
            @endauth

            {{-- FEED DE ACTIVIDAD --}}
            <div class="mt-10 space-y-6">

                {{-- ITEM 1 --}}
                <div class="flex items-start gap-4">
                    <img src="https://i.pravatar.cc/60?img=12" class="w-10 h-10 rounded-full" alt="avatar">

                    <div>
                        <p class="text-gray-300 text-sm">
                            <span class="font-semibold">Eduardo Benz</span> comentó tu post sobre
                            <span class="text-emerald-300 font-medium">Laravel 11</span>.
                            <span class="text-gray-500">hace 6 horas</span>
                        </p>

                        <p class="text-gray-400 text-sm italic mt-1">
                            "Tienes toda la razón amigo, muchas gracias por compartirlo"
                        </p>
                    </div>
                </div>

                {{-- ITEM 2 --}}
                <div class="flex items-start gap-4">
                    <img src="https://i.pravatar.cc/60?img=32" class="w-10 h-10 rounded-full" alt="avatar">

                    <div>
                        <p class="text-gray-300 text-sm">
                            <span class="font-semibold">Laura Durcal</span> le dio like a tu post sobre
                            <span class="text-sky-300 font-medium">Tech Data</span>.
                            <span class="text-gray-500">hace 2 horas</span>
                        </p>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>
@endsection
