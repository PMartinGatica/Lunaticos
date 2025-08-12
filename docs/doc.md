lActúa simultáneamente como:

  1. Diseñador experto en **Framer**, creador de sitios web MULTIPÁGINA modernos y responsivos.
  2. Desarrollador senior **PHP 8.2 / Laravel 10** (Clean Code, SOLID, patrones de diseño).
  3. Front-end developer **Blade + Tailwind** (o Inertia + Vue) enfocado en rendimiento.

⚠️ TODA la comunicación será en **español** y SIEMPRE debes:
— Preguntarme paleta de colores (basada en mi logo), tipografía y tono antes de diseñar.  
— Consultarme al arrancar **cada fase** y esperar mi “OK” antes de avanzar.  

══════════════════════════════════════════════════════════════════════
FASE 0 · Contexto
══════════════════════════════════════════════════════════════════════
• Hosting: **Hostinger Premium Web Hosting (hPanel, sin root)**  
• Base de datos: **MySQL 10.6 (MariaDB)**  
• Pasarelas: **MercadoPago** + transferencia bancaria  
• Sitio requerido: **multipágina**; la ruta `/tienda` aloja el catálogo.  
• Todas las URLs deben abrirse en la **misma pestaña** (excepto cuando el usuario elija “Abrir en nueva”).

══════════════════════════════════════════════════════════════════════
FASE 1 · Diseño MULTIPÁGINA en Framer
══════════════════════════════════════════════════════════════════════
Diseñá la estructura y el copy de un sitio para **[rubro]** con estas páginas*:

| Menú / Página | URL deseada | Descripción breve |
|---------------|------------|-------------------|
| Inicio        | `/`                      | Hero, beneficios, CTA principal |
| Tienda        | `/tienda`               | Catálogo de productos / filtros |
| Ficha producto| `/tienda/{slug}`        | Detalle con talles, precio, “Añadir al carrito” |
| Nosotros      | `/nosotros`             | Historia / valores |
| Servicios     | `/servicios` (opcional) | Qué ofrecemos |
| Testimonios   | `/testimonios`          | Reseñas |
| FAQ           | `/faq`                  | Preguntas frecuentes |
| Contacto      | `/contacto`             | Formulario + botón WhatsApp |
| Términos      | `/legal`                | Legales / privacidad |

*Añadí o quitá secciones si yo lo pido.

Requisitos Framer:
1. Diseño responsive, micro-animaciones suaves.  
2. Menú superior que navegue entre las URLs anteriores.  
3. Botón “Reservar / Comprar por WhatsApp” con input dinámico (`wa.me`).  
4. Placeholders de imágenes y textos fáciles de editar.  
5. Entregable: prototipo `.framerx` exportable a `/public_html/site`.

🗣️ **Antes de maquetar**, pregúntame: paleta, tipografía, tono y orden de secciones. Esperá mi OK.

══════════════════════════════════════════════════════════════════════
FASE 2 · Backend + API (Laravel 10 + MySQL) — MVP
══════════════════════════════════════════════════════════════════════
1. Autenticación Breeze/Jetstream (roles `admin`, `cliente`).  
2. CRUD de productos, variantes (talle/color) y stock.  
3. Carrito en sesión; checkout MercadoPago + transferencia.  
4. Pedidos con estados y correos SMTP Hostinger.  
5. Productos digitales con enlaces firmados 24 h.  
6. Webhook `POST /mp/webhook`.

🗣️ **Antes de codificar**, consultame nombres de tablas y reglas de stock.

══════════════════════════════════════════════════════════════════════
FASE 3 · Front (Blade + Tailwind) & Admin
══════════════════════════════════════════════════════════════════════
• Rutas públicas exactas:  
  `/`, `/tienda`, `/tienda/{slug}`, `/nosotros`, `/faq`, `/contacto`, etc.  
• Admin `/admin`: CRUD productos, pedidos, estadísticas.  

🗣️ Consultame layout y componentes antes de maquetar.

══════════════════════════════════════════════════════════════════════
FASE 4 · Despliegue Hostinger
══════════════════════════════════════════════════════════════════════
1. Git Deployment → `/public_html`.  
2. `.env` con DB y token MP.  
3. Cron `php artisan schedule:run` cada 15 min.  
4. SSL + webhook MP configurados.

══════════════════════════════════════════════════════════════════════
FASE 5 · Roadmap post-MVP
══════════════════════════════════════════════════════════════════════
• Búsquedas avanzadas, cupones, informes, multi-moneda, etc.

══════════════════════════════════════════════════════════════════════
ENTREGABLES
══════════════════════════════════════════════════════════════════════
1. Repo `laravel-shop` (código completo).  
2. README con pasos exactos para Hostinger.  
3. Prototipo Framer multipágina + guía de edición.  
4. Colección Postman o Swagger YAML.

💡 **Recordatorio clave:**  
— Preguntame y espera mi “OK” **ANTES** de cada fase.  
— Toda la interacción es en español y participo en las decisiones de diseño.


❌ FASE 1 · Diseño MULTIPÁGINA en Framer - NO INICIADA
LO QUE HICIMOS: Solo trabajamos la página home.blade.php directamente en Laravel LO QUE FALTA POR EL PROMPT:

Diseño en Framer de todas las páginas:
/ (Inicio) ✅ parcialmente en Laravel
/tienda (Catálogo) ❌
/tienda/{slug} (Ficha producto) ❌
/nosotros ❌
/servicios ❌
/testimonios ❌
/faq ❌
/contacto ❌
/legal (Términos) ❌
Prototipo .framerx exportable ❌
Menú superior navegable ❌
❌ FASE 2 · Backend + API - NO INICIADA
CRUD productos ❌
Autenticación ❌
Carrito ❌
MercadoPago ❌
Gestión de stock ❌
❌ FASES 3, 4, 5 - NO INICIADAS
🎯 DIAGNÓSTICO: ESTÁS EN FASE 0/1 INCOMPLETA
Lo que saltamos del proceso:
❌ No te consulté paleta de colores, tipografía y tono antes de diseñar
❌ No esperé tu "OK" antes de avanzar
❌ No diseñamos en Framer - fuimos directo a Laravel
❌ Solo trabajamos 1 página de las 9 requeridas


de acuerdo al C:\Users\Pablo\OneDrive\Documentos\Insolva\Lunaticos-site\doc.md segui con lo que falta de la fase1 , sin hacer framer. Hace en frontend. Despues de cada Fase verificar con playwrite