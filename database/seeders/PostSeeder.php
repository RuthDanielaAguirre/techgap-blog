<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $writers = User::whereHas('role', fn($q) => $q->whereIn('name', ['admin', 'writer']))->get();
        $tags = Tag::all();

        $posts = [
            // -------------------------
            // LENGUAJE DEL CÓDIGO (5)
            // -------------------------
            [
                'title' => '¿Qué demonios es un Middleware? 🧩',
                'excerpt' => 'La palabra que suena a sandwich pero controla tu app.',
                'content' => $this->middlewareContent(),
                'category' => 'Lenguaje del Código',
                'tags' => ['Laravel', 'Jerga Tech', 'Conceptos Clave'],
            ],
            [
                'title' => 'Migrations: cuando tu base de datos también se muda 📦',
                'excerpt' => 'Laravel y sus metáforas inmobiliarias.',
                'content' => $this->migrationsContent(),
                'category' => 'Lenguaje del Código',
                'tags' => ['Laravel', 'Etimología'],
            ],
            [
                'title' => 'Factories: fábricas de datos sin humo 🏭',
                'excerpt' => 'Producción en masa, pero de modelos.',
                'content' => $this->factoriesContent(),
                'category' => 'Lenguaje del Código',
                'tags' => ['Laravel', 'Metáforas'],
            ],
            [
                'title' => '¿Por qué “Controller”? ✈️',
                'excerpt' => 'El origen aeronáutico del término.',
                'content' => $this->controllerContent(),
                'category' => 'Lenguaje del Código',
                'tags' => ['Inglés Técnico', 'Historia de Términos'],
            ],
            [
                'title' => 'Depurar vs Debuggear 🐞',
                'excerpt' => 'Cuando el inglés técnico se vuelve verbo.',
                'content' => $this->debugContent(),
                'category' => 'Lenguaje del Código',
                'tags' => ['Jerga Tech', 'Inglés Técnico'],
            ],

            // -------------------------
            // GIT & COLABORACIÓN (5)
            // -------------------------
            [
                'title' => 'Pull Request: no estás tirando de nada 🔄',
                'excerpt' => 'Git también tiene su propio idioma.',
                'content' => $this->pullRequestContent(),
                'category' => 'Cultura Git & Colaboración',
                'tags' => ['Git', 'Pull Request'],
            ],
            [
                'title' => 'Mergear: ¿es español? 🤔',
                'excerpt' => 'Spoiler: no, pero ya lo adoptamos.',
                'content' => $this->mergeContent(),
                'category' => 'Cultura Git & Colaboración',
                'tags' => ['Git', 'Jerga Tech'],
            ],
                        [
                'title' => 'Branches: las ramas que no están en un árbol 🌿',
                'excerpt' => 'Git y sus metáforas botánicas.',
                'content' => $this->branchesContent(),
                'category' => 'Cultura Git & Colaboración',
                'tags' => ['Git', 'Branching', 'Metáforas'],
            ],
            [
                'title' => 'Commits: pequeñas cápsulas de tiempo ⏳',
                'excerpt' => 'Tu historial es tu diario.',
                'content' => $this->commitsContent(),
                'category' => 'Cultura Git & Colaboración',
                'tags' => ['Git', 'Historia de Términos'],
            ],
            [
                'title' => 'Workflow: el flujo que nadie te explicó 🔁',
                'excerpt' => 'Cómo se organiza un equipo sin morir.',
                'content' => $this->workflowContent(),
                'category' => 'Cultura Git & Colaboración',
                'tags' => ['Git', 'Colaboración'],
            ],

            // -------------------------
            // ARQUITECTURA & METÁFORAS (4)
            // -------------------------
            [
                'title' => 'Frontend y Backend: metáforas espaciales 🧭',
                'excerpt' => 'Lo que ves y lo que sostiene lo que ves.',
                'content' => $this->frontendBackendContent(),
                'category' => 'Arquitectura & Metáforas Técnicas',
                'tags' => ['Metáforas', 'Arquitectura Mental'],
            ],
            [
                'title' => 'Monolito vs Microservicios 🧱➡️🧩',
                'excerpt' => '¿Una sola pieza o muchas piezas pequeñas?',
                'content' => $this->monolitoContent(),
                'category' => 'Arquitectura & Metáforas Técnicas',
                'tags' => ['Arquitectura Mental', 'Conceptos Clave'],
            ],
            [
                'title' => 'Escalar una aplicación 📈',
                'excerpt' => 'Cuando crecer no es solo crecer.',
                'content' => $this->escalarContent(),
                'category' => 'Arquitectura & Metáforas Técnicas',
                'tags' => ['Metáforas', 'Buzzwords'],
            ],
            [
                'title' => 'Estado: lo que tu app recuerda 🧠',
                'excerpt' => 'El concepto más abstracto de la programación.',
                'content' => $this->estadoContent(),
                'category' => 'Arquitectura & Metáforas Técnicas',
                'tags' => ['Conceptos Clave', 'Arquitectura Mental'],
            ],

            // -------------------------
            // INFRAESTRUCTURA & CONTENEDORES (4)
            // -------------------------
            [
                'title' => 'Docker: ¿por qué lo llaman contenedor? 🚢',
                'excerpt' => 'Metáforas marítimas en el mundo tech.',
                'content' => $this->dockerContent(),
                'category' => 'Infraestructura & Contenedores',
                'tags' => ['Docker', 'Metáforas'],
            ],
            [
                'title' => 'Levantar un servicio: ¿de dónde viene eso? 🏋️‍♂️',
                'excerpt' => 'Spoiler: no tiene que ver con pesas.',
                'content' => $this->levantarContent(),
                'category' => 'Infraestructura & Contenedores',
                'tags' => ['Redes', 'Jerga Tech'],
            ],
            [
                'title' => 'Daemon: procesos que trabajan en las sombras 👻',
                'excerpt' => 'Un nombre con historia mitológica.',
                'content' => $this->daemonContent(),
                'category' => 'Infraestructura & Contenedores',
                'tags' => ['Historia de Términos', 'Redes'],
            ],
            [
                'title' => 'Redes: paquetes que viajan sin maleta 📡',
                'excerpt' => 'Cómo se mueve la información.',
                'content' => $this->redesContent(),
                'category' => 'Infraestructura & Contenedores',
                'tags' => ['Redes', 'Metáforas'],
            ],

            // -------------------------
            // IA & AUTOMATIZACIÓN (4)
            // -------------------------
            [
                'title' => 'Tokens: la moneda secreta de los modelos 🪙',
                'excerpt' => 'No son monedas, pero valen mucho.',
                'content' => $this->tokensContent(),
                'category' => 'IA & Automatización',
                'tags' => ['IA', 'Tokens'],
            ],
            [
                'title' => '¿Qué es un modelo realmente? 🧠',
                'excerpt' => 'No es una persona ni un archivo.',
                'content' => $this->modeloContent(),
                'category' => 'IA & Automatización',
                'tags' => ['IA', 'Conceptos Clave'],
            ],
            [
                'title' => 'Prompt: la instrucción que lo cambia todo ✍️',
                'excerpt' => 'Hablar con máquinas también es un arte.',
                'content' => $this->promptContent(),
                'category' => 'IA & Automatización',
                'tags' => ['IA', 'Prompting'],
            ],
            [
                'title' => 'Embeddings: mapas invisibles del lenguaje 🗺️',
                'excerpt' => 'Cómo las máquinas entienden similitudes.',
                'content' => $this->embeddingsContent(),
                'category' => 'IA & Automatización',
                'tags' => ['IA', 'Conceptos Clave'],
            ],
        ];

                foreach ($posts as $data) {
            $category = Category::where('name', $data['category'])->first();

            $post = Post::create([
                'user_id' => $writers->random()->id,
                'category_id' => $category->id,
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'excerpt' => $data['excerpt'],
                'content' => $data['content'],
                'status' => 'published',
                'is_featured' => false,
                'published_at' => now()->subDays(rand(1, 30)),
                'reading_time' => rand(4, 10) . ' min',
                'views_count' => rand(50, 500),
                'likes_count' => rand(5, 50),
                'comments_count' => rand(0, 10),
            ]);

            $tagIds = Tag::whereIn('name', $data['tags'])->pluck('id');
            $post->tags()->attach($tagIds);
        }
    }

    private function middlewareContent(): string 
    {
        return <<<TEXT
        Un *middleware* es simplemente un **filtro** que se ejecuta antes o después de una petición.

        Piensa en él como el portero de una discoteca:

        - ¿Tienes permiso?
        - ¿Estás autenticado?
        - ¿Vienes con buena intención?

        Si todo va bien, te deja pasar.  
        Si no, te devuelve a la calle.

        No es magia.  
        Es solo un paso intermedio que decide si la petición continúa.
        TEXT;
    }

    private function migrationsContent(): string 
    {
        return <<<TEXT
        Las *migraciones* son como mudanzas para tu base de datos.

        Cambian estructuras, agregan columnas, renuevan espacios.

        Laravel las llama así porque tu base de datos **migra** de un estado a otro.

        No necesitas entender SQL profundo para usarlas:  
        solo describir qué quieres cambiar, y Laravel hace el resto.
        TEXT;
    }

    private function factoriesContent(): string 
    {
        return <<<TEXT
        Una *factory* es una fábrica de datos falsos pero útiles.

        Sirven para poblar tu base de datos con:

        - usuarios de prueba  
        - posts de ejemplo  
        - comentarios generados  

        Son perfectas cuando estás desarrollando y necesitas ver cómo se comporta tu app con datos reales.
        TEXT;
    }

    private function controllerContent(): string 
    {
        return <<<TEXT
        El nombre *controller* viene del mundo de la aviación:  
        el **air traffic controller** dirige el tráfico aéreo.

        En Laravel hace lo mismo:

        - recibe una petición  
        - decide qué hacer  
        - devuelve una respuesta  

        No hace todo.  
        Solo coordina.
        TEXT;   
    }

    private function debugContent(): string 
    {
        return <<<TEXT
        Debuggear viene de *bug*, que significa error.

        Depurar es la versión formal en español.

        Ambas significan lo mismo:  
        **encontrar y corregir problemas**.

        Pero debuggear suena más natural en el mundo dev.
        TEXT;
    }

    private function branchesContent(): string 
    {
        return <<<TEXT
        Un *branch* es una rama… pero no de un árbol.

        Es una **línea paralela de desarrollo** donde puedes experimentar sin romper nada.

        ### ¿Por qué existe?

        Porque trabajar todos en la misma rama sería un caos.

        ### Piensa en esto:

        - `main` → la versión estable  
        - `feature/login` → estás creando el login  
        - `fix/typo` → corriges un error pequeño  

        Cada rama es un camino alternativo que luego puede volver a unirse.
        TEXT;
    }

    private function commitsContent(): string {
        return <<<TEXT
    Un *commit* es como guardar partida en un videojuego.

    ### ¿Qué guarda?

    - tus cambios  
    - un mensaje  
    - un punto seguro al que volver  

    ### ¿Por qué importa?

    Porque cuando algo se rompe, un commit bien escrito te salva la vida.

    Es tu diario de desarrollo.
    TEXT;
    }

    private function workflowContent(): string 
    {
        return <<<TEXT
        Un *workflow* es la coreografía del equipo.

        Define:

        - quién revisa  
        - quién aprueba  
        - cuándo se fusiona  

        No es una regla estricta, es un acuerdo para no pisarse entre todos.

        Un buen workflow evita discusiones y acelera el trabajo.
        TEXT;
    }

    private function frontendBackendContent(): string 
    {
        return <<<TEXT
    El *frontend* es lo que ves.  
    El *backend* es lo que sostiene lo que ves.

    ### Metáfora rápida:

    - Frontend → la fachada de un edificio  
    - Backend → la estructura interna que no ves pero mantiene todo en pie  

    Ambos son mundos distintos, pero se necesitan mutuamente.
    TEXT;
    }

    private function monolitoContent(): string 
    {
        return <<<TEXT
        Un *monolito* es una sola pieza grande.  
        Los *microservicios* son muchas piezas pequeñas que colaboran.

        ### ¿Cuál es mejor?

        Ninguno.  
        Solo son **formas distintas de organizar un sistema**.

        El monolito es simple.  
        Los microservicios son flexibles.

        Cada uno tiene su personalidad.
        TEXT;
    }

    private function escalarContent(): string 
    {
        return <<<TEXT
    Escalar no es solo crecer.

    Es crecer **sin perder rendimiento**.

    ### Ejemplo:

    Si tu app pasa de 10 usuarios a 10.000,  
    ¿sigue funcionando igual de bien?

    Si la respuesta es sí, escalaste correctamente.
    TEXT;
    }

    private function estadoContent(): string {
        return <<<TEXT
    El *estado* es lo que tu aplicación recuerda.

    Puede ser:

    - un usuario logueado  
    - un contador  
    - un carrito de compras  

    Gestionarlo bien es clave para que tu app no se vuelva impredecible.
    TEXT;
    }

    private function dockerContent(): string 
    {
        return <<<TEXT
        Docker usa la metáfora de los contenedores marítimos.

        Un contenedor lleva todo lo necesario para que algo funcione igual en cualquier lugar.

        En tecnología pasa lo mismo:

        - tu app  
        - sus dependencias  
        - su configuración  

        Todo viaja junto, sin sorpresas.

        Por eso se llama contenedor.
        TEXT;
    }

    private function levantarContent(): string 
    {
        return <<<TEXT
        “Levantar un servicio” viene de cuando los servidores eran máquinas físicas.

        Literalmente había que **levantarlas**, encenderlas, ponerlas en marcha.

        Hoy solo significa:

        > iniciar un proceso

        Pero la expresión se quedó.
        TEXT;
    }

    private function daemonContent(): string 
    {
        return <<<TEXT
        Un *daemon* es un proceso que trabaja en segundo plano.

        El nombre viene de la mitología griega:

        > seres invisibles que realizaban tareas sin ser vistos

        Perfecta metáfora para procesos que:

        - escuchan  
        - esperan  
        - ejecutan  
        - sin molestar a nadie  
        TEXT;
    }

    private function redesContent(): string 
    {
        return <<<TEXT
        En redes, un *paquete* no es una caja.

        Es un mensaje que viaja por la red:

        - pasa por nodos  
        - sigue rutas  
        - llega a destinos  

        Es como correo postal, pero sin maleta.
        TEXT;
    }

    private function tokensContent(): string 
    {
        return <<<TEXT
        Un *token* es una unidad mínima de texto que un modelo puede entender.

        No siempre es una palabra completa.

        Puede ser:

        - “pro”  
        - “gram”  
        - “ación”  

        Los modelos no leen como humanos.  
        Leen en tokens.
        TEXT;
    }

    private function modeloContent(): string 
    {
        return <<<TEXT
        Un *modelo* es una función matemática entrenada para reconocer patrones.

        No es un archivo cualquiera.  
        Es conocimiento comprimido.

        Le das datos.  
        Te da predicciones.
        TEXT;
    }

    private function promptContent(): string 
    {
        return <<<TEXT
        Un *prompt* es una instrucción.

        Pero también es:

        - contexto  
        - intención  
        - claridad  

        Hablar con una IA es un arte.  
        Y el prompt es tu pincel.
        TEXT;
    }

    private function embeddingsContent(): string 
    {
        return <<<TEXT
        Los *embeddings* convierten palabras en puntos dentro de un mapa invisible.

        En ese mapa:

        - palabras similares están cerca  
        - palabras distintas están lejos  

        Es la forma en que las máquinas entienden significado.
        TEXT;
    }

    private function pullRequestContent(): string 
    {
        return <<<TEXT
        Un *Pull Request* no es un comando extraño ni una acción física.  
        Es, en esencia, **una conversación entre desarrolladores**.

        Cuando abres un PR estás diciendo:

        > “Hola equipo, aquí están mis cambios.  
        > ¿Pueden revisarlos y decirme si todo está bien?”

        ### ¿Por qué “pull”?

        Porque estás pidiendo que **tiren** tus cambios hacia la rama principal.  
        No empujas nada: solicitas que alguien más los incorpore.

        ### ¿Por qué existe?

        - Para revisar código  
        - Para evitar errores  
        - Para mantener un historial claro  
        - Para colaborar sin pisarse  

        Un PR no es solo código.  
        Es comunicación, feedback y trabajo en equipo.  
        Es la parte más humana de Git.
        TEXT;
    }

    private function mergeContent(): string 
    {
        return <<<TEXT
        “Mergear” no es español… pero ya forma parte del vocabulario dev.

        ### ¿De dónde viene?

        De *merge*, que significa **unir** o **fusionar**.  
        En Git, mergear es combinar dos líneas de trabajo en una sola historia.

        ### ¿Por qué se usa tanto?

        Porque es la forma más natural de decir:

        > “Voy a juntar lo que hice con lo que hizo el resto del equipo.”

        ### ¿Qué pasa al mergear?

        - Git intenta unir los cambios  
        - Si todo encaja, perfecto  
        - Si no, aparecen los famosos *conflictos*  

        No es un proceso misterioso.  
        Es simplemente juntar piezas de un mismo proyecto.

        Mergear es colaborar.
        TEXT;
    }
}
