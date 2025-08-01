const fs = require('fs');
const path = require('path');

function findBladeTagPositions(filePath, tag) {
  console.log(`Buscando posiciones de "${tag}" en: ${filePath}`);
  
  try {
    // Leer el archivo
    const content = fs.readFileSync(filePath, 'utf8');
    const lines = content.split('\n');
    
    const positions = [];
    
    // Buscar el tag en cada línea
    lines.forEach((line, index) => {
      const lineNumber = index + 1;
      if (line.includes(tag)) {
        positions.push({
          line: lineNumber,
          content: line.trim()
        });
      }
    });
    
    return positions;
  } catch (error) {
    console.error('Error al analizar el archivo:', error);
    return [];
  }
}

const homeFilePath = path.resolve(__dirname, '../../resources/views/home.blade.php');

// Buscar secciones
console.log('\n=== Posiciones de @section ===');
const sections = findBladeTagPositions(homeFilePath, '@section');
sections.forEach(pos => {
  console.log(`Línea ${pos.line}: ${pos.content}`);
});

console.log('\n=== Posiciones de @endsection ===');
const endsections = findBladeTagPositions(homeFilePath, '@endsection');
endsections.forEach(pos => {
  console.log(`Línea ${pos.line}: ${pos.content}`);
});

// Buscar condicionales
console.log('\n=== Posiciones de @if ===');
const ifs = findBladeTagPositions(homeFilePath, '@if');
ifs.forEach(pos => {
  console.log(`Línea ${pos.line}: ${pos.content}`);
});

console.log('\n=== Posiciones de @endif ===');
const endifs = findBladeTagPositions(homeFilePath, '@endif');
endifs.forEach(pos => {
  console.log(`Línea ${pos.line}: ${pos.content}`);
});
