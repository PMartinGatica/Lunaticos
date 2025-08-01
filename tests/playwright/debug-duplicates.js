const fs = require('fs');
const path = require('path');

function findDuplicateSections(filePath) {
  console.log(`Buscando secciones duplicadas en: ${filePath}`);
  
  try {
    const content = fs.readFileSync(filePath, 'utf8');
    const lines = content.split('\n');
    
    // Buscar líneas que contienen secciones completas del layout
    let sectionStartLine = -1;
    const sections = [];
    
    for (let i = 0; i < lines.length; i++) {
      const line = lines[i].trim();
      
      if (line.includes('@section(\'content\')')) {
        sectionStartLine = i + 1;
      } else if (line.includes('@endsection') && sectionStartLine !== -1) {
        sections.push({
          start: sectionStartLine,
          end: i,
          content: lines.slice(sectionStartLine, i).join('\n')
        });
        sectionStartLine = -1;
      }
    }
    
    console.log(`Encontradas ${sections.length} secciones de contenido principales.`);
    
    // Buscar secciones duplicadas
    let hasDuplicates = false;
    
    for (let i = 0; i < sections.length; i++) {
      for (let j = i + 1; j < sections.length; j++) {
        const similarity = calculateSimilarity(sections[i].content, sections[j].content);
        
        if (similarity > 0.7) { // Umbral de similitud del 70%
          console.log(`\nPosibles secciones duplicadas:`);
          console.log(`Sección 1: Líneas ${sections[i].start + 1}-${sections[i].end + 1}`);
          console.log(`Sección 2: Líneas ${sections[j].start + 1}-${sections[j].end + 1}`);
          console.log(`Similitud: ${Math.round(similarity * 100)}%`);
          hasDuplicates = true;
        }
      }
    }
    
    if (!hasDuplicates) {
      console.log('No se encontraron secciones duplicadas.');
    }
    
    // Buscar bloques de código similares que podrían estar causando confusión
    console.log('\nBuscando bloques de código potencialmente duplicados...');
    const blockSize = 10; // Tamaño de bloque a comparar
    
    for (let i = 0; i < lines.length - blockSize; i += blockSize / 2) {
      for (let j = i + blockSize; j < lines.length - blockSize; j += blockSize / 2) {
        const block1 = lines.slice(i, i + blockSize).join('\n');
        const block2 = lines.slice(j, j + blockSize).join('\n');
        
        const similarity = calculateSimilarity(block1, block2);
        
        if (similarity > 0.8) { // Umbral de similitud del 80%
          console.log(`\nBloques de código similares:`);
          console.log(`Bloque 1: Líneas ${i + 1}-${i + blockSize}`);
          console.log(`Bloque 2: Líneas ${j + 1}-${j + blockSize}`);
          console.log(`Similitud: ${Math.round(similarity * 100)}%`);
        }
      }
    }
    
    // Buscar específicamente las líneas problemáticas (325-327)
    console.log('\nAnalizando las líneas problemáticas 325-327:');
    for (let i = 324; i <= 327; i++) {
      console.log(`Línea ${i + 1}: ${lines[i] || '[LÍNEA VACÍA O NO EXISTE]'}`);
    }
    
    // Buscar patrones que podrían estar causando problemas
    console.log('\nBuscando patrones problemáticos:');
    const patterns = [
      'section class="py-',
      'container mx-auto',
      'flex-col',
      'div class="flex'
    ];
    
    patterns.forEach(pattern => {
      const matches = [];
      lines.forEach((line, index) => {
        if (line.includes(pattern)) {
          matches.push({
            line: index + 1,
            content: line.trim()
          });
        }
      });
      
      if (matches.length > 0) {
        console.log(`\nPatrón "${pattern}" encontrado ${matches.length} veces:`);
        matches.forEach(match => {
          console.log(`Línea ${match.line}: ${match.content}`);
        });
      }
    });
    
  } catch (error) {
    console.error('Error al analizar el archivo:', error);
  }
}

// Función para calcular similitud entre dos strings
function calculateSimilarity(str1, str2) {
  // Implementación simple de similitud
  const set1 = new Set(str1.split(' '));
  const set2 = new Set(str2.split(' '));
  
  const intersection = [...set1].filter(item => set2.has(item));
  const union = new Set([...set1, ...set2]);
  
  return intersection.length / union.size;
}

// Ejecutar análisis
const homeFilePath = path.resolve(__dirname, '../../resources/views/home.blade.php');
findDuplicateSections(homeFilePath);
