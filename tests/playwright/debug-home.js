const { chromium } = require('playwright');

async function debugHomePage() {
  console.log('Iniciando navegador para debuggear la página home...');
  
  // Lanzar navegador
  const browser = await chromium.launch({ headless: false });
  const context = await browser.newContext();
  const page = await context.newPage();
  
  try {
    // Visitar la página home
    console.log('Navegando a la página home...');
    await page.goto('http://localhost:8000');
    console.log('Página cargada correctamente');
    
    // Verificar elementos críticos
    console.log('Verificando elementos críticos...');
    
    // Verificar hero section
    const heroSection = await page.$('section.py-8.mt-0');
    if (heroSection) {
      console.log('✓ Hero section encontrada');
    } else {
      console.error('✗ Hero section no encontrada');
    }
    
    // Verificar categorías
    const categoriesSection = await page.$('section:has(h2:has-text("Categorías"))');
    if (categoriesSection) {
      console.log('✓ Sección de categorías encontrada');
    } else {
      console.error('✗ Sección de categorías no encontrada');
    }
    
    // Verificar productos destacados
    const featuredProductsSection = await page.$('section:has(h2:has-text("Productos"))');
    if (featuredProductsSection) {
      console.log('✓ Sección de productos destacados encontrada');
    } else {
      console.error('✗ Sección de productos destacados no encontrada');
    }
    
    // Comprobar errores JavaScript en consola
    const logs = await page.evaluate(() => {
      return Promise.resolve(
        window.consoleErrors || []
      );
    });
    
    if (logs.length > 0) {
      console.error('Se encontraron errores en consola:', logs);
    } else {
      console.log('✓ No se encontraron errores JavaScript en consola');
    }
    
    // Tomar captura de pantalla
    await page.screenshot({ path: 'debug-home.png', fullPage: true });
    console.log('Captura de pantalla guardada como debug-home.png');
    
    // Esperar para revisar visualmente
    console.log('Manteniendo navegador abierto por 30 segundos para revisión visual...');
    await page.waitForTimeout(30000);
  } catch (error) {
    console.error('Error durante el debug:', error);
  } finally {
    // Cerrar navegador
    await browser.close();
    console.log('Navegador cerrado');
  }
}

debugHomePage().catch(console.error);
