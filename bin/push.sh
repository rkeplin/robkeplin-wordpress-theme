#!/bin/bash
# Push theme files directly to the running pod via kubectl cp.
# No restart needed - PHP picks up file changes immediately.
set -euo pipefail

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
THEME_DIR="$(dirname "$SCRIPT_DIR")"

POD=$(kubectl get pod -n blog -l app=wordpress-blog -o name | head -1 | sed 's|pod/||')

if [[ -z "$POD" ]]; then
  echo "Error: no running wordpress-blog pod found" >&2
  exit 1
fi

ACTIVE_THEME=$(kubectl exec -n blog "$POD" -- php -r "
define('ABSPATH', '/var/www/html/');
\$_SERVER['HTTP_HOST'] = 'localhost';
require '/var/www/html/wp-load.php';
echo get_option('template');
" 2>/dev/null)

if [[ -z "$ACTIVE_THEME" ]]; then
  echo "Error: could not detect active WordPress theme" >&2
  exit 1
fi

echo "Copying theme files to $POD (theme: $ACTIVE_THEME)..."
kubectl cp "$THEME_DIR/." "$POD":/var/www/html/wp-content/themes/"$ACTIVE_THEME" -n blog

echo "Flushing OPcache..."
kubectl exec -n blog "$POD" -- apachectl graceful 2>/dev/null || true

echo "Done."
