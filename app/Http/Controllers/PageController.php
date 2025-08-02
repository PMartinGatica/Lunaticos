<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function faq()
    {
        $faqs = [
            [
                'question' => '¿Cómo puedo realizar una compra?',
                'answer' => 'Puedes agregar productos a tu carrito y finalizar la compra a través de nuestro sistema seguro de pagos, o contactarnos por WhatsApp para una atención personalizada.'
            ],
            [
                'question' => '¿Qué métodos de pago aceptan?',
                'answer' => 'Aceptamos MercadoPago (tarjetas de crédito/débito, efectivo) y transferencias bancarias.'
            ],
            [
                'question' => '¿Hacen envíos a todo el país?',
                'answer' => 'Sí, realizamos envíos a todo Argentina a través de correos y transportes de confianza.'
            ],
            [
                'question' => '¿Cuál es el tiempo de entrega?',
                'answer' => 'Los envíos demoran entre 3 a 7 días hábiles según la zona de destino.'
            ],
            [
                'question' => '¿Puedo cambiar o devolver un producto?',
                'answer' => 'Sí, aceptamos cambios y devoluciones dentro de los 30 días de la compra, siempre que el producto esté en perfecto estado.'
            ],
            [
                'question' => '¿Cómo sé qué talle elegir?',
                'answer' => 'Cada producto tiene una guía de talles. También puedes contactarnos por WhatsApp para asesoramiento personalizado.'
            ]
        ];

        return view('pages.faq', compact('faqs'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function terminosCondiciones()
    {
        return view('pages.terminos-condiciones');
    }

    public function politicaPrivacidad()
    {
        return view('pages.politica-privacidad');
    }

    public function terminosServicio()
    {
        return view('pages.terminos-servicio');
    }

    public function testimonios()
    {
        return view('testimonios');
    }

    public function whatsapp(Product $product = null)
    {
        $phone = '5491112345678'; // Cambiar por el número real
        $message = '¡Hola! Me interesa ';
        
        if ($product) {
            $message .= 'el producto: ' . $product->name . ' - ' . route('product.show', $product->slug);
        } else {
            $message .= 'obtener más información sobre sus productos.';
        }

        $whatsappUrl = 'https://wa.me/' . $phone . '?text=' . urlencode($message);
        
        return redirect($whatsappUrl);
    }
}
