# Scripts organizados

Este directorio centraliza los scripts CLI para mantener la raíz del proyecto limpia.

## Estructura

- `bootstrap.php`: Bootstrap compartido para todos los scripts.
- `diagnostics/`: Scripts de verificación (SKUs, productos, categorías, conexión DB, etc.)
- `import/`: Scripts de importación masiva desde CSV.
- `db/`: Utilidades de base de datos (crear, probar conexiones, backups).
- `helpers/`: Funciones auxiliares reutilizables.

## Cómo ejecutar

Ejemplos (PowerShell en Windows):

```powershell
php scripts/diagnostics/check_skus.php
php scripts/diagnostics/check_products_status.php
php scripts/diagnostics/check_categories.php
php scripts/import/import_final.php
```
