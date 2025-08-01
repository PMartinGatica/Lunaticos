const { chromium } = require('playwright');

async function visualTest() {
  console.log('Iniciando prueba visual...');
  
  // Lanzar navegador
  const browser = await chromium.launch({ headless: false });
  const context = await browser.newContext();
  const page = await context.newPage();
  
  try {
    // Inyectar código para capturar errores de JavaScript
    await page.addInitScript(() => {
      window.consoleErrors = [];
      const originalConsoleError = console.error;
      console.error = (...args) => {
        window.consoleErrors.push(args);
        originalConsoleError.apply(console, args);
      };
    });

    // Visitar la página home
    console.log('Navegando a la página home...');
    await page.goto('http://localhost:8000');
    console.log('Página cargada correctamente');
    
    // Verificar estructura general
    console.log('\n=== Verificando estructura general ===');
    
    // Verificar header
    const header = await page.$('header');
    console.log('Header:', header ? '✓ Encontrado' : '✗ No encontrado');
    
    // Verificar secciones principales
    const sections = await page.$$('section');
    console.log(`Secciones principales: ${sections.length} encontradas`);
    
    // Verificar footer
    const footer = await page.$('footer');
    console.log('Footer:', footer ? '✓ Encontrado' : '✗ No encontrado');
    
    // Verificar elementos visuales críticos
    console.log('\n=== Verificando elementos visuales críticos ===');
    
    // Logo
    const logo = await page.$('header img');
    console.log('Logo:', logo ? '✓ Encontrado' : '✗ No encontrado');
    
    // Hero image
    const heroImage = await page.$('section.py-8 img');
    console.log('Imagen principal:', heroImage ? '✓ Encontrada' : '✗ No encontrada');
    
    // Productos
    const products = await page.$$('.elegant-product-card');
    console.log(`Tarjetas de productos: ${products.length} encontradas`);
    
    // Categorías
    const categories = await page.$$('section:has-text("Categorías") a');
    console.log(`Categorías: ${categories.length} encontradas`);
    
    // Verificar estilos CSS
    console.log('\n=== Verificando estilos CSS ===');
    
    // Verificar que se aplican los colores correctos
    const hasGoldElements = await page.evaluate(() => {
      const elements = document.querySelectorAll('.text-gold-400, .bg-gold-500');
      return elements.length > 0;
    });
    
    console.log('Elementos con colores dorados:', hasGoldElements ? '✓ Encontrados' : '✗ No encontrados');
    
    // Verificar que se aplica el fondo oscuro
    const hasDarkBackground = await page.evaluate(() => {
      const bodyBg = window.getComputedStyle(document.body).backgroundColor;
      return bodyBg.includes('rgb(0, 0, 0)') || 
             bodyBg.includes('rgb(17, 24, 39)') || 
             bodyBg.includes('rgb(31, 41, 55)');
    });
    
    console.log('Fondo oscuro:', hasDarkBackground ? '✓ Aplicado' : '✗ No aplicado');
    
    // Verificar errores en consola
    const logs = await page.evaluate(() => {
      return Promise.resolve(
        window.consoleErrors || []
      );
    });
    
    console.log('\n=== Errores en consola ===');
    if (logs.length > 0) {
      console.error(`Se encontraron ${logs.length} errores en consola:`, logs);
    } else {
      console.log('✓ No se encontraron errores JavaScript en consola');
    }
    
    // Tomar capturas de pantalla de secciones clave
    console.log('\n=== Tomando capturas de pantalla ===');
    await page.screenshot({ path: 'debug-full-page.png', fullPage: true });
    console.log('✓ Captura completa guardada como debug-full-page.png');
    
    if (header) {
      await header.screenshot({ path: 'debug-header.png' });
      console.log('✓ Captura de header guardada como debug-header.png');
    }
    
    for (let i = 0; i < Math.min(sections.length, 3); i++) {
      await sections[i].screenshot({ path: `debug-section-${i+1}.png` });
      console.log(`✓ Captura de sección ${i+1} guardada como debug-section-${i+1}.png`);
    }
    
    // Esperar para revisión visual
    console.log('\nManteniendo navegador abierto por 30 segundos para revisión visual...');
    await page.waitForTimeout(30000);
    
  } catch (error) {
    console.error('Error durante la prueba visual:', error);
  } finally {
    // Cerrar navegador
    await browser.close();
    console.log('Navegador cerrado');
  }
}

visualTest().catch(console.error);
