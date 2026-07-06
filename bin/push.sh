#!/bin/bash
# Roll the wordpress-blog deployment.
# The theme files live on the wp-content PVC, not in the image.
# To update theme files on the running pod, use kubectl cp:
#   kubectl cp . $(kubectl get pod -n blog -l app=wordpress-blog -o name | head -1 | sed 's|pod/||'):/var/www/html/wp-content/themes/robkeplin-wordpress-theme -n blog
set -euo pipefail

kubectl -n blog rollout restart deploy/wordpress-blog
kubectl -n blog rollout status deploy/wordpress-blog
