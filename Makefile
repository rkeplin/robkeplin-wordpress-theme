NS ?= blog

.PHONY: up down logs

up:
	docker-compose up -d

down:
	docker-compose down

logs:
	docker-compose logs -f

push:
	bin/push.sh

# Copy theme files into the running WordPress pod.
.PHONY: sync
sync:
	kubectl cp . \
	  $$(kubectl get pod -n $(NS) -l app=wordpress-blog -o name | head -1 | sed 's|pod/||'):/var/www/html/wp-content/themes/robkeplin-wordpress-theme \
	  -n $(NS)

.PHONY: k8s-namespace
k8s-namespace:
	kubectl apply -f infra/k8s/namespace.yaml

.PHONY: k8s-secret
k8s-secret:
	kubectl create secret generic blog-env --from-env-file=.env -n $(NS) --dry-run=client -o yaml | kubectl apply -f -

.PHONY: k8s-deploy
k8s-deploy: k8s-namespace k8s-secret
	kubectl apply -f infra/k8s/mariadb.yaml
	kubectl apply -f infra/k8s/wordpress.yaml
	kubectl apply -f infra/k8s/ingress.yaml

.PHONY: k8s-delete
k8s-delete:
	-kubectl delete -f infra/k8s/ingress.yaml
	-kubectl delete -f infra/k8s/wordpress.yaml
	-kubectl delete -f infra/k8s/mariadb.yaml
	-kubectl delete secret blog-env -n $(NS) || true

.PHONY: k8s-status
k8s-status:
	kubectl get all -n $(NS)
