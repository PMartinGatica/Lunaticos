const fs = require('fs');

const filePath = 'C:\\Users\\Pablo\\OneDrive\\Documentos\\Insolva\\Lunaticos-site\\resources\\views\\home.blade.php';
const content = fs.readFileSync(filePath, 'utf8');
const lines = content.split('\n');

console.log('🔍 Buscando divs extra...\n');

let divBalance = 0;
let problemLines = [];

lines.forEach((line, index) => {
    const lineNum = index + 1;
    const divOpenCount = (line.match(/<div[^>]*>/g) || []).length;
    const divCloseCount = (line.match(/<\/div>/g) || []).length;
    
    divBalance += divOpenCount - divCloseCount;
    
    if (divCloseCount > 0) {
        console.log(`Línea ${lineNum}: ${line.trim()} (Balance: ${divBalance})`);
        if (divBalance < 0) {
            problemLines.push({
                line: lineNum,
                content: line.trim(),
                balance: divBalance
            });
        }
    }
});

console.log('\n❌ Líneas problemáticas (balance negativo):');
problemLines.forEach(problem => {
    console.log(`Línea ${problem.line}: ${problem.content} (Balance: ${problem.balance})`);
});

console.log(`\n📊 Balance final: ${divBalance}`);
