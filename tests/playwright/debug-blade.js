const fs = require('fs');
const path = require('path');

function analyzeBlade(filePath) {
  console.log(`Analizando archivo: ${filePath}`);
  
  try {
    // Leer el archivo
    const content = fs.readFileSync(filePath, 'utf8');
    const lines = content.split('\n');
    
    console.log(`Archivo leído correctamente: ${lines.length} líneas`);
    
    // Analizar estructura básica de Blade
    const openingTags = {
      '@section': 0,
      '@if': 0,
      '@foreach': 0,
      '<div': 0,
      '<section': 0
    };
    
    const closingTags = {
      '@endsection': 0,
      '@endif': 0,
      '@endforeach': 0,
      '</div>': 0,
      '</section>': 0
    };
    
    // Analizar línea por línea
    let lineNumber = 0;
    const issues = [];
    
    lines.forEach((line, index) => {
      lineNumber = index + 1;
      const trimmedLine = line.trim();
      
      // Contar etiquetas
      Object.keys(openingTags).forEach(tag => {
        // Contar ocurrencias en esta línea
        const regex = new RegExp(tag.replace('@', '@\\s*'), 'g');
        const matches = trimmedLine.match(regex) || [];
        openingTags[tag] += matches.length;
        
        // Si es una etiqueta que abre pero no tiene su cierre en la misma línea
        if (matches.length > 0 && 
            (tag === '@if' || tag === '@foreach' || tag === '@section') &&
            !trimmedLine.includes(tag.replace('@', '@end'))) {
          // Verificar si hay algún comentario en la misma línea
          if (trimmedLine.includes('{{--') && trimmedLine.includes('--}}')) {
            issues.push(`Línea ${lineNumber}: Posible error - "${tag}" con comentario en la misma línea`);
          }
        }
      });
      
      Object.keys(closingTags).forEach(tag => {
        const regex = new RegExp(tag.replace('@', '@\\s*'), 'g');
        const matches = trimmedLine.match(regex) || [];
        closingTags[tag] += matches.length;
      });
      
      // Verificar sintaxis específica de Blade
      if (trimmedLine.includes('@endif') && !trimmedLine.startsWith('@endif')) {
        issues.push(`Línea ${lineNumber}: Error de sintaxis - "@endif" no está al inicio de la línea`);
      }
      
      if (trimmedLine.includes('@endforeach') && !trimmedLine.startsWith('@endforeach')) {
        issues.push(`Línea ${lineNumber}: Error de sintaxis - "@endforeach" no está al inicio de la línea`);
      }
      
      // Verificar {{ sin cerrar o }} sin abrir
      const openBraces = (trimmedLine.match(/{{/g) || []).length;
      const closeBraces = (trimmedLine.match(/}}/g) || []).length;
      
      if (openBraces !== closeBraces) {
        issues.push(`Línea ${lineNumber}: Error de sintaxis - Llaves desbalanceadas {{ }}`);
      }
    });
    
    // Verificar balance de etiquetas
    const balanceReport = [];
    
    if (openingTags['@section'] !== closingTags['@endsection']) {
      balanceReport.push(`@section: ${openingTags['@section']}, @endsection: ${closingTags['@endsection']}`);
    }
    
    if (openingTags['@if'] !== closingTags['@endif']) {
      balanceReport.push(`@if: ${openingTags['@if']}, @endif: ${closingTags['@endif']}`);
    }
    
    if (openingTags['@foreach'] !== closingTags['@endforeach']) {
      balanceReport.push(`@foreach: ${openingTags['@foreach']}, @endforeach: ${closingTags['@endforeach']}`);
    }
    
    if (openingTags['<div'] !== closingTags['</div>']) {
      balanceReport.push(`<div>: ${openingTags['<div']}, </div>: ${closingTags['</div>']}`);
    }
    
    if (openingTags['<section'] !== closingTags['</section>']) {
      balanceReport.push(`<section>: ${openingTags['<section']}, </section>: ${closingTags['</section>']}`);
    }
    
    // Reportar resultados
    console.log('\n=== Análisis de Estructura Blade ===');
    
    if (issues.length > 0) {
      console.log('\nProblemas encontrados:');
      issues.forEach(issue => console.log(`- ${issue}`));
    } else {
      console.log('✓ No se encontraron problemas de sintaxis');
    }
    
    if (balanceReport.length > 0) {
      console.log('\nEtiquetas desbalanceadas:');
      balanceReport.forEach(report => console.log(`- ${report}`));
    } else {
      console.log('✓ Todas las etiquetas están correctamente balanceadas');
    }
    
    // Detectar secciones duplicadas
    const sections = {};
    let inSection = false;
    let currentSection = '';
    
    lines.forEach((line, index) => {
      const trimmedLine = line.trim();
      
      if (trimmedLine.startsWith('@section')) {
        inSection = true;
        const match = trimmedLine.match(/@section\(['"](.*?)['"]/);
        if (match) {
          currentSection = match[1];
          if (sections[currentSection]) {
            issues.push(`Línea ${index + 1}: Sección duplicada - "${currentSection}"`);
          } else {
            sections[currentSection] = true;
          }
        }
      } else if (trimmedLine.startsWith('@endsection')) {
        inSection = false;
        currentSection = '';
      }
    });
    
    // Resumen final
    console.log('\n=== Resumen del Análisis ===');
    console.log(`Total de líneas: ${lines.length}`);
    console.log(`Problemas encontrados: ${issues.length}`);
    console.log(`Etiquetas desbalanceadas: ${balanceReport.length}`);
    
    return {
      success: issues.length === 0 && balanceReport.length === 0,
      issues,
      balanceReport
    };
    
  } catch (error) {
    console.error('Error al analizar el archivo:', error);
    return {
      success: false,
      issues: [`Error al leer el archivo: ${error.message}`],
      balanceReport: []
    };
  }
}

// Ejecutar análisis
const homeFilePath = path.resolve(__dirname, '../../resources/views/home.blade.php');
analyzeBlade(homeFilePath);
