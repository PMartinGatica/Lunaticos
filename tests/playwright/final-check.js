const fs = require('fs');

const filePath = 'C:\\Users\\Pablo\\OneDrive\\Documentos\\Insolva\\Lunaticos-site\\resources\\views\\home.blade.php';

console.log('=== VERIFICACIÓN FINAL DEL ARCHIVO ===');

if (!fs.existsSync(filePath)) {
    console.log('❌ El archivo no existe');
    process.exit(1);
}

const content = fs.readFileSync(filePath, 'utf8');
const lines = content.split('\n');

console.log(`📄 Archivo: ${filePath}`);
console.log(`📏 Total de líneas: ${lines.length}`);

// Análisis de tags HTML
const divOpen = (content.match(/<div[^>]*>/g) || []).length;
const divClose = (content.match(/<\/div>/g) || []).length;
const sectionOpen = (content.match(/<section[^>]*>/g) || []).length;
const sectionClose = (content.match(/<\/section>/g) || []).length;

console.log('\n=== BALANCE DE TAGS HTML ===');
console.log(`🏷️  Divs abiertos: ${divOpen}`);
console.log(`🏷️  Divs cerrados: ${divClose}`);
console.log(`🏷️  Balance divs: ${divOpen - divClose === 0 ? '✅ CORRECTO' : '❌ DESBALANCEADO (' + (divOpen - divClose) + ')'}`);

console.log(`🏷️  Sections abiertos: ${sectionOpen}`);
console.log(`🏷️  Sections cerrados: ${sectionClose}`);
console.log(`🏷️  Balance sections: ${sectionOpen - sectionClose === 0 ? '✅ CORRECTO' : '❌ DESBALANCEADO (' + (sectionOpen - sectionClose) + ')'}`);

// Análisis de tags Blade
const ifCount = (content.match(/@if\(/g) || []).length;
const endifCount = (content.match(/@endif/g) || []).length;
const sectionCount = (content.match(/@section\(/g) || []).length;
const endsectionCount = (content.match(/@endsection/g) || []).length;

console.log('\n=== BALANCE DE TAGS BLADE ===');
console.log(`🔧 @if: ${ifCount}`);
console.log(`🔧 @endif: ${endifCount}`);
console.log(`🔧 Balance @if/@endif: ${ifCount - endifCount === 0 ? '✅ CORRECTO' : '❌ DESBALANCEADO (' + (ifCount - endifCount) + ')'}`);

console.log(`🔧 @section: ${sectionCount}`);
console.log(`🔧 @endsection: ${endsectionCount}`);
console.log(`🔧 Balance @section/@endsection: ${sectionCount - endsectionCount === 0 ? '✅ CORRECTO' : '❌ DESBALANCEADO (' + (sectionCount - endsectionCount) + ')'}`);

// Verificar si hay errores de sintaxis obvios
const hasBladeErrors = content.includes('@endif') && !content.includes('@if');
const hasUnclosedQuotes = (content.match(/"/g) || []).length % 2 !== 0;

console.log('\n=== VERIFICACIONES ADICIONALES ===');
console.log(`🔍 Sintaxis Blade: ${hasBladeErrors ? '❌ POSIBLES ERRORES' : '✅ SIN ERRORES OBVIOS'}`);
console.log(`🔍 Comillas balanceadas: ${hasUnclosedQuotes ? '❌ DESBALANCEADAS' : '✅ BALANCEADAS'}`);

// Estado final
const allBalanced = (divOpen === divClose) && 
                   (sectionOpen === sectionClose) && 
                   (ifCount === endifCount) && 
                   (sectionCount === endsectionCount);

console.log('\n=== ESTADO FINAL ===');
if (allBalanced) {
    console.log('🎉 ¡ARCHIVO COMPLETAMENTE DEPURADO!');
    console.log('✅ Todos los tags están correctamente balanceados');
    console.log('✅ La sintaxis Blade parece correcta');
    console.log('🚀 El archivo está listo para ser usado');
} else {
    console.log('⚠️  Aún hay algunos problemas que resolver');
}
