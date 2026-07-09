#!/usr/bin/env bash
set -euo pipefail

NS=blog

# Load .env if present so credentials don't need to be in the environment
if [[ -f .env ]]; then
  set -a; source .env; set +a
fi

LOCAL_DB="${MYSQL_DATABASE:-rkeplin}"
LOCAL_ROOT_PASS="${MYSQL_ROOT_PASSWORD:-changeme}"

PROD_DB_POD=$(kubectl get pod -n "$NS" -l app=mariadb-blog -o name | head -1 | sed 's|pod/||')
PROD_WP_POD=$(kubectl get pod -n "$NS" -l app=wordpress-blog -o name | head -1 | sed 's|pod/||')

if [[ -z "$PROD_DB_POD" ]]; then
  echo "ERROR: no mariadb-blog pod found in namespace $NS" >&2
  exit 1
fi

if [[ -z "$PROD_WP_POD" ]]; then
  echo "ERROR: no wordpress-blog pod found in namespace $NS" >&2
  exit 1
fi

echo "==> Dumping prod DB from $PROD_DB_POD..."
kubectl exec -n "$NS" "$PROD_DB_POD" -- \
  sh -c 'mariadb-dump -u"$MYSQL_USER" -p"$MYSQL_PASSWORD" "$MYSQL_DATABASE"' \
  | docker-compose exec -T mariadb \
      sh -c "mariadb -uroot -p\"$LOCAL_ROOT_PASS\" \"$LOCAL_DB\""

echo "==> Rewriting URLs and theme name for local dev..."
docker-compose exec -T mariadb \
  sh -c "mariadb -uroot -p\"$LOCAL_ROOT_PASS\" \"$LOCAL_DB\" -e \"
    UPDATE wp_options SET option_value='http://localhost:8080' WHERE option_name IN ('siteurl', 'home');
    UPDATE wp_options SET option_value='robkeplin-wordpress-theme' WHERE option_name IN ('template', 'stylesheet');
  \""

echo "==> Syncing uploads from $PROD_WP_POD..."
kubectl exec -n "$NS" "$PROD_WP_POD" -- \
  tar -cf - /var/www/html/wp-content/uploads \
  | docker-compose exec -T wordpress \
      tar -xf - -C /

echo "==> Done. Visit http://localhost:8080"
