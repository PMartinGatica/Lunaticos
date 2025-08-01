const fs = require('fs');
const path = require('path');

function analyzeHtmlTags(filePath) {
  console.log(`Analizando HTML tags en: ${filePath}`);
  
  try {
    // Leer el archivo
    const content = fs.readFileSync(filePath, 'utf8');
    const lines = content.split('\n');
    
    // Rastrear apertura y cierre de tags
    const divs = {
      open: [],
      close: []
    };
    
    const sections = {
      open: [],
      close: []
    };
    
    // Analizar cada línea
    lines.forEach((line, index) => {
      const lineNumber = index + 1;
      
      // Contar divs abiertos
      let pos = 0;
      while ((pos = line.indexOf('<div', pos)) !== -1) {
        // Asegurarse que es un tag real (no parte de un string o comentario)
        if (isRealHtmlTag(line, pos)) {
          divs.open.push({
            line: lineNumber,
            position: pos,
            content: line.trim()
          });
        }
        pos += 4; // Avanzar más allá de '<div'
      }
      
      // Contar divs cerrados
      pos = 0;
      while ((pos = line.indexOf('</div>', pos)) !== -1) {
        // Asegurarse que es un tag real
        if (isRealHtmlTag(line, pos)) {
          divs.close.push({
            line: lineNumber,
            position: pos,
            content: line.trim()
          });
        }
        pos += 6; // Avanzar más allá de '</div>'
      }
      
      // Contar sections abiertos
      pos = 0;
      while ((pos = line.indexOf('<section', pos)) !== -1) {
        if (isRealHtmlTag(line, pos)) {
          sections.open.push({
            line: lineNumber,
            position: pos,
            content: line.trim()
          });
        }
        pos += 8; // Avanzar más allá de '<section'
      }
      
      // Contar sections cerrados
      pos = 0;
      while ((pos = line.indexOf('</section>', pos)) !== -1) {
        if (isRealHtmlTag(line, pos)) {
          sections.close.push({
            line: lineNumber,
            position: pos,
            content: line.trim()
          });
        }
        pos += 10; // Avanzar más allá de '</section>'
      }
    });
    
    // Reportar resultados
    console.log('\n=== Análisis de Divs ===');
    console.log(`Total de <div> abiertos: ${divs.open.length}`);
    console.log(`Total de </div> cerrados: ${divs.close.length}`);
    
    if (divs.open.length !== divs.close.length) {
      console.log(`\nDesbalance de divs: ${divs.open.length - divs.close.length}`);
      
      if (divs.open.length > divs.close.length) {
        console.log('\nPosibles divs sin cerrar:');
        
        // Para cada div abierto, buscar si hay un div cerrado que corresponda
        // Esto es una simplificación y puede no ser preciso en casos complejos
        const unmatchedDivs = [...divs.open];
        
        for (let i = 0; i < Math.min(divs.open.length, divs.close.length); i++) {
          // Asumimos que los divs se cierran en orden inverso a como se abren
          unmatchedDivs.shift();
        }
        
        unmatchedDivs.forEach(div => {
          console.log(`Línea ${div.line}: ${div.content}`);
        });
      } else {
        console.log('\nPosibles divs cerrados sin abrir:');
        
        const unmatchedClosings = [...divs.close];
        
        for (let i = 0; i < Math.min(divs.open.length, divs.close.length); i++) {
          // Asumimos que los divs se cierran en orden inverso a como se abren
          unmatchedClosings.shift();
        }
        
        unmatchedClosings.forEach(div => {
          console.log(`Línea ${div.line}: ${div.content}`);
        });
      }
    } else {
      console.log('✓ Todos los divs están correctamente balanceados');
    }
    
    console.log('\n=== Análisis de Sections ===');
    console.log(`Total de <section> abiertos: ${sections.open.length}`);
    console.log(`Total de </section> cerrados: ${sections.close.length}`);
    
    if (sections.open.length !== sections.close.length) {
      console.log(`\nDesbalance de sections: ${sections.open.length - sections.close.length}`);
      
      if (sections.open.length > sections.close.length) {
        console.log('\nPosibles sections sin cerrar:');
        
        const unmatchedSections = [...sections.open];
        
        for (let i = 0; i < Math.min(sections.open.length, sections.close.length); i++) {
          unmatchedSections.shift();
        }
        
        unmatchedSections.forEach(section => {
          console.log(`Línea ${section.line}: ${section.content}`);
        });
      } else {
        console.log('\nPosibles sections cerrados sin abrir:');
        
        const unmatchedClosings = [...sections.close];
        
        for (let i = 0; i < Math.min(sections.open.length, sections.close.length); i++) {
          unmatchedClosings.shift();
        }
        
        unmatchedClosings.forEach(section => {
          console.log(`Línea ${section.line}: ${section.content}`);
        });
      }
    } else {
      console.log('✓ Todos los sections están correctamente balanceados');
    }
  } catch (error) {
    console.error('Error al analizar el archivo:', error);
  }
}

// Función para determinar si un tag es real o está dentro de un string/comentario
function isRealHtmlTag(line, position) {
  // Esta es una simplificación - idealmente usaríamos un parser HTML adecuado
  const beforeTag = line.substring(0, position);
  
  // Contar comillas simples y dobles antes de la posición
  const singleQuotes = (beforeTag.match(/'/g) || []).length;
  const doubleQuotes = (beforeTag.match(/"/g) || []).length;
  
  // Si hay un número impar de comillas, estamos dentro de un string
  if (singleQuotes % 2 !== 0 || doubleQuotes % 2 !== 0) {
    return false;
  }
  
  // Verificar si estamos en un comentario HTML
  if (beforeTag.lastIndexOf('<!--') > beforeTag.lastIndexOf('-->')) {
    return false;
  }
  
  return true;
}

// Ejecutar análisis
const homeFilePath = path.resolve(__dirname, '../../resources/views/home.blade.php');
analyzeHtmlTags(homeFilePath);
