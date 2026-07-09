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

echo "Copying theme files to $POD..."
kubectl cp "$THEME_DIR" "$POD":/var/www/html/wp-content/themes/robkeplin-wordpress-theme -n blog
echo "Done."
