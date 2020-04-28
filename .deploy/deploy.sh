#!/bin/bash
openssl aes-256-cbc -K $encrypted_9112fb2807d4_key -iv $encrypted_9112fb2807d4_iv -in $(pwd)/.deploy/travis_id_rsa.enc -out $(pwd)/.deploy/travis_id_rsa -d

chmod 0400 $(pwd)/.deploy/travis_id_rsa

rsync -e "ssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null -i $(pwd)/.deploy/travis_id_rsa" -avz --exclude '.deploy' --exclude '.git' $(pwd)/ travis@jersey2.rkeplin.com:/opt/apps/rkeplin-blog/application/wp-content/themes/robkeplin-$TRAVIS_BUILD_NUMBER
ssh -t -oStrictHostKeyChecking=no -i $(pwd)/.deploy/travis_id_rsa travis@jersey2.rkeplin.com "chown -R travis:33 /opt/apps/rkeplin-blog/application/wp-content"
ssh -t -oStrictHostKeyChecking=no -i $(pwd)/.deploy/travis_id_rsa travis@jersey2.rkeplin.com "cd /opt/apps/rkeplin-blog/application/wp-content/themes/ && ln -sfn robkeplin-$TRAVIS_BUILD_NUMBER robkeplin"
ssh -t -oStrictHostKeyChecking=no -i $(pwd)/.deploy/travis_id_rsa travis@jersey2.rkeplin.com "chown -h travis:33 /opt/apps/rkeplin-blog/application/wp-content/themes/robkeplin"

ssh -t -oStrictHostKeyChecking=no -i $(pwd)/.deploy/travis_id_rsa travis@jersey1.rkeplin.com 'docker service update --force blog_rkeplin-blog'

# Update plugins
ssh -t -oStrictHostKeyChecking=no -i $(pwd)/.deploy/travis_id_rsa travis@jersey2.rkeplin.com 'rkplugin wordpress-seo 14.0.1'
ssh -t -oStrictHostKeyChecking=no -i $(pwd)/.deploy/travis_id_rsa travis@jersey2.rkeplin.com 'rkplugin akismet 4.1.4'
ssh -t -oStrictHostKeyChecking=no -i $(pwd)/.deploy/travis_id_rsa travis@jersey2.rkeplin.com 'rkplugin wordfence 7.4.7'
ssh -t -oStrictHostKeyChecking=no -i $(pwd)/.deploy/travis_id_rsa travis@jersey2.rkeplin.com 'rkplugin wordpress-importer 0.7'

rm -rf $(pwd)/.deploy/travis_id_rsa
